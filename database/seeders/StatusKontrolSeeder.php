<?php

namespace Database\Seeders;

use App\Models\StatusKontrol;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class StatusKontrolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [];

        // Simulasi perubahan status aktuator (humidifier / kipas)
        $statuses   = ['ON', 'OFF', 'ON', 'OFF', 'ON', 'OFF', 'ON', 'ON', 'OFF', 'ON'];
        $intervalMenit = 144; // tiap ~2.4 jam dalam 24 jam

        foreach ($statuses as $index => $status) {
            $waktu = Carbon::now()->subMinutes(($statuses_count = count($statuses) - $index) * $intervalMenit);

            $records[] = [
                'waktu'      => $waktu,
                'status'     => $status,
                'created_at' => $waktu,
                'updated_at' => $waktu,
            ];
        }

        // Status terakhir: ON (aktuator sedang aktif)
        $records[] = [
            'waktu'      => now(),
            'status'     => 'ON',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        StatusKontrol::insert($records);

        $this->command->info('✓ StatusKontrolSeeder: ' . count($records) . ' data status berhasil dibuat.');
    }
}
