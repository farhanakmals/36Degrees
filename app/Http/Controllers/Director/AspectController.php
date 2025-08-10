<?php

namespace App\Http\Controllers\Director;

use App\Models\Aspect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class AspectController extends Controller
{
    public function index()
    {
        $data = Aspect::all();
        return view('director.aspect', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->validateRequest($request);

            // add to db
            DB::beginTransaction();
            Aspect::create([
                'name' => $validated['aspek'],
                'target' => $validated['target'],
            ]);

            DB::commit();
            return redirect()->route('admin.aspect')->with('success_add_aspect', 'Aspek berhasil ditambahkan.');

        } catch (ValidationException $e) {
            DB::rollback();
            $errors = $e->errors();

            return redirect()->route('admin.aspect')->withErrors($errors)->withInput();

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.aspect')->withErrors(['error' => 'Gagal menambahkan aspek: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->validateRequest($request);

            DB::beginTransaction();
            $aspect = Aspect::findOrFail($id);
            $aspect->update([
                'name' => $validated['aspek'],
                'target' => $validated['target'],
            ]);

            DB::commit();
            return redirect()->route('admin.aspect')->with('success_edit_aspect', 'Aspek berhasil diperbarui.');

        } catch (ValidationException $e) {
            DB::rollback();
            $errors = $e->errors();

            return redirect()->route('admin.aspect')->withErrors($errors)->withInput();

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.aspect')->withErrors(['error' => 'Gagal memperbarui aspek: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $aspect = Aspect::findOrFail($id);
            $aspect->delete();

            return redirect()->route('admin.aspect')->with('success_delete_aspect', 'Aspek berhasil dihapus.');

        } catch (\Exception $e) {
            return redirect()->route('admin.aspect')->withErrors(['error' => 'Gagal menghapus aspek: ' . $e->getMessage()]);
        }
    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'aspek' => 'required|string|max:255',
            'target' => 'required|integer|min:1',
        ], [
            'aspek.required' => 'Aspek harus diisi.',
            'aspek.string' => 'Aspek harus berupa teks.',
            'aspek.max' => 'Aspek tidak boleh lebih dari 255 karakter.',
            'target.required' => 'Target harus diisi.',
            'target.integer' => 'Target harus berupa angka.',
            'target.min' => 'Target minimal adalah 1.',
        ]);
    }
}
