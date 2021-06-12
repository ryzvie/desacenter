@extends('layouts.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Total Member Per/ Desa</h5>
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
                            <form class="form-horizontal" method="get" action="{{ url('admin/laporan/member-desa') }}">


                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-label">Kode Desa</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                value="{{ $inputCallback['kodedesa'] }}" name="kodedesa" id="kodedesa"
                                                placeholder="Kode Desa" aria-describedby="kodedesa">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-label">Nama Desa</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                value="{{ $inputCallback['namadesa'] }}" name="namadesa" id="namadesa"
                                                placeholder="Nama Desa" aria-describedby="namadesa">
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
                            <form style="display: inline;" method="get" target="_blank"
                                action="{{ url('admin/laporan/member-desa-all') }}">
                                <input hidden type="text" class="form-control" value="{{ $inputCallback['kodedesa'] }}"
                                    name="kodedesa" id="kodedesa" placeholder="Kode Desa" aria-describedby="kodedesa">
                                <input hidden type="text" class="form-control" value="{{ $inputCallback['namadesa'] }}"
                                    name="namadesa" id="namadesa" placeholder="Nama Desa" aria-describedby="namadesa">
                                <input hidden type="text" class="form-control" value="1" name="btn" id="btn"
                                    aria-describedby="btn">
                                <button class="btn btn-outline-primary" style="margin-bottom: 10px;" type="submit">Print
                                    PDF</button>
                            </form>
                            <form style="display: inline;" method="get" target="_blank"
                                action="{{ url('admin/laporan/member-desa-all') }}">
                                <input hidden type="text" class="form-control" value="{{ $inputCallback['kodedesa'] }}"
                                    name="kodedesa" id="kodedesa" placeholder="Kode Desa" aria-describedby="kodedesa">
                                <input hidden type="text" class="form-control" value="{{ $inputCallback['namadesa'] }}"
                                    name="namadesa" id="namadesa" placeholder="Nama Desa" aria-describedby="namadesa">
                                <input hidden type="text" class="form-control" value="2" name="btn" id="btn"
                                    aria-describedby="btn">
                                <button class="btn btn-outline-success" style="margin-bottom: 10px;" type="submit">Print
                                    Excel</button>
                            </form>
                        </div>

                        <div class="table-responsive">
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

                            {{ $datamember->links('admin.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection