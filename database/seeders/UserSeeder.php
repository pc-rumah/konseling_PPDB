<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Admin
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@bk.smp',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole('admin');

        // 2. Guru BK
        $guruBK = User::create([
            'name' => 'Bu Ani Guru BK',
            'email' => 'gurubk@bk.smp',
            'password' => Hash::make('password123'),
        ]);
        $guruBK->assignRole('guru_bk');

        // 3. Wali Kelas (Contoh: Wali Kelas 7A)
        $waliKelas = User::create([
            'name' => 'Pak Budi Wali Kelas',
            'email' => 'walikelas@bk.smp',
            'password' => Hash::make('password123'),
            'kelas_id' => 1,
        ]);
        $waliKelas->assignRole('wali_kelas');

        // 4. Siswa (Contoh 3 siswa)
        $siswas = [
            [
                'name' => 'Siswa 1',
                'email' => 'siswa1@bk.smp',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Siswa 2',
                'email' => 'siswa2@bk.smp',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Siswa 3',
                'email' => 'siswa3@bk.smp',
                'password' => Hash::make('password123'),
            ]
        ];

        foreach ($siswas as $siswa) {
            $user = User::create($siswa);
            $user->assignRole('siswa');
        }

        $this->command->info('User dengan role berhasil dibuat!');
    }
}
