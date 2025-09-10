<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function my_profile()
    {
        $user = Auth::user();
        return view('public_admin.myprofile.my-profile', compact('user'));
    }

    public function ganti_username_email_admin(Request $request)
    {
        // Menggunakan user yang sedang login, bukan dari ID di URL
        $user = Auth::user();

        // Validasi
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('status', 'Username & Email berhasil diubah.');
    }

    public function ganti_password_admin(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'old_password' => 'required|string',
            'new_password' => ['required', 'string', 'confirmed', Password::min(8)],
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Password lama Anda tidak sesuai.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('status', 'Password berhasil diubah.');
    }
}
