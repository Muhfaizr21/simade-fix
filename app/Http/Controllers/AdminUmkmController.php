<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUmkmController extends Controller
{
    public function index()
    {
        return view('admin.umkm.index', [
            'umkms' => Umkm::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.umkm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto'      => 'required|image|max:2048',
            'produk'    => 'required',
            'slug'      => 'required|unique:umkms',
            'harga'     => 'required|numeric',
            'no_hp'     => 'required|numeric',
            'deskripsi' => 'required'
        ]);

        // Upload foto
        $fotoPath = $request->file('foto')->store('img-produk', 'public');

        Umkm::create([
            'foto'      => $fotoPath,
            'produk'    => $request->produk,
            'slug'      => $request->slug,
            'harga'     => $request->harga,
            'no_hp'     => $request->no_hp,
            'deskripsi' => $request->deskripsi,
            'excerpt'   => str()->limit(strip_tags($request->deskripsi), 100),
            'user_id'   => auth()->id(),
        ]);

        return redirect('/admin/umkm')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Umkm $umkm)
    {
        return view('admin.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $request->validate([
            'foto'      => 'nullable|image|max:2048',
            'produk'    => 'required',
            'slug'      => 'required|unique:umkms,slug,' . $umkm->id,
            'harga'     => 'required|numeric',
            'no_hp'     => 'required|numeric',
            'deskripsi' => 'required'
        ]);

        // Jika ada foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            Storage::disk('public')->delete($umkm->foto);

            // Upload foto baru
            $fotoPath = $request->file('foto')->store('img-produk', 'public');
            $umkm->foto = $fotoPath;
        }

        // Update data
        $umkm->produk = $request->produk;
        $umkm->slug = $request->slug;
        $umkm->harga = $request->harga;
        $umkm->no_hp = $request->no_hp;
        $umkm->deskripsi = $request->deskripsi;
        $umkm->excerpt = str()->limit(strip_tags($request->deskripsi), 100);
        $umkm->user_id = auth()->id();
        $umkm->save();

        return redirect('/admin/umkm')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Umkm $umkm)
    {
        // Hapus foto
        Storage::disk('public')->delete($umkm->foto);

        // Hapus data
        $umkm->delete();

        return redirect('/admin/umkm')->with('success', 'Data berhasil dihapus');
    }

    public function slug(Request $request)
    {
        $slug = str()->slug($request->produk);
        return response()->json(['slug' => $slug]);
    }
}
