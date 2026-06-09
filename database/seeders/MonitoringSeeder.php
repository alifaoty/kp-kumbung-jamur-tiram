<?php

namespace Database\Seeders;

use App\Models\Monitoring;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class MonitoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [];

        // Generate data monitoring tiap 15 menit selama 24 jam terakhir
        for ($i = 24 * 4; $i >= 0; $i--) {
            $waktu = Carbon::now()->subMinutes($i * 15);

            // Simulasi fluktuasi suhu dan kelembapan kumbung jamur tiram
            // Suhu optimal: 25–28°C | Kelembapan optimal: 80–90%
            $suhu       = round(25 + (mt_rand(0, 40) / 10), 2); // 25.0 – 29.0
            $kelembapan = round(80 + (mt_rand(0, 100) / 10), 2); // 80.0 – 90.0

            $records[] = [
                'waktu'      => $waktu,
                'suhu'       => $suhu,
                'kelembapan' => $kelembapan,
                'created_at' => $waktu,
                'updated_at' => $waktu,
            ];
        }

        // Insert per chunk agar tidak overload
        foreach (array_chunk($records, 50) as $chunk) {
            Monitoring::insert($chunk);
        }

        $this->command->info('✓ MonitoringSeeder: ' . count($records) . ' data sensor berhasil dibuat.');
    }
}
