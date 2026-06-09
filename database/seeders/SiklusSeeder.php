<?php

namespace Database\Seeders;

use App\Models\Siklus;
use Illuminate\Database\Seeder;

class SiklusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'tanggal_mulai'  => '2024-01-10',
                'jumlah_backlog' => 500,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'tanggal_mulai'  => '2024-03-15',
                'jumlah_backlog' => 750,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'tanggal_mulai'  => '2024-06-01',
                'jumlah_backlog' => 600,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ];

        Siklus::insert($data);

        $this->command->info('✓ SiklusSeeder: 3 siklus berhasil dibuat.');
    }
}
