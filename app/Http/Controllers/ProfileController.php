<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
            'telp' => 'nullable|string|max:20',
            'gender' => 'nullable|in:laki-laki,perempuan',
            'password' => 'nullable|min:6',
        ]);

        // Update data user
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->gender = $request->gender;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('avatars', $filename, 'public'); // simpan di storage/app/public/avatars

            // Update path di user
            $user->avatar = '/storage/' . $path;
        }


        $user->save();

        return redirect()->route('profile.page')->with('success', 'Profil berhasil diperbarui.');
    }
}
