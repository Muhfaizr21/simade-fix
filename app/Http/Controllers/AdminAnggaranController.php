<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.apbdes.index', [
            'anggarans' => Anggaran::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.apbdes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'      => 'required',
            'slug'       => 'required|unique:anggarans',
            'keterangan' => 'required',
            'gambar'     => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ], [
            'judul.required'      => "Form wajib di isi !",
            'slug.required'       => 'Slug tidak boleh kosong !',
            'slug.unique'         => 'Slug sudah digunakan !',
            'gambar.required'     => 'Form wajib di isi !',
            'gambar.image'        => 'File harus berupa gambar !',
            'gambar.mimes'        => 'Format yang di izinkan png,jpg,jpeg !',
            'keterangan.required' => 'Keterangan wajib diisi !'
        ]);

        // Upload gambar
        $gambar = $request->file('gambar')->store('img-anggaran', 'public');

        Anggaran::create([
            'judul'      => $request->judul,
            'slug'       => $request->slug,
            'keterangan' => $request->keterangan,
            'gambar'     => $gambar,
            'user_id'    => auth()->id()
        ]);

        return redirect('/admin/apbdes')->with('success', 'Berhasil menambahkan data baru');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $anggaran = Anggaran::findOrFail($id);
        return view('admin.apbdes.edit', compact('anggaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $anggaran = Anggaran::findOrFail($id);

        // Validasi slug (unik kecuali untuk data ini)
        $slugRule = $request->slug != $anggaran->slug
            ? 'required|unique:anggarans,slug,' . $id
            : 'required';

        $request->validate([
            'judul'      => 'required',
            'slug'       => $slugRule,
            'keterangan' => 'required',
            'gambar'     => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ], [
            'judul.required'      => "Form wajib di isi !",
            'slug.required'       => 'Slug tidak boleh kosong !',
            'slug.unique'         => 'Slug sudah digunakan !',
            'gambar.image'        => 'File harus berupa gambar !',
            'gambar.mimes'        => 'Format yang di izinkan png,jpg,jpeg !',
            'keterangan.required' => 'Keterangan wajib diisi !'
        ]);

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($anggaran->gambar) {
                Storage::disk('public')->delete($anggaran->gambar);
            }

            // Upload gambar baru
            $gambar = $request->file('gambar')->store('img-anggaran', 'public');
        } else {
            $gambar = $anggaran->gambar;
        }

        // Update data
        $anggaran->update([
            'judul'      => $request->judul,
            'slug'       => $request->slug,
            'keterangan' => $request->keterangan,
            'gambar'     => $gambar
        ]);

        return redirect('/admin/apbdes')->with('success', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $anggaran = Anggaran::findOrFail($id);

        // Hapus gambar
        if ($anggaran->gambar) {
            Storage::disk('public')->delete($anggaran->gambar);
        }

        // Hapus data
        $anggaran->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data !');
    }

    /**
     * Generate slug / permalink by Judul.
     */
    public function slug(Request $request)
    {
        $slug = \Illuminate\Support\Str::slug($request->judul);
        return response()->json(['slug' => $slug]);
    }
}
