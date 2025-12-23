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
            'gambar' => 'required|image|max:2048',
            'keterangan' => 'required'
        ]);

        // Upload gambar
        $gambar = $request->file('gambar')->store('img-gallery', 'public');

        Gallery::create([
            'gambar' => $gambar,
            'keterangan' => $request->keterangan,
            'user_id' => auth()->id(),
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
            'gambar' => 'nullable|image|max:2048',
            'keterangan' => 'required'
        ]);

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dengan multiple try
            $this->safeDelete($gallery->gambar);

            // Upload gambar baru
            $gambar = $request->file('gambar')->store('img-gallery', 'public');
        } else {
            $gambar = $gallery->gambar;
        }

        // Update data
        $gallery->gambar = $gambar;
        $gallery->keterangan = $request->keterangan;
        $gallery->save();

        return redirect('/admin/gallery')->with('success', 'Berhasil memperbarui data gallery');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Hapus gambar
        $this->safeDelete($gallery->gambar);

        // Hapus data
        $gallery->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    /**
     * Safe delete file
     */
    private function safeDelete($filePath)
    {
        if (!$filePath) return;

        // Coba dengan storage facade
        try {
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
        } catch (\Exception $e) {
            // Coba dengan unlink
            try {
                $fullPath = storage_path('app/public/' . $filePath);
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            } catch (\Exception $e) {
                // Skip error jika file tidak ditemukan
            }
        }
    }
}
