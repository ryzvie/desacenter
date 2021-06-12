@extends('layouts.main')

@section('content')
<style>
    .note{
        color:red;
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Profil Akun</h5>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="color:#000 !important" href="javascript:void(0)">Layout</a>
                    </li>
                    <li style="color:#000 !important" class="breadcrumb-item active">Blank</li>
                </ol>
            </div>
            
        </div>

        @if( Session::has('status') )
            <div class="alert alert-success" style="font-size:14px;">
                {{ Session('status') }}

                @if(Session::has('button'))
                    <a href="{{ url('/join-desa') }}" type="button" style="font-size:14px;" class="btn btn-xs btn-primary">Join Desa</a>
                @endif
            </div>
        @endif

        @if( Session::has('statusError') )
            <div class="alert alert-danger" style="font-size:14px">
                {{ Session('statusError') }}
            </div>
        @endif
        
        <div class="row">
            
            <div class="col-lg-3">
                <div class="list-group mb-4 mb-lg-0 list-lg" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-profil-list"
                        data-toggle="list" href="#list-profil" role="tab"><span
                            class="mdi mdi-account-box-outline"></span> Profil Akun</a>
                    <a class="sr-only list-group-item list-group-item-action" id="list-profil-list" data-toggle="list"
                        href="#syncronize" role="tab"><span class="mdi mdi-office"></span> Syncronisasi Akun</a>
                </div>
            </div>
            

            <div class="col-lg-9">
                <!--- startcol  -->
                
                <div class="card">
                    <div class="card-body">

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-profil">


                                <h2 class="card-title">Data Profil Akun</h2>
                                <hr>
                                <div class="basic-form">
                                    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ url('profil/update') }}" >

                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-lg-12 text-center">
                                            @if( $response->foto == NULL)
                                                <img id="img" style="cursor:pointer;height:120px; width:125px;border:1px solid #ccc;" onclick="uploadfoto(this)" class="rounded-circle" alt="200x200" src="{{ (asset('assets/images/user-4.jpg')) }}" data-holder-rendered="true">
                                            @else
                                                <img id="img" style="cursor:pointer;height:120px; width:125px;border:1px solid #ccc;" onclick="uploadfoto(this)" class="rounded-circle" alt="200x200" src="{{ (asset('upload/profil/'.$response->foto)) }}" data-holder-rendered="true">
                                            @endif     
                                                
                                                <div style="color:#000; padding:10px 0px;">*Upload foto Profil (Jika ada) <br> Max Size : 2MB <br> Format : jpg, jpeg, png</div>
                                            </div>
                                        </div>

                                        <input type="file" name="file" style="display:none;" />

                                        <div class="sr-only form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Uid [Otomatis dari sistem]</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="text" readonly  class="form-control" id="uid" value="{{ $response->uid }}"
                                                        placeholder="Nama Lengkap" aria-describedby="uid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Nama *</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ $response->nama }}"
                                                        placeholder="Nama Lengkap" aria-describedby="nama">
                                                </div>
                                                @error('nama')
                                                    <div style="font-size:14px; padding:5px; margin-top:5px;" class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="sr-only form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Email</label>
                                            <div class="col-sm-9">
                                                
                                                <div class="input-group">
                                                    @php
                                                        if($response->email != "")
                                                        {
                                                            if(!$response->is_verifikasi_email)
                                                            {
                                                                $background = "#FF5722";
                                                                $color      = "#fff";
                                                            }
                                                            else
                                                            {
                                                                $background = "#00b000";
                                                                $color      = "#fff";
                                                            }
                                                        }
                                                        else
                                                        {
                                                            $background = "";
                                                            
                                                            $color      = "#000";
                                                        }
                                                    @endphp
                                                    <input type="text"  value="{{ $response->email }}" class="form-control @php echo $background @endphp  @error('email') is-invalid @enderror" name="email" id="Email"
                                                        placeholder="Email"
                                                        aria-describedby="email">
                                                </div>
                                                @error('email')
                                                    <div style="font-size:14px; padding:5px; margin-top:5px;" class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Nomor Telepon</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="text" readonly value="{{ $response->telp }}" class="form-control" id="dir_phone"
                                                        placeholder="No Handphone Aktif" aria-describedby="dir_phone">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="sr-only form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <textarea class="form-control" name="alamat" rows="9">{{ $response->alamat }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="note">
                                            <div>Catatan :</div>
                                            <div>Label yang bertanda (*) harus diisi.</div>
                                        </div>

                                        <div class="form-group text-right">
                                            <button type="" class="btn btn-md btn-primary mt-5">Simpan</button>
                                        </div>

                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="syncronize">
                                <h2 class="card-title">Syncronisasi User Akun</h2>
                                <hr>
                                <div class="basic-form">
                                    <form class="form-horizontal" method="POST" action="{{ url('profil/syncronisasidata') }}" >

                                        @csrf
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Nomor Telp.</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                <div class="input-group-append bg-custom b-0"><span class="input-group-text">+62</span></div>
                                                    <input type="text" readonly  class="form-control" id="telepone" name="telp" value="{{ substr($response->telp,3,99) }}"
                                                        placeholder="Telpone" aria-describedby="Telpone">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-md btn-primary mt-5">Syncronisasi Data</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- endcol-->

        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->

