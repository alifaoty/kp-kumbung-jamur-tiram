<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSiklusRequest;
use App\Http\Resources\SiklusResource;
use App\Models\Siklus;
use App\Traits\ApiResponse;
use Throwable;

class SiklusController extends Controller
{
    use ApiResponse;

    /**
     * GET /api/siklus
     * Menampilkan semua siklus beserta relasi panen.
     */
    public function index()
    {
        $siklus = Siklus::with('panen')
            ->withCount('panen')
            ->latest()
            ->paginate(10);

        return $this->successResponse(
            SiklusResource::collection($siklus)->response()->getData(true),
            'Data siklus berhasil diambil.'
        );
    }

    /**
     * POST /api/siklus
     * Membuat siklus baru.
     */
    public function store(StoreSiklusRequest $request)
    {
        try {
            $siklus = Siklus::create($request->validated());

            return $this->createdResponse(
                new SiklusResource($siklus->load('panen')),
                'Siklus baru berhasil dibuat.'
            );
        } catch (Throwable $e) {
            return $this->errorResponse(
                'Gagal membuat siklus.',
                $e->getMessage(),
                500
            );
        }
    }

    /**
     * GET /api/siklus/{id}
     * Menampilkan detail siklus beserta semua data panen.
     */
    public function show(int $id)
    {
        $siklus = Siklus::with('panen')->find($id);

        if (!$siklus) {
            return $this->notFoundResponse('Siklus tidak ditemukan.');
        }

        return $this->successResponse(
            new SiklusResource($siklus),
            'Detail siklus berhasil diambil.'
        );
    }

    /**
     * PUT /api/siklus/{id}
     * Mengupdate data siklus.
     */
    public function update(StoreSiklusRequest $request, int $id)
    {
        $siklus = Siklus::find($id);

        if (!$siklus) {
            return $this->notFoundResponse('Siklus tidak ditemukan.');
        }

        try {
            $siklus->update($request->validated());

            return $this->successResponse(
                new SiklusResource($siklus->load('panen')),
                'Siklus berhasil diperbarui.'
            );
        } catch (Throwable $e) {
            return $this->errorResponse(
                'Gagal memperbarui siklus.',
                $e->getMessage(),
                500
            );
        }
    }

    /**
     * DELETE /api/siklus/{id}
     * Menghapus siklus beserta data panen terkait.
     */
    public function destroy(int $id)
    {
        $siklus = Siklus::find($id);

        if (!$siklus) {
            return $this->notFoundResponse('Siklus tidak ditemukan.');
        }

        try {
            $siklus->delete();

            return $this->successResponse(
                null,
                'Siklus berhasil dihapus.'
            );
        } catch (Throwable $e) {
            return $this->errorResponse(
                'Gagal menghapus siklus.',
                $e->getMessage(),
                500
            );
        }
    }
}
