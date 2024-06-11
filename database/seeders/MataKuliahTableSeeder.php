<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MataKuliah;

class MataKuliahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mataKuliah = [
            [
                'nama' => 'Akuntansi',
            ],
            [
                'nama' => 'Statistika',
            ],
            [
                'nama' => 'Matematika Murni',
            ],
        ];

        MataKuliah::insert($mataKuliah);
    }
}
