<?php

namespace App\Admin\Controllers\Donation;

use App\Admin\Repositories\PendonoranRepositoryInterface;
use App\Common\Repositories\UserRepositoryInterface;
use App\Controller\BaseController;
use App\Common\Models\Pencocokan;
use App\Admin\Requests\StorePendonoranRequest;
use App\Common\Controllers\ChatController;
use App\Common\Models\Donor;
use App\Common\Models\Partisipan;
use App\Common\Models\Pengguna;
use App\Common\Models\Pesan;
use App\Common\Models\UnitDonor;
use App\Common\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendonoranController extends BaseController
{

	private $chat_controller;

	public function __construct (ChatController $chat_controller) {
		$this->chat_controller = $chat_controller;
	}

	public function index()
	{
		$userRepository = App::make(UserRepositoryInterface::class);
		$pendonoranRepository = App::make(PendonoranRepositoryInterface::class);
		$partisipans = Partisipan::where('id_admin', Auth::user()->id)->get();
		return view('admin.donor.donation', [
			'users' => $userRepository->all(),
			'pencocokans' => $pendonoranRepository->all(),
			'partisipans' => $partisipans
		]);
	}

	public function store(StorePendonoranRequest $request)
	{
		Pencocokan::create([
			'id_admin' => $request->id_admin,
			'id_pendonor' => $request->id_pendonor,
			'id_penerima' => $request->id_penerima
		]);

		$this->dbUpdate('donor', 'id_pendonor', $request->id_pendonor, ['id_penerima' => $request->id_penerima]);
		$this->dbUpdate('donor', 'id_penerima', $request->id_penerima, ['id_pendonor' => $request->id_pendonor]);
		$this->dbUpdate('pengguna', 'id', $request->id_pendonor, ['status' => 'm']);
		$this->dbUpdate('pengguna', 'id', $request->id_penerima, ['status' => 'm']);

		return back()->with('success', 'Pencocokan Berhasil ditambahkan');
	}

	public function setJadwal(Request $request)
	{
		$all = Donor::where('id', $request->id_d_pendonor)->get();
		$all = $all->union(Donor::where('id', $request->id_d_penerima)->get());
		foreach($all as $one) {
			$one->update(['tanggal' => $request->tgl, 'id_udd' => $request->id_udd]);
		}

		$this->dbUpdate('pengguna', 'id', $request->pendonorId, ['status' => 'p']);
		$this->dbUpdate('pengguna', 'id', $request->penerimaId, ['status' => 'p']);

		$pengirim = User::findOrFail($request->id_pengirim);
		$udd = UnitDonor::findOrFail($request->id_udd);
		$pesan = Pesan::create([
      'id_partisipan' => $request->id_partisipan,
      'id_pengirim' => $request->id_pengirim,
      'isi' => $pengirim->name . ' telah menetapkan jadwal pendonoran ' . $request->tgl . ' di ' . $udd->nama_unit,
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);

		return back()->with('success', 'Tanggal berhasil diatur');
	}

	public function fetch()
	{
		$pendonoranRepository = App::make(PendonoranRepositoryInterface::class);
		return $this->sendResponse($pendonoranRepository->all(), "Daftar pendonoran berhasil di dapatkan");
	}

	/* pindah ke repo */
	public function dbUpdate($table_name, $condition_col, $condition_val, $update) {
		return DB::table($table_name)->where($condition_col, $condition_val)->update($update);
	}
}
