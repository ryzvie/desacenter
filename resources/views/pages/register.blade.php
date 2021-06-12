@extends('layouts.auth')

@section('content')
    <style>
        .btn-default{
            background:#f9f9f9;
            border:1px solid #ccc;
            border-radius:3px;
            color:#555 !important;
            font-size:13px;
        }
    </style>

    <div class="login-bg2 h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-between h-100">
                <div class="col-xl-4">
                    <div class="login-info">
                        <h2>Majukan Desa bersama kami</h2>
                        <p class="mb-5">Daftarkan akun anda di desacenter.id. <br>
                        Gabung dengan Desa anda. <br>
                        Dan ikuti program yang ada di dalamnya.</p>
                        
                        <h5>Contact Center</h5>
                        <h5>+62 857-7290-0800</h5>
                        <h5>Email: syncore.bumdes@gmail.com</h5>

                        <br>

                        <h5>Office Hour</h5>
                        <h5>Senin s.d Jumat : 08.00 - 17.00</h5>
                        <h5>Sabtu : 08.00 - 14.00</h5>
                    </div>
                </div>
                <div class="col-xl-3 p-0">
                    <div class="form-input-content login-form bg-white">
                        <div class="card">
                            <div class="card-body">
                                <div class="logo text-center">
                                    <a href="{{ url('/login') }}">
                                        <img src="{{ asset('assets/images/dsc_logo.png') }}" alt="desacenter-logo" style="height: 50px" >
                                    </a>
                                </div>

                                <h4 class="text-center mt-5">Daftar akun desacenter.id</h4>
                                @if(Session::has('status'))
                                    <div style="font-size:13px; padding:5px;" class="alert-danger">{{ Session::get('status')  }}</div>
                                @endif

                                <div id="notifikasi"></div>
                                <form method="POST" action="{{ url('akun/daftarakun') }}" class="mt-4 mb-4">

                                    @csrf
                                    <div class="form-group">
                                        @if( Session::has('old_nama'))
                                            <input type="text" value="{{ Session('old_nama') }}" class="form-control" placeholder="(*) Nama Lengkap" name="nama" id="nama">
                                        @else
                                            <input type="text" value="{{ old('nama') }}" class="form-control" placeholder="(*) Nama Lengkap" name="nama" id="nama">
                                        @endif

                                        @error('nama')
                                            <div class="alert-danger mt-3" style="font-size:13px; padding:5px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    

                                    <div class="form-group">
                                        @if( Session::has('old_email') )
                                            <input type="email" value="{{ Session('old_email') }}" class="form-control" placeholder="(*) Email" name="email" id="email">
                                        @else
                                            <input type="email" value="{{ old('email') }}" class="form-control" placeholder="(*) Email" name="email" id="email">
                                        @endif

                                        @error('email')
                                            <div class="alert-danger mt-3" style="font-size:13px; padding:5px;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <div class="input-group">
                                                <div class="input-group-append bg-custom b-0"><span class="input-group-text">+62</span></div>
                                                <input type="tel" class="form-control" placeholder="(*) Masukan Nomor Telp"  onblur="$(this).val(Number($(this).val()))" name="telp" id="telp">
                                            </div><!-- input-group -->
                                            @error('telp')
                                                <div class="alert-danger mt-3" style="font-size:13px; padding:5px;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group" style="color:red">
                                        <div>Catatan : </div>
                                        <div>label yang bertanda (*) harus diisi.</div>
                                    </div>

                                    <div class="text-center mb-4 mt-4">
                                        <button type="submit" class="btn btn-primary"> Daftar </button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->

        
    @endsection