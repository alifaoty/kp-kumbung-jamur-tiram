<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePanenRequest;
use App\Http\Resources\PanenResource;
use App\Models\Panen;
use App\Traits\ApiResponse;
use Throwable;

class PanenController extends Controller
{
    use ApiResponse;

    /**
     * GET /api/panen
     * Menampilkan semua data panen beserta informasi siklus.
     */
    public function index()
    {
        $panen = Panen::with('siklus')
            ->latest('tanggal_panen')
            ->paginate(10);

        return $this->successResponse(
            PanenResource::collection($panen)->response()->getData(true),
            'Data panen berhasil diambil.'
        );
    }

    /**
     * POST /api/panen
     * Mencatat hasil panen baru ke dalam siklus tertentu.
     */
    public function store(StorePanenRequest $request)
    {
        try {
            $panen = Panen::create($request->validated());

            return $this->createdResponse(
                new PanenResource($panen->load('siklus')),
                'Data panen berhasil dicatat.'
            );
        } catch (Throwable $e) {
            return $this->errorResponse(
                'Gagal menyimpan data panen.',
                $e->getMessage(),
                500
            );
        }
    }

    /**
     * GET /api/panen/{id}
     * Menampilkan detail satu data panen.
     */
    public function show(int $id)
    {
        $panen = Panen::with('siklus')->find($id);

        if (!$panen) {
            return $this->notFoundResponse('Data panen tidak ditemukan.');
        }

        return $this->successResponse(
            new PanenResource($panen),
            'Detail panen berhasil diambil.'
        );
    }

    /**
     * PUT /api/panen/{id}
     * Mengupdate data panen.
     */
    public function update(StorePanenRequest $request, int $id)
    {
        $panen = Panen::find($id);

        if (!$panen) {
            return $this->notFoundResponse('Data panen tidak ditemukan.');
        }

        try {
            $panen->update($request->validated());

            return $this->successResponse(
                new PanenResource($panen->load('siklus')),
                'Data panen berhasil diperbarui.'
            );
        } catch (Throwable $e) {
            return $this->errorResponse(
                'Gagal memperbarui data panen.',
                $e->getMessage(),
                500
            );
        }
    }

    /**
     * DELETE /api/panen/{id}
     * Menghapus data panen.
     */
    public function destroy(int $id)
    {
        $panen = Panen::find($id);

        if (!$panen) {
            return $this->notFoundResponse('Data panen tidak ditemukan.');
        }

        try {
            $panen->delete();

            return $this->successResponse(
                null,
                'Data panen berhasil dihapus.'
            );
        } catch (Throwable $e) {
            return $this->errorResponse(
                'Gagal menghapus data panen.',
                $e->getMessage(),
                500
            );
        }
    }
}
