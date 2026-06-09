<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\MonitoringResource;
use App\Http\Resources\StatusKontrolResource;
use App\Models\Monitoring;
use App\Models\Panen;
use App\Models\Siklus;
use App\Models\StatusKontrol;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    use ApiResponse;

    /**
     * GET /api/dashboard/latest
     * Menampilkan data terbaru: suhu, kelembapan, dan status aktuator.
     */
    public function latest()
    {
        $monitoring = Monitoring::latest('waktu')->first();
        $status     = StatusKontrol::latest('waktu')->first();

        if (!$monitoring && !$status) {
            return $this->errorResponse('Belum ada data yang masuk.', null, 404);
        }

        return $this->successResponse([
            'suhu_terakhir'       => $monitoring ? (float) $monitoring->suhu : null,
            'kelembapan_terakhir' => $monitoring ? (float) $monitoring->kelembapan : null,
            'waktu_monitoring'    => $monitoring?->waktu?->format('Y-m-d H:i:s'),
            'status_aktuator'     => $status?->status,
            'waktu_status'        => $status?->waktu?->format('Y-m-d H:i:s'),
        ], 'Data terbaru berhasil diambil.');
    }

    /**
     * GET /api/dashboard/statistik
     * Menampilkan statistik harian dan ringkasan produksi.
     */
    public function statistik()
    {
        // Rata-rata suhu hari ini
        $avgSuhu = Monitoring::today()->avg('suhu');

        // Rata-rata kelembapan hari ini
        $avgKelembapan = Monitoring::today()->avg('kelembapan');

        // Total panen keseluruhan
        $totalPanen = Panen::sum('jumlah_panen');

        // Total backlog dari semua siklus aktif
        $totalBacklog = Siklus::sum('jumlah_backlog');

        // Jumlah data sensor hari ini
        $jumlahDataHariIni = Monitoring::today()->count();

        // Status aktuator terakhir
        $statusAktuator = StatusKontrol::latest('waktu')->value('status');

        return $this->successResponse([
            'hari_ini' => [
                'rata_rata_suhu'       => $avgSuhu ? round((float) $avgSuhu, 2) : null,
                'rata_rata_kelembapan' => $avgKelembapan ? round((float) $avgKelembapan, 2) : null,
                'jumlah_data_sensor'   => $jumlahDataHariIni,
                'tanggal'              => today()->format('Y-m-d'),
            ],
            'produksi' => [
                'total_panen_kg'    => (int) $totalPanen,
                'total_backlog'     => (int) $totalBacklog,
                'total_siklus'      => Siklus::count(),
                'total_data_panen'  => Panen::count(),
            ],
            'aktuator' => [
                'status_terakhir' => $statusAktuator,
            ],
        ], 'Statistik berhasil diambil.');
    }
}
