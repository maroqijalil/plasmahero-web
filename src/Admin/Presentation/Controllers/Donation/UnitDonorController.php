<?php

namespace App\Admin\Controllers\Donation;

use App\Admin\UseCases\GetPenerima;
use App\Admin\UseCases\GetUserPengguna;
use App\Admin\UseCases\UpdatePengguna;
use App\Common\Repositories\UserRepositoryInterface;
use App\Common\Repositories\PenggunaRepositoryInterface;
use App\Controller\BaseController;
use App\Common\Models\UnitDonor;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Exception;

class UnitDonorController extends BaseController
{
	public function index()
	{
		$units = UnitDonor::all();
		return view('admin.donor.unit.index', compact('units'));
	}

	public function store(Request $request)
	{
		try {
			$unit = UnitDonor::create($request->except(['_method', '_token']));

			if ($unit) {
				return redirect()->back()->with('success', 'Data unit berhasil ditambahkan');
			} else {
				return redirect()->back()->with('error', 'Data unit gagal ditambahkan!');
			}
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	public function update(Request $request, $id)
	{
		try {
			$unit = UnitDonor::where('id', $id)
				->update($request->except(['_method', '_token']));

			if ($unit) {
				return redirect()->back()->with('success', 'Data unit berhasil diperbarui');
			} else {
				return redirect()->back()->with('error', 'Data unit gagal diperbarui!');
			}
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	public function destroy($id)
	{
		try {
			$unit = UnitDonor::where('id', $id)->delete();

			if ($unit) {
				return redirect()->back()->with('success', 'Data unit berhasil dihapus');
			} else {
				return redirect()->back()->with('error', 'Data unit gagal dihapus!');
			}
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}
}
