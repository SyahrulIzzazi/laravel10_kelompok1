{{-- resources/views/jadwalKuliah/show.blade.php --}}
@extends('layouts.app')

@section('content')
<h1>Detail Jadwal Kuliah</h1>
<p>Kelas: {{ $jadwalKuliah->kelas }}</p>
<p>Mata Kuliah: {{ $jadwalKuliah->mataKuliah->nama }}</p>
@endsection