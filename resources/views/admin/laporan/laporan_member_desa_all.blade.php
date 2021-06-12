<html>

<?php
if($btn == 1) {
    echo "<script>
    window.onafterprint = window.close;
    window.print();
    </script>";
}
else {
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Desa Ikut Program.xls");}
?>

<head>
    <title>Laporan Data Total Member Per / Desa</title>
    <link href="{{ asset('assets/css/printpage.css') }}" rel="stylesheet">
</head>

<body>

    <table class="table compact border-cell">
        <thead>
            <tr>
                <th colspan="7" class="judul">LAPORAN DATA TOTAL MEMBER PER / DESA</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Kode Desa</th>
                <th>Nama Desa</th>
                <th>Jumlah Anggota</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datamember as $datamembers)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $datamembers->provinsi }}</td>
                <td>{{ $datamembers->kabupaten }}</td>
                <td>{{ $datamembers->kecamatan }}</td>
                <td>{{ $datamembers->kodedesa }}</td>
                <td>{{ $datamembers->namadesa }}</td>
                <td>{{ $datamembers->jml }} Anggota</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>