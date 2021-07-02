<?php

namespace App\Admin\Controllers\Others;

use Illuminate\Http\Request;
use App\Controller\BaseController;
use App\Common\Models\Galeri;
use Illuminate\Support\Facades\DB;

class GaleriController extends BaseController
{
    public function index()
    {
        $galleries = Galeri::get();
        return view('admin.others.gallery.index', compact(['galleries']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required'
        ]);

        $fotoPath = $this->storeImage($request->foto);

        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => '/img/galeri/' . $fotoPath
        ]);

        return redirect('/admin/galeri')->with('success', 'Dokumentasi berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required'
        ]);

        $fotoPath = $this->storeImage($request->foto);

        DB::table('galeri')->where('id', $id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => '/img/galeri/' . $fotoPath
        ]);
        return redirect('/admin/galeri')->with('success', 'Dokumentasi berhasil diupdate');
    }

    public function destroy($id)
    {
        Galeri::findOrFail($id)->delete();
        return back()->with('success', 'Dokumentasi berhasil dihapus');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.others.gallery.edit', compact(['galeri']));
    }

    protected function storeImage($foto) {
        $fotoPath = time() . '-' . GaleriController::generateRandomString(6) . '-' . $foto->getClientOriginalName();
        $fotoPath = str_replace(' ', '-', strtolower($fotoPath));
        $foto->storeAs('images', $fotoPath);
        $foto->move(public_path() . '/img/galeri', $fotoPath);

        return $fotoPath;
    }
    protected function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
