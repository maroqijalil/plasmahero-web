<?php

namespace App\User\Controllers;

use App\Controller\BaseController;
use App\Common\Models\Cerita;
use App\Common\Models\Galeri;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index() {
        $galeris = Galeri::get();
        $ceritas = Cerita::get()->reject(function ($data) {
            return $data->status != 1;
        });
        return view('user.home', compact(['ceritas', 'galeris']));
    }
}
