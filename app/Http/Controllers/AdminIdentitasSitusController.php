<?php

namespace App\Http\Controllers;

use App\Models\Situs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminIdentitasSitusController extends Controller
{
    public function index()
    {
        return view('admin.identitas-situs.index', [
            'situs' => Situs::first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $situs = Situs::findOrFail($id);

        // Validasi dasar
        $validator = Validator::make($request->all(), [
            'nm_desa'       => 'required',
            'kecamatan'     => 'required',
            'kabupaten'     => 'required',
            'provinsi'      => 'required',
            'kode_pos'      => 'required',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nm_desa.required'       => 'Wajib menambahkan nama desa !',
            'kecamatan.required'     => 'Wajib menambahkan kecamatan !',
            'kabupaten.required'     => 'Wajib menambahkan kabupaten !',
            'provinsi.required'      => 'Wajib menambahkan provinsi !',
            'kode_pos.required'      => 'Wajib menambahkan kode pos !',
            'logo.image'             => 'File harus berupa gambar !',
            'logo.mimes'             => 'Format gambar harus jpeg, png, jpg, gif, atau svg !',
            'logo.max'               => 'Ukuran gambar maksimal 2MB !'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($situs->logo) {
                $oldLogoPath = $situs->logo;
                // Pastikan path yang benar
                if (Storage::disk('public')->exists($oldLogoPath)) {
                    Storage::disk('public')->delete($oldLogoPath);
                }
            }

            // Upload logo baru
            $fileName = uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
            $logoPath = 'img-logo/' . $fileName;

            // Simpan file
            $request->file('logo')->storeAs('img-logo', $fileName, 'public');
            $logo = $logoPath; // Simpan path lengkap
        } else {
            $logo = $situs->logo;
        }

        // Update data
        $situs->update([
            'logo'       => $logo,
            'nm_desa'    => $request->nm_desa,
            'kecamatan'  => $request->kecamatan,
            'kabupaten'  => $request->kabupaten,
            'provinsi'   => $request->provinsi,
            'kode_pos'   => $request->kode_pos,
        ]);

        return redirect('/admin/identitas-situs')->with('success', 'Berhasil memperbarui identitas situs');
    }
}
