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

    <table class="table table-bordered">
        <thead style="background-color: #283593; color: #fff; padding: 5px">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Instansi</th>
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