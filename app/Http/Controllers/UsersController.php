<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bidang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    // Tampilkan list user
    public function index()
    {
        $user = User::with('bidang')->get();
        return view('public_admin.master_user.index', compact('user'));
    }

    // Form tambah user baru
    public function create()
    {
        $bidang = Bidang::all();
        return view('public_admin.master_user.create', compact('bidang'));
    }

    // Simpan user baru
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)],
            'id_role' => 'required|integer',
            'id_bidang' => 'nullable|exists:bidangs,id',
            'instansi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'kepakaran' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $validatedData['nama'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'id_role' => $validatedData['id_role'],
            // Jika role admin bagian maka isi bidang, jika bukan set ke 0 atau null sesuai kebutuhan db
            'id_bidang' => $validatedData['id_role'] == 1 ? $validatedData['id_bidang'] : null,
            'instansi' => $validatedData['instansi'],
            'jabatan' => $validatedData['jabatan'],
            'telephone' => $validatedData['telephone'],
            'kepakaran' => $validatedData['kepakaran'],
        ]);

        // Redirect dengan flash session
        return redirect()->route('user.index')->with('status', 'User baru berhasil ditambahkan!');
    }

    // Form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $bidang = Bidang::all();
        return view('public_admin.master_user.edit', compact('user', 'bidang'));
    }

    // Update data user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'nama_user' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => ['nullable', 'confirmed', Password::min(8)], // password opsional
            'id_role' => 'required|integer',
            'id_bidang' => 'nullable|exists:bidangs,id',
            'instansi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'kepakaran' => 'required|string|max:255',
        ]);

        $updateData = [
            'name' => $validatedData['nama_user'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'id_role' => $validatedData['id_role'],
            'id_bidang' => $validatedData['id_role'] == 1 ? $validatedData['id_bidang'] : null,
            'instansi' => $validatedData['instansi'],
            'jabatan' => $validatedData['jabatan'],
            'telephone' => $validatedData['telephone'],
            'kepakaran' => $validatedData['kepakaran'],
        ];

        if (!empty($validatedData['password'])) {
            $updateData['password'] = Hash::make($validatedData['password']);
        }

        $user->update($updateData);

        return redirect()->route('user.index')->with('status', 'User berhasil diperbarui!');
    }

    // Hapus user
  public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return response()->json([
        'success' => true,
        'message' => 'Data Berhasil Dihapus!'
    ], 200);
}

}
