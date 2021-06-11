@extends('layouts.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Desa yang Mengikuti Program</h5>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="color:#000 !important;" href="javascript:void(0)">Layout</a>
                    </li>
                    <li style="color:#000 !important;" class="breadcrumb-item active">Blank</li>
                </ol>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-8">
                            <form class="form-horizontal" method="get"
                                action="{{ url('admin/laporan/desa-ikut-program') }}">


                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-label">Nama Instansi</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                value="{{ $inputCallback['namainstansi'] }}" name="namainstansi"
                                                id="namainstansi" placeholder="Nama Instansi"
                                                aria-describedby="namainstansi">
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-xs btn-primary">Cari Data</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <form method="get" target="_blank" style="display: inline;"
                                action="{{ url('admin/laporan/desa-ikut-program-all') }}">
                                <input hidden type="text" class="form-control"
                                    value="{{ $inputCallback['namainstansi'] }}" name="namainstansi" id="namainstansi"
                                    aria-describedby="namainstansi">
                                <input hidden type="text" class="form-control" value="1" name="btn" id="btn"
                                    aria-describedby="btn">
                                <button class="btn btn-outline-primary" style="margin-bottom: 10px;" type="submit">Print
                                    PDF</button>
                            </form>
                            <form method="get" target="_blank" style="display: inline;"
                                action="{{ url('admin/laporan/desa-ikut-program-all') }}">
                                <input hidden type="text" class="form-control"
                                    value="{{ $inputCallback['namainstansi'] }}" name="namainstansi" id="namainstansi"
                                    aria-describedby="namainstansi">
                                <input hidden type="text" class="form-control" value="2" name="btn" id="btn"
                                    aria-describedby="btn">
                                <button class="btn btn-outline-success" style="margin-bottom: 10px;" type="submit">Print
                                    Excel</button>
                            </form>
                        </div>

                        <div class="table-responsive">
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
                                    @foreach($instansi as $datainstansi)
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
                        </div>
                        <div class="">
                            {{ $instansi->links('admin.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection