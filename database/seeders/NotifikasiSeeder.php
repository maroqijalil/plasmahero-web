<?php

namespace Database\Seeders;

use App\Common\Models\Notifikasi;
use App\Common\Models\User;
use Database\Factories\NotifikasiFactory;
use Illuminate\Database\Seeder;

class NotifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $notifikasifactory = new NotifikasiFactory;
        $notifWelcomePendonor = 'Selamat datang di plasmahero. Role anda adalah pendonor. Silakan mengajukan donor pada halaman donor bila ingin mendonor.';
        $notifWelcomePenerima = 'Selamat datang di plasmahero. Role anda adalah penerima. Silakan mengajukan permintaan pada halaman donor bila ingin mencari pendonor.';
        $notifMatching = 'akan dicocokan.';
        $notifMatched = 'telah dicocokan.';
        $notifSelesai = 'Selamat anda telah selesai mendonor. Terimakasih atas partisipasinya. Semoga bermanfaat. Jangan lupa untuk mengisi berita acara.';
        $notifBeritaAcara = 'Terimakasih telah mengisi berita acara.';
        //indexing
        $arrayJudul = ['Welcome Pendonor', 'Welcome Penerima', 'Matching', 'Matched', 'Selesai', 'Berita Acara'];
        $arrayKeterangan = [$notifWelcomePendonor, $notifWelcomePenerima, $notifMatching, $notifMatched, $notifSelesai, $notifBeritaAcara];

        for ($i=0; $i<5; $i++){
            Notifikasi::factory()
            ->state(['judul' => $arrayJudul[$i], 'isi' => $arrayKeterangan[$i], 'keterangan' => 'verified'])
            ->create();
        }
    }
}
