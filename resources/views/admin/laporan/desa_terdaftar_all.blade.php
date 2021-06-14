<html>

<head>
    <title>Laporan Data Desa Yang Terdaftar</title>
    <link href="{{ asset('assets/css/printpage.css') }}" rel="stylesheet">
</head>

<body>

    <table class="table table-bordered">
        <thead style="background-color: #283593; color: #fff; padding: 5px">
            <tr>
                <th colspan="9" class="judul">LAPORAN DATA DESA YANG TERDAFTAR</th>
            </tr>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Instansi</th>
                <th scope="col">Kode Instansi</th>
                <th scope="col">Provinsi</th>
                <th scope="col">Kabupaten</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Nama Kepala</th>
                <th scope="col">No Wa Kepala</th>
                <th scope="col">Nama Sekertaris</th>
                <th scope="col">No Wa Sekertaris</th>
            </tr>
        </thead>
        <tbody>
            @foreach($instansi_all as $datainstansi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $datainstansi->nama }}</td>
                <td>{{ $datainstansi->kode }}</td>
                <td>{{ $datainstansi->prov }}</td>
                <td>{{ $datainstansi->kab }}</td>
                <td>{{ $datainstansi->kec }}</td>
                <td>@if ($datainstansi->kep == null) -
                    @else {{ $datainstansi->kep }}
                    @endif</td>
                <td>@if ($datainstansi->wa_kep == null) -
                    @else {{ $datainstansi->wa_kep }}
                    @endif</td>
                <td>@if ($datainstansi->sek == null) -
                    @else {{ $datainstansi->sek }}
                    @endif</td>
                <td>@if ($datainstansi->wa_sek == null) -
                    @else {{ $datainstansi->wa_sek }}
                    @endif</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>