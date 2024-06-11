<!-- Edit Jadwal -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Jadwal
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="POST" action="{{ route('jadwal.update', $jadwal->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div>
                                <label for="kelas" class="block font-medium text-sm text-gray-700">Kelas</label>
                                <input type="text" name="kelas" id="kelas" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('kelas', $jadwal->kelas) }}" />
                                @error('kelas')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label for="mata_kuliah_id" class="block font-medium text-sm text-gray-700">Mata Kuliah</label>
                                <select name="mata_kuliah_id" id="mata_kuliah_id" class="form-select rounded-md shadow-sm mt-1 block w-full p-2">
                                    <option value="">Pilih Mata Kuliah</option>
                                    @foreach($matakuliahs as $matakuliah)
                                    <option value="{{ $matakuliah->id }}" {{ old('mata_kuliah_id', $jadwal->mata_kuliah_id) == $matakuliah->id ? 'selected' : '' }}>
                                        {{ $matakuliah->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('mata_kuliah_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label for="dosen" class="block font-medium text-sm text-gray-700">Dosen Pengajar</label>
                                <input type="text" name="dosen" id="dosen" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('dosen', $jadwal->dosen) }}" />
                                @error('dosen')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label for="hari" class="block font-medium text-sm text-gray-700">Hari</label>
                                <select name="hari" id="hari" class="form-select rounded-md shadow-sm mt-1 block w-full p-2 cursor-pointer">
                                    <option value="">Pilih Hari</option>
                                    <option value="Senin" {{ old('hari', $jadwal->hari) == 'Senin' ? 'selected' : '' }}>Senin</option>
                                    <option value="Selasa" {{ old('hari', $jadwal->hari) == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                    <option value="Rabu" {{ old('hari', $jadwal->hari) == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                    <option value="Kamis" {{ old('hari', $jadwal->hari) == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                    <option value="Jumat" {{ old('hari', $jadwal->hari) == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                    <option value="Sabtu" {{ old('hari', $jadwal->hari) == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                    <option value="Minggu" {{ old('hari', $jadwal->hari) == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                                </select>
                                @error('hari')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label for="waktu_mulai" class="block font-medium text-sm text-gray-700">Waktu Mulai</label>
                                @php
                                $waktu = explode(' - ', $jadwal->waktu);
                                $waktuMulai = $waktu[0];
                                $waktuSelesai = $waktu[1];
                                @endphp
                                <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('waktu_mulai', $waktuMulai) }}" />
                                @error('waktu_mulai')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label for="waktu_selesai" class="block font-medium text-sm text-gray-700">Waktu Selesai</label>
                                <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('waktu_selesai', $waktuSelesai) }}" />
                                @error('waktu_selesai')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="flex items-center px-4 py-3 bg-gray-50 text-left sm:px-6 justify-between">
                            <a href="{{ route('jadwal.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Back
                            </a>

                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>