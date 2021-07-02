<?php

namespace App\Common\Controllers;

use App\Controller\BaseController;
use App\Admin\Requests\StoreGalleryRequest;
use App\Common\Repositories\GalleryRepositoryInterface;
use App\Common\Models\Gallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GalleryController extends BaseController
{
    protected $galleryRepository;

    public function __construct(GalleryRepositoryInterface $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    public function index()
    {
        $galleries = Gallery::get();
        return view('user.others.gallery', compact(['galleries']));
    }

    public function adminIndex()
    {
        $galleries = Gallery::get();
        return view('admin.others.gallery', compact(['galleries']));
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

    public function fetch()
    {
        $gallery = $this->galleryRepository->all();
        return $this->sendResponse($gallery, "Daftar gallery berhasil di dapatkan");
    }

    public function destroy($id)
    {
        $this->galleryRepository->deleteById($id);
        return $this->sendResponse($id, "Gallery id {$id} berhasil di dihapus");
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->galleryRepository->update($id, $data);
        return $this->sendResponse($data, "Gallery id {$id} berhasil di update");
    }

    public function create(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'urlToImage' => '/gallery/images/' . $request->imageName
        ];

        // $imageName = time() . '-' . GalleryController::generateRandomString(6) . '-' . $image->getClientOriginalName();
        // $imageName = str_replace(' ', '-', strtolower($imageName));
        // $image->storeAs('images', $imageName);
        // $image->move(public_path() . '/gallery/images', $imageName);

        $this->galleryRepository->create($data);
        return $this->sendResponse($data, "Gallery berhasil di ditambahkan");
    }
}