<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-analytics.js"></script>
<script type="text/javascript">
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyAnFw2cck0mhVurHRkS9YFoBac-A80-bco",
        authDomain: "desacenter-41018.firebaseapp.com",
        projectId: "desacenter-41018",
        storageBucket: "desacenter-41018.appspot.com",
        messagingSenderId: "816125856145",
        appId: "1:816125856145:web:063b22b74507452050b230",
        measurementId: "G-BWL2M9WNXQ"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    $(document).ready(function(){

        $("input[type='file']").on("change", function(){
           var input = this;
           
           if(input.files != "" && input.files[0] != "")
           {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img').attr('src', e.target.result);
                    $('#img').val(e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
           }
            
        });
    });
        

    function uploadfoto(obj)
    {
        $("input[name='file'][type='file']").click();
    }

    function verifikasiemail(obj)
    {
        
        var email   = $("input[name='email']").val();
        var nama    = $("input[name='nama']").val();

        var actionCodeSettings = {
            // URL you want to redirect back to. The domain (www.example.com) for this
            // URL must be in the authorized domains list in the Firebase Console.
            url: '{{ url("profil/verifikasiFinish") }}?nama='+nama+'&email='+email,
            // This must be true.
            handleCodeInApp: true
        };
        
        $(obj).parent().parent().find("input").prop("readonly", true);

        firebase.auth().sendSignInLinkToEmail(email, actionCodeSettings)
        .then(() => {
            // The link was successfully sent. Inform the user.
            // Save the email locally so you don't need to ask the user for it again
            // // if they open the link on the same device.
            // $.ajax({
            //     url : "{{ url('profil/setOldVerifikasiEmail') }}",
            //     type : "POST",
            //     dataType : "JSON",
            //     data : {
            //         email : email,
            //         nama : nama
            //     },
            //     beforeSend : function(xhr)
            //     {
            //         $(obj).html("Loading. . .");
            //     },
            //     success : function(result, status)
            //     {
            //         console.log("Session set complete");

                    
            //     },
            //     error : function(error, status, error)
            //     {
            //         console.log(error);
            //     },
            //     complete : function(xhr)
            //     {
            //         $(obj).html("Verifikasi Email");
            //     }
            // });

            window.localStorage.setItem('emailForSignIn', email);
            $(obj).parent().parent().parent().append("<div class='alert-success' style='margin-top:10px; padding:5px 10px;'>Verifikasi email telah dikirim ke email anda. Silahkan cek email anda dan lakukan verifikasi.</div>");
            // ...
        })
        .catch((error) => {
            var errorCode = error.code;
            var errorMessage = error.message;
            alert("error");
            console.log(errorMessage);
            // ...
        });
    }


</script>

@endsection