<?php

namespace App\Http\Controllers\Director;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class EmployerController extends Controller
{
    public function index()
    {
        $data = User::whereNot('role', 'admin')->get();
        return view('director.employer', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->validateRequest($request);

            DB::beginTransaction();

            User::create([
                'name' => $validated['nama'],
                'email' => $validated['email'],
                'password' => bcrypt('password123'),
                'nip' => $validated['nip'],
                'position' => $validated['divisi'],
                'role' => $validated['jabatan'],
            ]);

            DB::commit();

            return redirect()->route('admin.employer')->with('success_add_employer', 'Karyawan berhasil ditambahkan.');

        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->validator)->withInput();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.employer')->with('error', 'Karyawan gagal ditambahkan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->validateRequest($request);

            $email = $validated['nip'] . '@36Degrees.com';

            DB::beginTransaction();

            $user = User::findOrFail($id);
            $user->update([
                'name' => $validated['nama'],
                'email' => $email,
                'nip' => $validated['nip'],
                'position' => $validated['divisi'],
                'role' => $validated['jabatan'],
            ]);

            DB::commit();

            return redirect()->route('admin.employer')->with('success_edit_employer', 'Karyawan berhasil diubah.');

        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->validator)->withInput();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.employer')->with('error', 'Karyawan gagal diubah.');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);
            $user->delete();

            DB::commit();

            return redirect()->route('admin.employer')->with('success_delete_employer', 'Karyawan berhasil dihapus.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.employer')->with('error', 'Karyawan gagal dihapus.');
        }
    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', $request->isMethod('put') ? '' : 'unique:users,email'],
            'nip' => ['required', 'string', 'max:255', $request->isMethod('put') ? '' : 'unique:users,nip'],
            'divisi' => ['required', 'string', 'in:Finance,Sales dan Marketing,Div. Operasional dan Proyek,Div. Desain dan Kreatif,Div. Pengendalian Kualitas'],
            'jabatan' => ['required', 'string', 'in:employee,division_head'],
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa string.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.string' => 'Email harus berupa string.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email sudah terdaftar.',
            'nip.required' => 'NIP harus diisi.',
            'nip.string' => 'NIP harus berupa string.',
            'nip.max' => 'NIP tidak boleh lebih dari 255 karakter.',
            'nip.unique' => 'NIP sudah terdaftar.',
            'divisi.required' => 'Divisi harus diisi.',
            'divisi.string' => 'Divisi harus berupa string.',
            'divisi.in' => 'Divisi harus diantara Finance, Sales dan Marketing, Div. Operasional dan Proyek, Div. Desain dan Kreatif, atau Div. Pengendalian Kualitas.',
            'jabatan.in' => 'Jabatan harus berupa employee atau division_head.',
        ]);
    }
}
