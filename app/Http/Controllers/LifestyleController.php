<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifestyleController extends Controller
{
    public function index()
    {
        return view('page.lifestyle');
    }

    // proses data lifestyle
    public function store(Request $request)
    {
        $data = $request->validate([
            'makanan'   => 'array',
            'olahraga'  => 'array',
            'aktivitas' => 'array',
        ]);

        $score = 0;

        // RULE MAKANAN
        $rulesMakanan = [
            'Sayuran' => 2,
            'Buah-buahan' => 2,
            'Nasi Putih' => 0,
            'Makanan Manis' => -1,
            'Makanan Cepat Saji' => -2,
        ];

        foreach ($data['makanan'] ?? [] as $item) {
            $score += $rulesMakanan[$item] ?? 0;
        }

        // RULE OLAHRAGA
        $rulesOlahraga = [
            'Lari' => 2,
            'Jalan Kaki' => 1,
            'Senam Ringan' => 1,
            'Berenang' => 2,
            'Tidak Berolahraga' => -3,
        ];

        foreach ($data['olahraga'] ?? [] as $item) {
            $score += $rulesOlahraga[$item] ?? 0;
        }

        // RULE AKTIVITAS
        $rulesAktivitas = [
            'Aktif bergerak' => 2,
            'Pekerjaan Fisik' => 2,
            'Kombinasi aktivitas' => 1,
            'Berkerja didepan komputer' => -1,
            'Banyak duduk' => -2,
        ];

        foreach ($data['aktivitas'] ?? [] as $item) {
            $score += $rulesAktivitas[$item] ?? 0;
        }

        // KEPUTUSAN
        if ($score >= 3) {
            $hasil = 'Bagus';
            $deskripsi = 'Pola hidup Anda sudah tergolong sehat. Pertahankan kebiasaan makan bergizi, rutin berolahraga, dan tetap aktif agar risiko penyakit metabolik seperti diabetes dapat ditekan.';
            $gambar = 'good.jpg';
        } else {
            $hasil = 'Kurang Bagus';
            $deskripsi = 'Pola hidup Anda masih perlu diperbaiki. Disarankan untuk meningkatkan konsumsi makanan sehat, mengurangi makanan manis dan cepat saji, serta melakukan aktivitas fisik secara rutin.';
            $gambar = 'bad.jpg';
        }

        return view('page.lifestyle', compact(
            'hasil',
            'deskripsi',
            'gambar',
            'score'
        ));
    }
}
