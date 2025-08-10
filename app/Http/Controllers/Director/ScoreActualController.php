<?php

namespace App\Http\Controllers\Director;

use App\Models\User;
use App\Models\Aspect;
use Illuminate\Http\Request;
use App\Models\EmployeeScore;
use App\Models\ScoringPeriod;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class ScoreActualController extends Controller
{
    public function index()
    {
        $employees = ScoringPeriod::with('user', 'scores')->get();
        $aspects = Aspect::all();

        return view('director.score_actual', compact('employees', 'aspects'));
    }

    public function create()
    {
        $employees = User::whereNot('role', 'admin')->orderby('position')->get();
        $aspek = Aspect::all();

        return view('director.add_score_actual', compact('employees', 'aspek'));
    }

    public function store(Request $request)
    {
        try {
            $request->merge([
                'scores' => array_map(function($score) {
                    return str_replace(',', '.', $score);
                }, $request->scores)
            ]);

            $validated = $this->validateScores($request);

            $checkExisting = ScoringPeriod::where('user_id', $request->employee_id)
                ->where('bulan', $request->bulan)
                ->where('tahun', $request->tahun)
                ->exists();

            if ($checkExisting) {
                return redirect()->back()->with('error_exists', 'Karyawan sudah memiliki periode penilaian ini.')->withInput();
            }

            DB::beginTransaction();

            $scoringPeriod = ScoringPeriod::create([
                'user_id' => $request->employee_id,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
            ]);

            foreach ($request->scores as $aspect_id => $score_real) {

                $aspek = Aspect::find($aspect_id);

                $score = ($score_real / $aspek->target) * 100;
                $score = round($score, 2);

                EmployeeScore::create([
                    'user_id' => $request->employee_id,
                    'aspect_id'   => $aspect_id,
                    'score'       => $score,
                    'scoring_period_id' => $scoringPeriod->id,
                    'score_real'  => $score_real
                ]);
            }

            DB::commit();

            return redirect()->route('admin.score_actual')->with('success_add_score', 'Scores added successfully.');

        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->validator)->withInput();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to add scores: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = ScoringPeriod::where('id', $id)->with('user', 'scores')->first();
        $aspek = Aspect::all();
        $employees = User::whereNot('role', 'admin')->orderby('position')->get();

        return view('director.edit_score_actual', compact('data', 'employees', 'aspek'));
    }

    public function update(Request $request, $id, $userId)
    {
        try {
            $request->merge([
                'scores' => array_map(function($score) {
                    return str_replace(',', '.', $score);
                }, $request->scores)
            ]);

            $validated = $this->validateScores($request);

            DB::beginTransaction();

            $scoringPeriod = ScoringPeriod::findOrFail($id);
            $scoringPeriod->update([
                'user_id' => $userId,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
            ]);

            foreach ($validated['scores'] as $aspectId => $score_real) {

                $aspek = Aspect::find($aspectId);
                $score = ($score_real / $aspek->target) * 100;
                $score = round($score, 2);

                EmployeeScore::where('user_id', $userId)
                    ->where('aspect_id', $aspectId)
                    ->where('scoring_period_id', $scoringPeriod->id)
                    ->update([
                        'score' => $score,
                        'score_real' => $score_real
                    ]);
            }

            DB::commit();

            return redirect()->route('admin.score_actual')->with('success_update', 'Score updated successfully.');

        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->validator)->withInput();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update score: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $score = ScoringPeriod::findOrFail($id);
            $score->delete();

            return redirect()->route('admin.score_actual')->with('success_delete', 'Score deleted successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete score: ' . $e->getMessage());
        }
    }

    private function validateScores(Request $request)
    {
        return $request->validate([
            'employee_id' => [Rule::requiredIf($request->isMethod('post')), 'exists:users,id'],
            'scores' => ['required', 'array'],
            'scores.*' => ['required', 'numeric', 'decimal:0,2', 'min:0'],
            'bulan' => ['required', 'string', 'in:januari,februari,maret,april,mei,juni,juli,agustus,september,oktober,november,desember'],
            'tahun' => ['required', 'integer', 'min:2000', 'max:2100'],
        ], [
            'employee_id.required' => 'ID karyawan harus diisi.',
            'employee_id.exists' => 'Karyawan yang dipilih tidak ditemukan.',
            'scores.required' => 'Nilai penilaian harus diisi.',
            'scores.array' => 'Nilai penilaian harus dalam bentuk array.',
            'scores.*.required' => 'Nilai untuk setiap aspek harus diisi.',
            'scores.*.numeric' => 'Nilai harus berupa angka.',
            'scores.*.decimal' => 'Nilai harus berupa angka desimal dengan 2 angka di belakang koma.',
            'scores.*.min' => 'Nilai minimal adalah 0.',
            'bulan.required' => 'Bulan harus diisi.',
            'bulan.string' => 'Bulan harus berupa string.',
            'bulan.in' => 'Bulan yang dipilih tidak valid.',
            'tahun.required' => 'Tahun harus diisi.',
            'tahun.integer' => 'Tahun harus berupa angka.',
            'tahun.min' => 'Tahun minimal adalah 2000.',
            'tahun.max' => 'Tahun maksimal adalah 2100.',
        ]);
    }
}
