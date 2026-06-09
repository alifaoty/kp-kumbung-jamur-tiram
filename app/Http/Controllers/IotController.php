<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMonitoringRequest;
use App\Http\Requests\StoreStatusKontrolRequest;
use App\Http\Resources\MonitoringResource;
use App\Http\Resources\StatusKontrolResource;
use App\Models\Monitoring;
use App\Models\StatusKontrol;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class IotController extends Controller
{
    use ApiResponse;

    /**
     * POST /api/iot/monitoring
     * Menerima data sensor dari perangkat IoT dan menyimpannya ke tabel monitoring.
     */
    public function storeMonitoring(StoreMonitoringRequest $request)
    {
        try {
            $monitoring = Monitoring::create([
                'waktu'      => now(),
                'suhu'       => $request->suhu,
                'kelembapan' => $request->kelembapan,
            ]);

            return $this->createdResponse(
                new MonitoringResource($monitoring),
                'Data sensor berhasil disimpan.'
            );
        } catch (Throwable $e) {
            return $this->errorResponse(
                'Gagal menyimpan data sensor.',
                $e->getMessage(),
                500
            );
        }
    }

    /**
     * POST /api/iot/status
     * Menerima status aktuator dari perangkat IoT dan menyimpannya ke tabel status_kontrol.
     */
    public function storeStatus(StoreStatusKontrolRequest $request)
    {
        try {
            $status = StatusKontrol::create([
                'waktu'  => now(),
                'status' => $request->status,
            ]);

            return $this->createdResponse(
                new StatusKontrolResource($status),
                'Status aktuator berhasil disimpan.'
            );
        } catch (Throwable $e) {
            return $this->errorResponse(
                'Gagal menyimpan status aktuator.',
                $e->getMessage(),
                500
            );
        }
    }
}
