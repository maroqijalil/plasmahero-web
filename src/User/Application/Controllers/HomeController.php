<?php

namespace App\User\Controllers;

use App\Controller\BaseController;
use App\Common\Models\Cerita;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index() {
        $ceritas = Cerita::get();
        return view('user.home', compact(['ceritas']));
    }
}
