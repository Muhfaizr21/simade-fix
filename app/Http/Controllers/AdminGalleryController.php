<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    public function index()
    {
        return view('admin.gallery.index', [
            'gallerys' => Gallery::all()
        ]);
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'keterangan' => 'required'
        ], [
            'gambar.required' => 'Form wajib di isi !',
            'gambar.image' => 'File harus berupa gambar !',
            'gambar.mimes' => 'Format yang di izinkan png,jpg,jpeg !',
            'keterangan.required' => 'Keterangan wajib diisi !'
        ]);

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $path = 'img-gallery/';
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $gambar = $file->storeAs($path, $fileName, 'public');
        } else {
            $gambar = null;
        }

        Gallery::create([
            'gambar' => $gambar,
            'keterangan' => $request->keterangan,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/admin/gallery')->with('success', 'Berhasil menambahkan gallery baru');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'gambar' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'keterangan' => 'required'
        ], [
            'gambar.image' => 'File harus berupa gambar !',
            'gambar.mimes' => 'Format yang di izinkan png,jpg,jpeg !',
            'keterangan.required' => 'Keterangan wajib diisi !'
        ]);

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($gallery->gambar) {
                Storage::disk('public')->delete($gallery->gambar);
            }

            // Upload gambar baru
            $path = 'img-gallery/';
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $gambar = $file->storeAs($path, $fileName, 'public');
        } else {
            $gambar = $gallery->gambar;
        }

        // Update data
        $gallery->update([
            'gambar' => $gambar,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/admin/gallery')->with('success', 'Berhasil memperbarui data gallery');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Hapus gambar
        if ($gallery->gambar) {
            Storage::disk('public')->delete($gallery->gambar);
        }

        // Hapus data
        $gallery->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
