<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use App\Models\PostStatus;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.berita.index', [
            'beritas' => Berita::where('status_id', 2)->with(['user', 'status'])
                ->orderBy('id', 'DESC')->get(),
            'beritaDraft' => Berita::where('status_id', 1)->with(['user', 'status'])
                ->orderBy('id', 'DESC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create', [
            'postStatus' => PostStatus::all(),
            'kategories' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar'      => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul'       => 'required|max:255',
            'slug'        => 'required|unique:beritas',
            'body'        => 'required',
            'kategori_id' => 'required',
            'status_id'   => 'required'
        ],[
            'gambar.required'     => 'Wajib menambahkan gambar !',
            'gambar.image'        => 'File harus berupa gambar !',
            'gambar.mimes'        => 'Format gambar yang di izinkan Jpeg, Jpg, Png',
            'judul.required'      => 'Wajib menambahkan judul !',
            'slug.required'       => 'Wajib menambahkan slug !',
            'slug.unique'         => 'Slug sudah digunakan',
            'body.required'       => 'Wajib menambahkan isi berita !',
            'kategori_id.required'=> 'Wajib memilih kategori !',
            'status_id.required'  => 'Wajib memilih status berita !'
        ]);

        // Upload gambar
        $gambar = $request->file('gambar')->store('img-berita', 'public');

        Berita::create([
            'judul'       => $request->judul,
            'slug'        => $request->slug,
            'body'        => $request->body,
            'gambar'      => $gambar,
            'excerpt'     => Str::limit(strip_tags($request->body), 100),
            'user_id'     => auth()->id(),
            'status_id'   => $request->status_id,
            'kategori_id' => $request->kategori_id
        ]);

        return redirect('/admin/berita')->with('success', 'Berhasil menambahkan data berita');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', [
            'berita'     => $berita,
            'kategories' => Kategori::all(),
            'postStatus' => PostStatus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        // Validasi slug
        $slugRule = $request->slug != $berita->slug
            ? 'required|unique:beritas,slug,' . $id
            : 'required';

        $request->validate([
            'judul'       => 'required|max:255',
            'slug'        => $slugRule,
            'body'        => 'required',
            'kategori_id' => 'required',
            'status_id'   => 'required',
            'gambar'      => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ],[
            'judul.required'      => 'Wajib menambahkan judul !',
            'slug.required'       => 'Wajib menambahkan slug !',
            'slug.unique'         => 'Slug sudah digunakan !',
            'body.required'       => 'Wajib menambahkan isi berita !',
            'kategori_id.required'=> 'Wajib memilih kategori !',
            'status_id.required'  => 'Wajib memilih status berita !',
            'gambar.image'        => 'File harus berupa gambar !',
            'gambar.mimes'        => 'Format gambar yang di izinkan Jpeg, Jpg, Png'
        ]);

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            // Upload gambar baru
            $gambar = $request->file('gambar')->store('img-berita', 'public');
        } else {
            $gambar = $berita->gambar;
        }

        // Update data
        $berita->update([
            'judul'       => $request->judul,
            'slug'        => $request->slug,
            'body'        => $request->body,
            'gambar'      => $gambar,
            'excerpt'     => Str::limit(strip_tags($request->body), 100),
            'user_id'     => auth()->id(),
            'status_id'   => $request->status_id,
            'kategori_id' => $request->kategori_id
        ]);

        return redirect('/admin/berita')->with('success', 'Berhasil memperbarui berita');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus gambar
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        // Hapus data
        $berita->delete();

        return redirect('/admin/berita')->with('success', 'Berhasil menghapus berita');
    }

    /**
     * Generate slug / permalink by Judul.
     */
    public function slug(Request $request)
    {
        $slug = Str::slug($request->judul);
        return response()->json(['slug' => $slug]);
    }
}
