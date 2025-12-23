<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPerangkatDesaController extends Controller
{
    public function index()
    {
        return view('admin.perangkat-desa.index', [
            'perangkatDesas' => PerangkatDesa::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.perangkat-desa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required',
            'jabatan' => 'required',
            'foto'    => 'required|image|max:2048',
        ]);

        // Upload foto
        $fotoPath = $request->file('foto')->store('img-perangkat', 'public');

        PerangkatDesa::create([
            'nama'    => $request->nama,
            'jabatan' => $request->jabatan,
            'foto'    => $fotoPath,
            'user_id' => auth()->id()
        ]);

        return redirect('/admin/perangkat-desa')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(PerangkatDesa $perangkatDesa)
    {
        return view('admin.perangkat-desa.edit', compact('perangkatDesa'));
    }

    public function update(Request $request, PerangkatDesa $perangkatDesa)
    {
        $request->validate([
            'nama'    => 'required',
            'jabatan' => 'required',
            'foto'    => 'nullable|image|max:2048',
        ]);

        // Jika ada foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            Storage::disk('public')->delete($perangkatDesa->foto);

            // Upload foto baru
            $fotoPath = $request->file('foto')->store('img-perangkat', 'public');
            $perangkatDesa->foto = $fotoPath;
        }

        // Update data lainnya
        $perangkatDesa->nama = $request->nama;
        $perangkatDesa->jabatan = $request->jabatan;
        $perangkatDesa->user_id = auth()->id();
        $perangkatDesa->save();

        return redirect('/admin/perangkat-desa')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(PerangkatDesa $perangkatDesa)
    {
        // Hapus foto
        Storage::disk('public')->delete($perangkatDesa->foto);

        // Hapus data
        $perangkatDesa->delete();

        return redirect('/admin/perangkat-desa')->with('success', 'Data berhasil dihapus');
    }
}
