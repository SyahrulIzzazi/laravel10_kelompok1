<!DOCTYPE html>
<html>

<head>
    <title>Jadwal Kuliah</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Jadwal Kuliah</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kelas</th>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Hari</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwalKuliah as $jadwal)
            <tr>
                <td>{{ $jadwal->id }}</td>
                <td>{{ $jadwal->kelas }}</td>
                <td>{{ $jadwal->mataKuliah->nama }}</td>
                <td>{{ $jadwal->dosen }}</td>
                <td>{{ $jadwal->hari }}</td>
                <td>{{ $jadwal->waktu }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>