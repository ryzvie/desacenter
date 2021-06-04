@extends('layouts.auth')

@section('content')

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

                                <h4 class="text-center mt-5">Login akun desacenter.id</h4>
                                @if(Session::has('status'))
                                    <div class="alert alert-danger">{{ Session::get('status')  }}</div>
                                @endif

                                <div id="notifikasi"></div>
                                <form class="mt-5 mb-5">

                                    @csrf
                                    <div class="alert alert-warning" style="font-size:12px;">
                                        Kode OTP akan dikirim melalui SMS. Pastikan Nomor Telepon anda valid dan aktif.
                                    </div>
                                    <div class="form-group" id="form-phone">
                                        <label>Nomor Telepon</label>
                                        <div>
                                            <div class="input-group">
                                                <div class="input-group-append bg-custom b-0"><span class="input-group-text">+62</span></div>
                                                <input type="tel" class="form-control" placeholder="81234567890"  onblur="$(this).val(Number($(this).val()))" name="phone" id="phone">
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                    <div class="form-group" id="form-otp">
                                        <label>Kode OTP</label>
                                        <input type="tel" minlength="6" maxlength="6" class="form-control" placeholder="6 Digit Kode OTP" name="otp" id="otp">
                                    </div>

                                    <div class="text-center mb-4 mt-4">
                                        <button type="button" class="btn btn-primary" id="btn-masuk"> Masuk</button>
                                        <button type="button" class="btn btn-primary" id="btn-verifikasi"> Verifikasi</button>
                                    </div>

                                    <div class="recaptcha-container" id="recaptcha-container" style="display: none;"></div>
                                </form>
                                <div class="text-center">
                                    <h5 class="mb-5">Atau masuk dengan</h5>
                                    <ul class="list-inline">
                                        <li class="list-inline-item m-t-10"><a type="button" onclick="return alert('Maaf fitur ini masih dalam pengembangan.') " class="btn btn-google-plus"><i class="fa fa-google-plus"></i> Google</a>
                                        </li>
                                    </ul>
                                    <p class="mt-5">Belum punya akun? <a href="{{url('/register')}}">Daftar Sekarang</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->

        
    @endsection