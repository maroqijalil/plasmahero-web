<?php

namespace App\Admin\Controllers;

use App\Admin\Interfaces\PendonoranRepositoryInterface;
use App\Controller\BaseController;
use App\Common\Models\User;
use App\Common\Models\Pencocokan;
use App\Admin\Requests\StorePendonoranRequest;
use Illuminate\Support\Facades\Auth;

class PendonoranController extends BaseController
{
    protected $pendonoranRepository;

    public function __construct(PendonoranRepositoryInterface $pendonoranRepository)
    {
        $this->pendonoranRepository = $pendonoranRepository;
    }

    public function index()
    {
        if (Auth::user()->admin == null) return redirect()->route('show-admin-akun');
        $users = User::all();
        $pencocokans = Pencocokan::all();
        return view('admin.donor.donation', ['users' => $users, 'pencocokans' => $pencocokans]);
    }

    public function store(StorePendonoranRequest $request)
    {
        Pencocokan::create([
            'id_admin' => $request->id_admin,
            'id_pendonor' => $request->id_pendonor,
            'id_penerima' => $request->id_penerima
        ]);

        return back()->with('success', 'Pencocokan Berhasil ditambahkan');
    }

    public function fetch()
    {
        $pendonoran = $this->pendonoranRepository->all();
        return $this->sendResponse($pendonoran, "Daftar pendonoran berhasil di dapatkan");
    }
}
