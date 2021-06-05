@extends('layouts.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Dashboard</h5>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb" >
                    <li class="breadcrumb-item"><a style="color:#000 !important;" href="javascript:void(0)">Layout</a>
                    </li>
                    <li style="color:#000 !important;" class="breadcrumb-item active">Blank</li>
                </ol>
            </div>
            
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div style="text-align:center">
                    <img style="width:50%;" src="{{ asset('assets/images/dashboard.svg') }}" />

                    <div>Selamat Datang di halaman admin desacennter.id</div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection