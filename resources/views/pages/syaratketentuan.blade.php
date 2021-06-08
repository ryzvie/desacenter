@extends('layouts.main')

@section('content')
<style>
    .box-syaratketentuan{
        border:1px solid #ccc;
        box-shadow:1px 1px 10px #ccc;
        padding:10px;
        overflow-y:scroll;
        overflow-x:hidden;
        height:500px;
        text-align: justify;
        color:#000;
        font-size:16px;
    }

    .box-syaratketentuan ul {
        margin:20px !important;
    }

    .box-syaratketentuan ul li{
        padding:5px !important;
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Syarat & Ketentuan Program</h5>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="color:#000 !important" href="javascript:void(0)">Layout</a>
                    </li>
                    <li style="color:#000 !important" class="breadcrumb-item active">Blank</li>
                </ol>
            </div>
            
        </div>

        <div class="row">
            

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 style="margin-bottom:10px;">Persetujuan Lisensi</h4>
                                <div style="color:#000;">Mohon dibaca mengikuti informasi penting sebelum melanjutkan. Untuk melanjutkan mengikuti program anda harus menyetujui Syarat dan ketentuan ini.</div>
                                <br>
                                <div class="box-syaratketentuan">
                                    @php
                                    echo $training->first()->syarat_ketentuan;
                                    @endphp
                                </div>
                                <br>
                                <div style="color:#000;">
                                    <input type="checkbox" role="checkbox"> Apakah anda menyetujui syarat & ketentuan kami dari desacenter.id ?
                                </div>
                                <hr style="border:0.5px solid #ccc;">
                                <div class="text-right">
                                    @csrf
                                    <button disabled onclick="selanjutnya(this)" type="button" role="btn-sk" class="btn btn-xs btn-primary">Saya terima syarat & ketentuan</button>
                                    <a href="{{ url('dashboard') }}" type="button" class="btn btn-xs btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

        $("input[role='checkbox']").on("click", function(){

            var isChecked = $(this).is(":checked");

            if(isChecked)
            {
                $("button[role='btn-sk']").prop("disabled", false);
            }
            else
            {
                $("button[role='btn-sk']").prop("disabled", true);
            }

        });

    });

    function selanjutnya(obj)
    {

        var idprogram = "@php echo $idprogram @endphp";
        $.ajax({
            url      : "{{ url('program/simpanpeserta') }}/"+idprogram,
            type     : "POST",
            dataType : "JSON",
            data : {
                _token : $("input[name='_token']").val(),
                idprogram : idprogram
            },
            beforeSend : function(xhr)
            {
                $(obj).prop("disabled", true);
            },
            success : function(result, status, xhr)
            {
                if(result.status)
                {
                    window.location.href = "{{ url('program/success') }}/"+idprogram;
                }
                else
                {
                    $(obj).prop("disabled", false);
                }
            }
        })
    }

    function selanjutnya__(obj)
    {
        var idprogram = "@php echo $idprogram @endphp";

        window.location.href = "{{ url('program/invitepeserta/') }}/"+idprogram;
    }

</script>
@endsection