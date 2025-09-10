<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LinkBypass;


class LinkBypassController extends Controller
{
    public function index_linkbypass()
    {
        $link = LinkBypass::orderBy('id', 'desc')->get();
        return view('public_admin.master_link_bypass.index', compact('link'));
    }

    public function create_linkbypass()
    {
        return view('public_admin.master_link_bypass.create');
    }
    public function store_linkbypass(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'link' => 'required|url',
            ]);

            LinkBypass::create([
                'name' => $request->nama,
                'link' => $request->link,
            ]);

            return redirect()->route('linkbypass')->with('status', 'Link Bypass Berhasil Ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            return redirect()->route('linkbypass')->with('statusT', 'Gagal menambahkan Link Bypass: ' . $e->getMessage());
        }
    }

    public function edit_linkbypass($id)
    {
        $link = LinkBypass::findOrFail($id);
        return view('public_admin.master_link_bypass.edit', compact('link', 'id'));
    }


    public function update_linkbypass(Request $request, $id)
    {
        try {
            $link = LinkBypass::findOrFail($id);

            $request->validate([
                'nama' => 'required|string|max:255',
                'link' => 'required|url',
            ]);

            $link->update([
                'name' => $request->nama,
                'link' => $request->link,
            ]);

            return redirect()->route('linkbypass')->with('status', 'Link Bypass Berhasil Diubah!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            return redirect()->route('linkbypass')->with('statusT', 'Gagal mengubah Link Bypass: ' . $e->getMessage());
        }
    }

    public function destroy_linkbypass($id)
    {
        $link = LinkBypass::findOrFail($id);
        $link->delete();
        return redirect()->back()->with('status', 'Link Bypass Berhasil Dihapus!');
    }
}
