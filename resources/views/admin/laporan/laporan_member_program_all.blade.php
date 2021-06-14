<html>

<head>
    <title>Laporan Data Member Yang Ikut Program</title>
    <link href="{{ asset('assets/css/printpage.css') }}" rel="stylesheet">
</head>

<body>

    <table class="table compact border-cell">
        <thead>
            <tr>
                <th colspan="7" class="judul">LAPORAN DATA MEMBER YANG IKUT PROGRAM</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Program</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Kode Desa</th>
                <th>Nama Desa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peserta as $pesertas)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pesertas->namatraining }}</td>
                <td>{{ $pesertas->nama }}</td>
                <td>{{ $pesertas->email }}</td>
                <td>{{ $pesertas->telp }}</td>
                <td>{{ $pesertas->kodedesa }}</td>
                <td>{{ $pesertas->namadesa }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>