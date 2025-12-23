<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminUmkmController extends Controller
{
    public function index()
    {
        return view('admin.umkm.index', [
            'umkms'  => Umkm::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('admin.umkm.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto'      => 'required|mimes:jpeg,jpg,png',
            'produk'    => 'required',
            'slug'      => 'required|unique:umkms',
            'harga'     => 'required|numeric',
            'no_hp'     => 'required|numeric',
            'deskripsi' => 'required'
        ], [
            'foto.required'         => 'Wajib menambahkan foto !',
            'foto.mimes'            => 'Format foto yang di izinkan Jpeg, Jpg, Png',
            'produk.required'       => 'Wajib menambahkan nama produk !',
            'slug.required'         => 'Slug tidak boleh kosong !',
            'slug.unique'           => 'Slug tidak boleh sama !',
            'harga.required'        => 'Wajib menambahkan harga !',
            'harga.numeric'         => 'Tambahkan format angka !',
            'no_hp.required'        => 'Wajib menambahkan No Hp !',
            'no_hp.numeric'         => 'Tambahkan format angka !',
            'deskripsi.required'    => 'Wajib menambahkan deskripsi produk !'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/umkm/create')
                ->withErrors($validator)
                ->withInput();
        }

        // Upload foto
        if ($request->hasFile('foto')) {
            $path       = 'img-produk/';
            $file       = $request->file('foto');
            $extension  = $file->getClientOriginalExtension();
            $fileName   = uniqid() . '.' . $extension;
            $foto       = $file->storeAs($path, $fileName, 'public');
        } else {
            $foto = null;
        }

        Umkm::create([
            'foto'          => $foto,
            'produk'        => $request->produk,
            'slug'          => $request->slug,
            'harga'         => $request->harga,
            'no_hp'         => $request->no_hp,
            'deskripsi'     => $request->deskripsi,
            'user_id'       => auth()->user()->id,
        ]);

        return redirect('/admin/umkm')->with('success', 'Berhasil menambahkan data produk umkm');
    }

    public function edit($id)
    {
        $umkm = Umkm::find($id);
        return view('admin.umkm.edit', [
            'umkm'  => $umkm
        ]);
    }

    public function update(Request $request, $id)
    {
        $umkm = Umkm::find($id);

        // Validasi slug
        $slugRule = $request->slug != $umkm->slug
            ? 'required|unique:umkms'
            : 'required';

        $validator = Validator::make($request->all(), [
            'produk'    => 'required',
            'slug'      => $slugRule,
            'harga'     => 'required|numeric',
            'no_hp'     => 'required|numeric',
            'deskripsi' => 'required'
        ], [
            'produk.required'       => 'Wajib menambahkan nama produk !',
            'slug.required'         => 'Slug tidak boleh kosong !',
            'slug.unique'           => 'Slug tidak boleh sama !',
            'harga.required'        => 'Wajib menambahkan harga !',
            'harga.numeric'         => 'Tambahkan format angka !',
            'no_hp.required'        => 'Wajib menambahkan No Hp !',
            'no_hp.numeric'         => 'Tambahkan format angka !',
            'deskripsi.required'    => 'Wajib menambahkan deskripsi produk !'
        ]);

        // Handle foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($umkm->foto) {
                Storage::disk('public')->delete($umkm->foto);
            }

            // Upload baru
            $path       = 'img-produk/';
            $file       = $request->file('foto');
            $extension  = $file->getClientOriginalExtension();
            $fileName   = uniqid() . '.' . $extension;
            $foto       = $file->storeAs($path, $fileName, 'public');
        } else {
            $foto = $umkm->foto;
        }

        if ($validator->fails()) {
            return redirect("/admin/umkm/{$umkm->id}/edit")
                ->withErrors($validator)
                ->withInput();
        }

        // Update data
        $umkm->update([
            'foto'          => $foto,
            'produk'        => $request->produk,
            'slug'          => $request->slug,
            'harga'         => $request->harga,
            'no_hp'         => $request->no_hp,
            'deskripsi'     => $request->deskripsi,
            'user_id'       => auth()->user()->id,
        ]);

        return redirect('/admin/umkm')->with('success', 'Berhasil memperbarui produk umkm');
    }

    public function destroy($id)
    {
        $umkm = Umkm::find($id);

        // Hapus foto
        if ($umkm->foto) {
            Storage::disk('public')->delete($umkm->foto);
        }

        // Hapus data
        $umkm->delete();

        return redirect('/admin/umkm')->with('success', 'Berhasil menghapus produk umkm');
    }

    public function slug(Request $request)
    {
        $slug = Str::slug($request->produk);
        return response()->json(['slug' => $slug]);
    }
}
