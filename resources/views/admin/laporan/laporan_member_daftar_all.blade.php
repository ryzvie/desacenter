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
    <title>Laporan Data Member Yang MENDAFTAR</title>
    <link href="{{ asset('assets/css/printpage.css') }}" rel="stylesheet">
</head>

<body>

    <table class="table compact border-cell">
        <thead>
            <tr>
                <th colspan="6" class="judul">LAPORAN DATA MEMBER YANG MENDAFTAR</th>
            </tr>
            <tr>
                <th>#</th>
                <th>PIN</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>DateTime</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peserta as $pesertas)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pesertas->pin }}</td>
                <td>{{ $pesertas->nama }}</td>
                <td>{{ $pesertas->email }}</td>
                <td>{{ $pesertas->telp }}</td>
                <td>{{ date("d M Y H:i:s", strtotime($pesertas->date_entry)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>