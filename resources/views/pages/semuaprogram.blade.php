@extends('layouts.main')



@section('content')

<style>
    .box-step{

        border:0px solid #ccc;
        box-shadow:1px 1px 10px #ccc;
        padding:10px;
        margin:10px 0px;
    }

    .box-relative{
        position:relative;
        padding:15px 0px;
        margin-top:15px;
    }

    .box-steps{
        border:0px solid #ccc;
        width:100%;
    }

    .dot{
        border:4px solid #999;
        padding:5px;
        border-radius:10px;
        position:absolute;
        top:6px;
        background:#fff;
        z-index:9;
        left:45%;
    }
    
    .border-dot{
        border-top:1px dashed #000;
        width: 100%;
        position: absolute;
        left:0px;
        top:15px;
    }

    .border-solid{
        border-top:8px solid #00b000;
        width: 100%;
        position: absolute;
        left:0px;
        top:11px;
        border-radius:100px;
    }

    .text-step{
        padding:5px 15px;
        color:#000;
        font-size:13px;
        color:#000;
        text-align: center;
    }

    .btn-xs{
        padding:3px 10px;
        font-size:13px !important;
        margin-bottom:3px;
    }

    .text-small{
        font-size:12px;
        padding:5px 10px;
    }

    .box-poster{
        height:200px;
        overflow:hidden;
    }

    .box-program{
        border-radius:5px;
        overflow: hidden;
        box-shadow:1px 1px 10px #ccc;
        background:#fff !important;
    }

    .text-addon{
        text-align:center;
        color:#555;
        font-size:14px;
        line-height:18px;
    }

    .text-step{
        border-right:2px solid #f9f9f9;
    }
    
    .d-table{
        display:table;
        width:100%;
    }


    .d-table-row{
        display:table-row;
        width:100%;
    }

    .d-table-cell{
        display:table-cell;
        vertical-align:middle;
        height:50px;
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Semua Program</h5>
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

                <div class="cards">
                    <div class="card-bodys">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="row">

                                @foreach($program as $programs)
                                <div class="col-lg-3 col-6">
                                    <div class="box-program">
                                        <div class="box-poster">
                                            <img style="width:100%;" src="{{ $programs->banner }}" />
                                        </div>
                                        <div class="d-table">
                                            <div class="text-addon d-table-row">
                                                <div class="d-table-cell">{{ $programs->nama }}</div>
                                                
                                            </div>
                                        </div>
                                        <!-- <div class="text-center">
                                            <a type="button" class="btn btn-xs btn-info" href="{{ url('program/detail/'.$programs->id) }}">Detail Program</a>
                                        </div> -->
                                        <div class="text-center">
                                            @csrf
                                            <a type="button" style="color:#fff;" class="btn btn-xs btn-primary" onclick="ikutprogram(this, '{{ $programs->id }}' )">Ikuti Program</a>
                                            <br>
                                            <div style="margin:10px 0px;">
                                                <a type="button" style="font-size:12px;" href="{{ url('program/detail/'.$programs->id) }}"> >>Detail Program</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

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


<script type="text/javascript">

    function ikutprogram(obj, idprogram)
    {
        var idprogram = idprogram;
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
                console.log(result);
                if(result.status)
                {
                    window.location.href = "{{ url('program/success') }}/"+idprogram;
                }
                else
                {
                    window.location.href = "{{ url('dashboard') }}";
                }
            }
        })
    }

</script>
@endsection