<?php

namespace App\Common\Controllers\API;

use App\Common\Interfaces\DonorRepositoryInterface;
use App\Common\Models\Donor;
use App\Controller\BaseController;
use Illuminate\Http\Request;

class DonorController extends BaseController
{
    protected $donorRepository;

    public function __construct(DonorRepositoryInterface $donorRepository)
    {
        $this->donorRepository = $donorRepository;
    }

    public function index()
    {
        $donor = $this->donorRepository->all();
        return $this->sendResponse($donor, 'Data pendonoran berhasil diambil');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $donor = Donor::create($data);
        return $this->sendResponse($donor, 'Pendonoran berhasil ditambahkan');
    }

    public function show($id)
    {
        $donor = $this->donorRepository->findById($id);
        return $this->sendResponse($donor, 'Data pendonoran berhasil diambil');
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->donorRepository->update($id,$data);
        return $this->sendResponse($data, 'Data berhasil diupdate');
    }


    public function destroy($id)
    {
        $this->donorRepository->deleteById($id);
        return $this->sendResponse($id, "Data id {$id} berhasil dihapus");
    }
}
