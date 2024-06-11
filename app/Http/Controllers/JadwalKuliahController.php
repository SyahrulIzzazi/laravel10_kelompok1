<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKuliah;
use App\Models\MataKuliah;

// Excel
use App\Exports\JadwalKuliahExport;
use Maatwebsite\Excel\Facades\Excel;

//PDF
use PDF;

class JadwalKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = JadwalKuliah::with('mataKuliah')->get();

        return view('jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matakuliahs = MataKuliah::all();
        return view('jadwal.create', compact('matakuliahs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required',
            'mata_kuliah_id' => 'required',
            'dosen' => 'required',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
        ], [
            'kelas.required' => 'Kelas perlu di isi!',
            'mata_kuliah_id.required' => 'Mata Kuliah perlu di isi!',
            'dosen.required' => 'Dosen perlu di isi!',
            'hari.required' => 'Hari perlu di isi!',
            'waktu_mulai.required' => 'Waktu mulai perlu di isi!',
            'waktu_selesai.required' => 'Waktu selesai perlu di isi!',
        ]);

        $waktu = $request->waktu_mulai . ' - ' . $request->waktu_selesai;


        JadwalKuliah::create([
            'kelas' => $request->kelas,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'dosen' => $request->dosen,
            'hari' => $request->hari,
            'waktu' => $waktu,
        ]);
        return redirect()->route('jadwal.index')->with('message', 'Jadwal berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalKuliah $jadwalKuliah)
    {
        return view('jadwal.show', compact('jadwalKuliah'));
    }


    public function edit(JadwalKuliah $jadwal)
    {
        $matakuliahs = MataKuliah::all();
        return view('jadwal.edit', compact('jadwal', 'matakuliahs'));
    }

    public function update(Request $request, JadwalKuliah $jadwal)
    {
        $request->validate([
            'kelas' => 'required',
            'mata_kuliah_id' => 'required',
            'dosen' => 'required',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
        ], [
            'kelas.required' => 'Kelas perlu di isi!',
            'mata_kuliah_id.required' => 'Mata Kuliah perlu di isi!',
            'dosen.required' => 'Dosen perlu di isi!',
            'hari.required' => 'Hari perlu di isi!',
            'waktu_mulai.required' => 'Waktu mulai perlu di isi!',
            'waktu_selesai.required' => 'Waktu selesai perlu di isi!',
        ]);

        $waktu = $request->waktu_mulai . ' - ' . $request->waktu_selesai;

        $jadwal->update([
            'kelas' => $request->kelas,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'dosen' => $request->dosen,
            'hari' => $request->hari,
            'waktu' => $waktu
        ]);

        return redirect()->route('jadwal.index')->with('message', 'Jadwal berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy($id)
    {
        $jadwalKuliah = JadwalKuliah::findOrFail($id);
        $jadwalKuliah->delete();
        return redirect()->route('jadwal.index')->with('message', 'Jadwal berhasil dihapus!');
    }

    public function export()
    {
        return Excel::download(new JadwalKuliahExport, 'jadwal_kuliah.xlsx');
    }

    public function downloadPDF()
    {
        $jadwalKuliah = JadwalKuliah::with('mataKuliah')->get();

        $pdf = PDF::loadView('jadwal_kuliah.pdf', ['jadwalKuliah' => $jadwalKuliah]);

        return $pdf->download('jadwal_kuliah.pdf');
    }
}
