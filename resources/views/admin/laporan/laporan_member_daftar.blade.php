@extends('layouts.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Member Daftar desacenter.id</h5>
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
                                action="{{ url('admin/laporan/member-daftar') }}">


                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-label">Nama Peserta</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                value="{{ $inputCallback['namapeserta'] }}" name="namapeserta"
                                                id="namapeserta" placeholder="Nama Peserta"
                                                aria-describedby="namapeserta">
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
                                action="{{ url('admin/laporan/member-daftar-all') }}">
                                <input hidden type="text" class="form-control"
                                    value="{{ $inputCallback['namapeserta'] }}" name="namapeserta" id="namapeserta"
                                    aria-describedby="namapeserta">
                                <input hidden type="text" class="form-control" value="1" name="btn" id="btn"
                                    aria-describedby="btn">
                                <button class="btn btn-outline-primary" style="margin-bottom: 10px;" type="submit">Print
                                    PDF</button>
                            </form>
                            <form style="display: inline;" method="get" target="_blank"
                                action="{{ url('admin/laporan/member-daftar-all') }}">
                                <input hidden type="text" class="form-control"
                                    value="{{ $inputCallback['namapeserta'] }}" name="namapeserta" id="namapeserta"
                                    aria-describedby="namapeserta">
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

                            {{ $peserta->links('admin.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection