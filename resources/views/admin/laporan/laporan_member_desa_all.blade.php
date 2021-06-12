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
    <title>Laporan Desa Ikut Program</title>
    <style type="text/css">
    body,
    td,
    th {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
        color: #000000
    }

    header {
        display: none;
    }

    footer {
        display: none;
    }

    .span1 {
        margin: 1px 1px 1px 1px;
    }

    .span2 {
        margin: 3px 3px 3px 3px
    }

    .red {
        color: red;
    }

    .kiri {
        width: 40%;
        float: left;
    }

    .divright {
        width: 60%;
        float: right;
        text-align: right;
    }

    .font10 {
        font-size: 10px;
    }

    .font14 {
        font-size: 14px;
        font-weight: 800;
    }

    .right {
        text-align: right
    }

    .garis-atas {
        border-top: 1px #000 solid;
    }

    .garis-bawah {
        border-bottom: 1px #000 solid;
    }

    .judul {
        border-top: 1px #000 solid;
        width: 100%;
        display: inline-block;
        border-bottom: 1px #000 solid;
        padding: 10px;
    }

    .tabel {
        border-collapse: collapse;
        border-bottom: 1px solid #ddd;
        width: 99%;
        left: 1%;
        position: relative;
    }

    .abs-right {
        position: absolute;
        right: 0;
    }

    .abs-left {
        position: absolute;
        left: 0
    }
    </style>
</head>

<body>

    <table class="table compact border-cell">
        <thead>
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