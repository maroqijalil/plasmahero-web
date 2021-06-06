<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreGalleryRequest;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::get();
        return view('layouts.user.others.gallery', compact(['galleries']));
    }

    public function adminIndex()
    {
        $galleries = Gallery::get();
        return view('layouts.admin.others.gallery', compact(['galleries']));
    }

    public function store(StoreGalleryRequest $request)
    {
        $title = $request->title;
        $description = $request->description;
        $image = $request->image;

        $imageName = time() . '-' . GalleryController::generateRandomString(6) . '-' . $image->getClientOriginalName();
        $imageName = str_replace(' ', '-', strtolower($imageName));
        $image->storeAs('images', $imageName);
        $image->move(public_path() . '/gallery/images', $imageName);

        Gallery::create([
            'title' => $title,
            'description' => $description,
            'urlToImage' => '/gallery/images/' . $imageName
        ]);

        return back()->with('success', 'Foto berhasil dimasukkan');
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