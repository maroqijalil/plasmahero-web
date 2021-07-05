<?php

namespace App\Admin\Controllers\Donation;

use App\Admin\Repositories\PendonoranRepositoryInterface;
use App\Common\Repositories\UserRepositoryInterface;
use App\Controller\BaseController;
use App\Common\Models\Pencocokan;
use App\Admin\Requests\StorePendonoranRequest;
use App\Common\Controllers\ChatController;
use App\Common\Models\Pengguna;
use App\Common\Models\Pesan;
use App\Common\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
		return view('admin.donor.donation', [
			'users' => $userRepository->all(),
			'pencocokans' => $pendonoranRepository->all()
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
		// dd($request->penerimaId);
		$this->dbUpdate('donor', 'id', $request->id_d_pendonor, ['tanggal' => $request->tgl]);
		$this->dbUpdate('donor', 'id', $request->id_d_penerima, ['tanggal' => $request->tgl]);
		$this->dbUpdate('pengguna', 'id', $request->pendonorId, ['status' => 'p']);
		$this->dbUpdate('pengguna', 'id', $request->penerimaId, ['status' => 'p']);

		$pengirim = User::findOrFail($request->id_pengirim);
		$pesan = Pesan::create([
      'id_partisipan' => $request->id_partisipan,
      'id_pengirim' => $request->id_pengirim,
      'isi' => $pengirim->name . ' telah menetapkan jadwal pendonoran ' . $request->tgl,
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
