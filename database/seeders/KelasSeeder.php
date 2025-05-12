<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create(['nama_kelas' => '7A']);
        Kelas::create(['nama_kelas' => '7B']);
        Kelas::create(['nama_kelas' => '7C']);
        Kelas::create(['nama_kelas' => '8A']);
        Kelas::create(['nama_kelas' => '8B']);
        Kelas::create(['nama_kelas' => '8C']);
        Kelas::create(['nama_kelas' => '9A']);
        Kelas::create(['nama_kelas' => '9B']);
        Kelas::create(['nama_kelas' => '9C']);

        $this->command->info('Seeder Kelas sudah diisi');
    }
}
