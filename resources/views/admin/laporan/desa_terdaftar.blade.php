@extends('layouts.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Desa yang Terdaftar di DesaCenter.id</h5>
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
                            <div class="">
                                {{ $instansi->links('admin.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection