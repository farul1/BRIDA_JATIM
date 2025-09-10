<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;

class KomentarController extends Controller
{
    public function index()
    {
        $komen = Komentar::with('berita')->orderBy('id', 'desc')->get();
        return view('public_admin.daftar_komen.index', compact('komen'));
    }

public function ubahStatus($id)
{
    $komen = Komentar::findOrFail($id);
    $komen->status = !$komen->status;
    $komen->save();

    return response()->json([
        'success' => true,
        'status' => $komen->status
    ]);
}


    public function destroy($id)
    {
        $komen = Komentar::findOrFail($id);
        $komen->delete();
        return redirect()->back()->with('status', 'Komentar berhasil dihapus!');
    }

}
