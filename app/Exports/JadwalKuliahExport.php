<?php

namespace App\Exports;

use App\Models\JadwalKuliah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JadwalKuliahExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return JadwalKuliah::with('mataKuliah')->get()->map(function ($jadwal) {
            return [
                'Kode' => $jadwal->id,
                'Kelas' => $jadwal->kelas,
                'Mata Kuliah' => $jadwal->mataKuliah->nama,
                'Dosen' => $jadwal->dosen,
                'Hari' => $jadwal->hari,
                'Waktu' => $jadwal->waktu,
            ];
        });
    }

    /**
     * Define the headings for the excel sheet.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Kode',
            'Kelas',
            'Mata Kuliah',
            'Dosen',
            'Hari',
            'Waktu',
        ];
    }
}
