<?php

namespace Database\Seeders;

use App\Models\Panen;
use Illuminate\Database\Seeder;

class PanenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Siklus 1
            ['siklus_id' => 1, 'tanggal_panen' => '2024-02-01', 'jumlah_panen' => 45],
            ['siklus_id' => 1, 'tanggal_panen' => '2024-02-08', 'jumlah_panen' => 52],
            ['siklus_id' => 1, 'tanggal_panen' => '2024-02-15', 'jumlah_panen' => 48],
            // Siklus 2
            ['siklus_id' => 2, 'tanggal_panen' => '2024-04-10', 'jumlah_panen' => 70],
            ['siklus_id' => 2, 'tanggal_panen' => '2024-04-18', 'jumlah_panen' => 65],
            ['siklus_id' => 2, 'tanggal_panen' => '2024-04-25', 'jumlah_panen' => 72],
            // Siklus 3
            ['siklus_id' => 3, 'tanggal_panen' => '2024-07-05', 'jumlah_panen' => 55],
            ['siklus_id' => 3, 'tanggal_panen' => '2024-07-12', 'jumlah_panen' => 60],
        ];

        foreach ($data as &$row) {
            $row['created_at'] = now();
            $row['updated_at'] = now();
        }

        Panen::insert($data);

        $this->command->info('✓ PanenSeeder: 8 data panen berhasil dibuat.');
    }
}
