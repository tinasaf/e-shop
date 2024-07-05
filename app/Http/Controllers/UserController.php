<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function profil () {
        $user = Auth::user();
        return view('user.profil', compact('user'));
    }

    public function profilUpdate (Request $request) {
        $user = Auth::user();
        $request->validate([
            'foto'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'name'         => 'required',
            'email'   => 'required',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->alamat = $request->input('alamat');

        if ($request->hasFile('foto')) {
            // Menghapus foto lama jika ada
            if ($user->foto) {
                Storage::delete('public/user/' . $user->foto);
            }

            // Menyimpan foto baru
            $path = $request->file('foto')->store('user', 'public');
            $user->foto = $path;
        }

        $user->save();

        return redirect()->route('profil')->with('success', 'Data pengguna berhasil diperbarui');
    }
}
