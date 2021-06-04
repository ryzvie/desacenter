@extends('layouts.main')

@section('content')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Profil Bumdes</h5>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="color:#000 !important" href="javascript:void(0)">Layout</a>
                    </li>
                    <li style="color:#000 !important" class="breadcrumb-item active">Blank</li>
                </ol>
            </div>
            
        </div>

        @if($isIsiBumdes == 0)
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <div>
                        <span style="font-size:100px;" class="mdi mdi-server-security"></span> 
                    </div>

                    <div style="margin-bottom:10px;">Maaf anda belum melakukan gabung desa. <br> Silahkan lakukan gabung desa dengan klik tombol dibawah ini</div>
                    <div>
                        <a href="{{ url('join-desa') }}" type="button" class="btn btn-xs btn-primary">Gabung Desa</a>
                    </div>
                </div>
            </div>
        </div>

        @else
            
        <div class="row">
            <div class="col-lg-12">
                <div class="cards">
                    <div class="card-body">
                        
                        <div style="text-align:center">

                            <span style="font-size:85px;" class="mdi mdi-home-assistant"></span>
                            <div style="color:#000;">Apakah desa anda memiliki bumdes ?</div>

                            <div style="padding:10px; color:#000;">Beberapa program mengharuskan anda untuk memiliki bumdes <br> yang terdaftar pada KEMENDES.</div>

                            <div style="padding:10px; color:#000;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1"> Ya, desa kami memiliki bumdes.</label>
                                </div>
                            </div>

                            <div>
                                <button id="btn-bumdes" type="button" disabled class="btn btn-primary btn-xs"> Lanjut, Lengkapi Info Bumdes</button>
                            </div>
                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->



@endsection

@section('script')
<script type="text/javascript">

    $(document).ready(function(){
        $("#customCheck1").on("click", function(e){

            var isCheck = $(this).is(":checked");

            if(isCheck)
            {
                $("#btn-bumdes").prop("disabled", false);
            }
            else
            {
                $("#btn-bumdes").prop("disabled", true);
            }
        
        });

        $("#btn-bumdes").on("click", function(e){

            window.location.href = "/profil/info-bumdes";
        });
    });
</script>
@endsection