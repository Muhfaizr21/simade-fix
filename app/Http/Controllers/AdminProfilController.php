<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfilController extends Controller
{
    public function index()
    {
        return view('admin.profil.index', [
            'profil' => auth()->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'foto'  => 'nullable|image|max:2048',
        ]);

        $user = User::findOrFail($id);

        // Handle foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($user->foto && file_exists(public_path('storage/' . $user->foto))) {
                unlink(public_path('storage/' . $user->foto));
            }

            // Upload baru
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('img-profil', $fileName, 'public');

            $user->foto = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'passwordNew' => 'required|min:6|confirmed',
        ]);

        // Cek password lama
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah']);
        }

        // Update password
        auth()->user()->update([
            'password' => Hash::make($request->passwordNew)
        ]);

        Auth::logout();
        return redirect('/login')->with('success', 'Password berhasil diubah. Silakan login kembali.');
    }
}
