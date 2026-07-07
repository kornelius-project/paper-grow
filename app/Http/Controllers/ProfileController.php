<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $orders = $user->orders()->orderBy('created_at', 'desc')->get();
        return view('profile.index', compact('user', 'orders'));
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => ['required', 'image', 'max:2048']
        ]);

        $user = auth()->user();

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            
            // Need to save via model update (or manually depending on Fillable, but we added Fillable)
            $user->profile_photo = $path;
            $user->save();
        }

        return back()->with('success', 'Foto profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'], // Simpler validation
        ]);

        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password berhasil diubah!');
    }
}
