@extends('layouts.main')

@section('content')


<style>
    .box-desa{
        border:1px solid #ccc;
        box-shadow:1px 1px 10px #ccc;
        padding:5px;
        border-radius:3px;
    }

    .kodedesa{
        color:#000;
        font-size:14px;
    }

    .namadesa{
        color:#000;
        font-size:16px;
    }

    .btn-xs{
        padding:5px 10px !important;
    }

    .alamat{
        font-size:12px;
        color:#555 !important;
    }

    .footer-btn{
        margin-top:10px;
    }

    #clone{
        display:none;
    }

    .box-infojoin{
        width:300px;
        margin:0px auto;
        padding:10px;
        border:1px solid #ccc;
        position:relative;
        color:#999;
        background:#f9f9f9;
        border-radius:3px;
        box-shadow:1px 1px 10px #ccc;
    }

    .box-tanya{
        background:#f9f9f9;
        border-radius:5px;
        padding:5px;
        border:1px solid #ccc;
        box-shadow:1px 1px 10px #ccc;
        color:#000;
        font-size: 13px;
    }

    .table-header{
        background:#064571;
        color:#fff;
    }

    .form-group{
        margin-bottom: 0rem !important;
    }

    #tr-odd{
        background:#f9f9f9;
    }

    #tr-even{
        background:#e9e9e9;
    }

    .list-view{
        border:1px solid #ccc;
        padding:10px;
        margin-bottom:25px;
        background:#f9f9f9;
        border-radius:5px;
        box-shadow:1px 1px 10px #ccc;
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Join Desa</h5>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="color:#000 !important;" href="javascript:void(0)">Layout</a>
                    </li>
                    <li style="color:#000 !important;" class="breadcrumb-item active">Blank</li>
                </ol>
            </div>
            
        </div>

        
        @if($member->nama != "")
        <div class="row">

            <div class="col-lg-12">
                <!--- startcol  -->
                
                    @if($isSudahPilih->id_instansi == 0)
                    <div class="card">
                        <div class="card-body">

                            
                            <div class="tab-content" id="nav-tabContent">
                                <div class="col-12">


                                    <div class="form-horizontal">
                                        @csrf
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-2 col-form-label text-label">Nama Desa / Nomor Registrasi Desa</label>
                                            
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <input type="text" name="kodedesa" class="form-control"  placeholder="Isikan Berdesarkan Kode Desa / Nama Desa">
                                                </div>
                                                <div class="text-center" onclick="toggle(this)" style="border:1px solid #ccc; cursor:pointer; color:#666; border-radius:50px; background:#f9f9f9; margin:10px 0px; padding:3px;"><span class="mdi mdi-arrow-right-drop-circle-outline"></span> Cari lebih detail </div>
                                            </div>

                                            <div class="col-sm-3 sr-only">
                                                <div class="box-tanya">
                                                    <span style="font-size:20px;" class="mdi mdi-comment-question-outline"></span> Nomor Registrasi Desa merupakan kode wilayah desa berdasarkan wilayah dearah <a style="font-weight:bold; color:blue;" target="_blank" href="https://sid.kemendesa.go.id/">Lihat disini</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="s_advance" style="display:none; margin-bottom:10px;">
                                            <div class="form-group row align-items-center">
                                                <label class="col-sm-2 col-form-label text-label">Provinsi</label>
                                                
                                                <div class="col-sm-6">
                                                    <select name="provinsi" class="form-control" onchange="pilihkabupaten(this)" id="provinsi">
                                                        <option value="">.:: Pilih Provinsi ::.</option>
                                                        @foreach($provinsi as $prov)
                                                        <option value="{{ $prov->kode_propinsi }}">{{ $prov->nama_propinsi }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row align-items-center">
                                                <label class="col-sm-2 col-form-label text-label">Kabupaten</label>
                                                
                                                <div class="col-sm-6">
                                                    <select name="kabupaten" class="form-control" onchange="pilihkecamatan(this)" id="kabupaten">
                                                        <option value="">.:: Pilih Kabupaten ::.</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row align-items-center">
                                                <label class="col-sm-2 col-form-label text-label">Kecamatan</label>
                                                
                                                <div class="col-sm-6">
                                                    <select name="kecamatan" class="form-control" id="kecamatan">
                                                        <option value="">.:: Pilih Kecamatan ::.</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-2 col-form-label text-label"></label>
                                            <div class="col-sm-9">
                                                <button type="button" onclick="caridesa(this)" class="btn btn-xs btn-primary"><span class="mdi mdi-search-web"></span> Cari Desa</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">

                            <!--<div class="row" id="clone-content">
                                <div class="table-responsive">
                                    <div class="float-left">
                                        <div id="notifikasi"></div>
                                    </div>
                                    <div class="float-right" style="color:#000;padding:5px 0px;">
                                        Filter : 
                                        <select name="sort" onchange="caridesa(this)" style="padding:5px;">
                                            <option value="">.:: Urutkan ::.</option>
                                            <option value="provinsi">Berdasarkan Provinsi</option>
                                            <option value="kabupaten">Berdasarkan Kabupaten</option>
                                            <option value="kecamatan">Berdasarkan Kecamatan</option>
                                            <option value="desa">Berdasarkan Desa</option>
                                        </select>
                                    </div>
                                    <table class="table compact">
                                        <thead class="table-header">
                                            <tr>
                                                <th>#</th>
                                                <th>Provinsi</th>
                                                <th>Kabupaten</th>
                                                <th>Kecamatan</th>
                                                <th>Kode Desa</th>
                                                <th>Nama Desa</th>
                                                <th>Jml Member</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-desa">

                                        </tbody>
                                    </table>
                                </div>
                            </div>-->
                            <div class="row">
                                <div class="col-lg-12" id="clone-content">
                                    <div class="text-center">
                                        <div><span class="mdi mdi-server-off" style="font-size:70px;"></span></div>
                                        <div style="color:#000;">Silahkan cari desa anda berdasarkan domisili anda saat ini.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="cards">
                        <div class="card-body">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="col-12">
                                    <div style="font-size:14px;">
                                        <div class="text-center">
                                            <img style="width:100px;" src="{{ asset('assets/images/profil.svg') }}" />
                                        
                                            <div style="color:#000;">
                                                Anda sudah memilih desa. Silahkan anda cek ke halaman <br> profil desa untuk update informasi desa.
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <a href="{{ url('profil/desa') }}" type="button" class="btn btn-xs btn-primary"> Update Profil Desa </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
            </div> <!-- endcol-->
        </div>
        @else
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <div>
                        <span style="font-size:100px;" class="mdi mdi-server-security"></span> 
                    </div>

                    <div style="margin-bottom:10px;">Mohon lengkapi profil anda terlebih dahulu. <br> Silahkan klik tombol dibawah ini untuk update profil anda.</div>
                    <div><a type="button" href="{{ url('profil/akun') }}" class="btn btn-xs btn-primary">Edit Profil Pengguna</a></div>
                </div>
            </div>
        </div>
        
        @endif
    </div>
    <!-- #/ container -->
</div>

<div class="col-6 col-lg-4 float-left " id="clone">
    <div class="list-view">
        <h5 role="namadesa">Desa Cempaka</h5>
        <div role="kodedesa">11.01.01.2001</div>
        <div role="alamat">Aceh, Aceh Selatan, Bangkokan</div>

        <div role="button" class="text-center" style="margin-top:10px;">
            <button class="btn btn-xs btn-primary">Gabung Desa</button>
        </div>
    </div>
</div>


<!--**********************************
    Content body end
***********************************-->



<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("input[name='kodedesa']").on('keypress',function(e) {
            if(e.which == 13) {
                var element = $("button[type='button']");
                caridesa(element);
            }
        });
    });

    function pilihkabupaten(obj)
    {
        let kodeprovinsi = $(obj).val();

        $.ajax({
            url : " {{ url('getMaster/kabupaten') }}",
            type : "POST",
            dataType : "JSON",
            data : {
                _token : $("input[name='_token']").val(),
                kode : kodeprovinsi
            },
            beforeSend : function(xhr)
            {
                $("#kabupaten").html("<option value=''>Sedang mencari kabupaten</option>");
            },
            success : function(result, status, xhr)
            {
                if(result.status)
                {
                    $("#kabupaten").html("<option value=''>.:: Semua Kabupaten ::.</option>");

                    $.each(result.data, function(a, b){
                        $("#kabupaten").append("<option value='"+b.kode_kabupaten+"'>"+b.nama_kabupaten+"</option>");
                    });
                }
                else
                {
                    $("#kabupaten").html("<option value=''>Tidak ditemukan</option>");
                }
            }
        });
    }

    function pilihkecamatan(obj)
    {
        let kodekabupaten = $(obj).val();

        $.ajax({
            url : " {{ url('getMaster/kecamatan') }}",
            type : "POST",
            dataType : "JSON",
            data : {
                _token : $("input[name='_token']").val(),
                kode : kodekabupaten
            },
            beforeSend : function(xhr)
            {
                $("#kecamatan").html("<option value=''>Sedang mencari kecamatan</option>");
            },
            success : function(result, status, xhr)
            {
                if(result.status)
                {
                    $("#kecamatan").html("<option value=''>.:: Semua Kecamatan ::.</option>");

                    $.each(result.data, function(a, b){
                        $("#kecamatan").append("<option value='"+b.kode_kecamatan+"'>"+b.nama_kecamatan+"</option>");
                    });
                }
                else
                {
                    $("#kecamatan").html("<option value=''>Tidak ditemukan</option>");
                }
            }
        });
    }

    function toggle(obj)
    {
        $("#s_advance").toggle();
        $("select").val("");
    }

    function filtered(obj)
    {
        var _token    = $("input[name='_token']").val();
        var kodedesa  = $("input[name='kodedesa']").val();
        var filtered  = $("select[name='sort']").val();

        var valid = (kodedesa == "");

        if(valid)
        {
            alert("Silahkan untuk masukan kode desa atau nama desa.");
            return false;
        }

        $.ajax({
            url : "getMaster/desa",
            type : "POST",
            dataType : "JSON",
            data : {
                _token : _token,
                kodedesa : kodedesa,
                filtered : filtered
            },
            beforeSend : function(xhr)
            {
                $(obj).prop("disabled", true);
                $("#table-desa").html("<tr><td style='text-align:center;' colspan='8'>Loading, Mohon tunggu sebentar . . .</td></tr>")
            },
            success : function(result, status, xhr)
            {
                console.log(result.data);
                if(result.status)
                {

                    
                    var table = document.getElementById("table-desa");

                    table.innerHTML = "";

                    var seq = 1;
                    for(i = 0; i < result.data.length; i++)
                    {
                        var row = table.insertRow();

                        if(seq%2 == 0)
                        {
                            row.setAttribute("id", "tr-odd");
                        }
                        else
                        {
                            row.setAttribute("id", "tr-even");
                        }

                        var cell0 = row.insertCell(0);
                        var cell1 = row.insertCell(1);
                        var cell2 = row.insertCell(2);
                        var cell3 = row.insertCell(3);
                        var cell4 = row.insertCell(4);
                        var cell5 = row.insertCell(5);
                        var cell6 = row.insertCell(6);
                        var cell7 = row.insertCell(7);

                        var provinsi    = result.data[i].provinsi;
                        var kabupaten   = result.data[i].kabupaten;
                        var kecamatan   = result.data[i].kecamatan;
                        var kodedesa    = result.data[i].kode;
                        var namadesa    = result.data[i].nama;
                        var jumlah      = result.data[i].jml;

                        cell0.innerHTML = seq;
                        cell1.innerHTML = provinsi;
                        cell2.innerHTML = kabupaten;
                        cell3.innerHTML = kecamatan;
                        cell4.innerHTML = kodedesa;
                        cell5.innerHTML = namadesa;
                        cell6.innerHTML = jumlah+" anggota";
                        cell7.innerHTML = "<button type='button' onclick=pilihdesa(this,'"+kodedesa+"') class='btn btn-xs btn-primary'>Gabung Desa</button>";

                        seq++;
                    }

                }
                else
                {
                    alert("Data tidak ditemukan.");
                }
            },
            complete : function(xhr)
            {
                $(obj).prop("disabled", false);
            }
        })
    }

    function caridesa__(obj)
    {
        var _token    = $("input[name='_token']").val();
        var kodedesa  = $("input[name='kodedesa']").val();
        var filtered  = $("select[name='sort']").val();
        var valid = (kodedesa == "");

        if(valid)
        {
            alert("Silahkan untuk masukan kode desa atau nama desa.");
            return false;
        }

        $.ajax({
            url : "getMaster/desa",
            type : "POST",
            dataType : "JSON",
            data : {
                _token : _token,
                kodedesa : kodedesa,
                filtered  : filtered
            },
            beforeSend : function(xhr)
            {
                $(obj).prop("disabled", true);
                $("#table-desa").html("<tr><td style='text-align:center;' colspan='8'>Loading, Mohon tunggu sebentar . . .</td></tr>")
            },
            success : function(result, status, xhr)
            {
                console.log(result.data);

                $("#notifikasi").html("<div style='color:#000;'>Data ditemukan sebanyak "+result.data.length+" baris.<br>Silahkan pilih desa sesuai dengan desa anda.</div>");
                if(result.status)
                {
                    var table = document.getElementById("table-desa");

                    table.innerHTML = "";

                    var seq = 1;
                    for(i = 0; i < result.data.length; i++)
                    {
                        var row = table.insertRow();
                        if(seq%2 == 0)
                        {
                            row.setAttribute("id", "tr-odd");
                        }
                        else
                        {
                            row.setAttribute("id", "tr-even");
                        }

                        var cell0 = row.insertCell(0);
                        var cell1 = row.insertCell(1);
                        var cell2 = row.insertCell(2);
                        var cell3 = row.insertCell(3);
                        var cell4 = row.insertCell(4);
                        var cell5 = row.insertCell(5);
                        var cell6 = row.insertCell(6);
                        var cell7 = row.insertCell(7);

                        var provinsi    = result.data[i].provinsi;
                        var kabupaten   = result.data[i].kabupaten;
                        var kecamatan   = result.data[i].kecamatan;
                        var kodedesa    = result.data[i].kode;
                        var namadesa    = result.data[i].nama;
                        var jumlah      = result.data[i].jml;

                        cell0.innerHTML = seq;
                        cell1.innerHTML = provinsi;
                        cell2.innerHTML = kabupaten;
                        cell3.innerHTML = kecamatan;
                        cell4.innerHTML = kodedesa;
                        cell5.innerHTML = namadesa;
                        cell6.innerHTML = jumlah+" anggota";
                        cell7.innerHTML = "<button type='button' onclick=pilihdesa(this,'"+kodedesa+"') class='btn btn-xs btn-primary'>Gabung Desa</button>";

                        seq++;
                    }

                }
                else
                {
                    alert("Data tidak ditemukan.");

                    var table = document.getElementById("table-desa");

                    table.innerHTML = "";

                    var row = table.insertRow();

                    var cell0 = row.insertCell();
                    cell0.colSpan = 7;
                    cell0.style = "text-align:center;";
                    cell0.innerHTML = "Data tidak ditemukan. Silahkan periksa kembali nama desa / nomor registrasi desa anda.";
                }
            },
            complete : function(xhr)
            {
                $(obj).prop("disabled", false);
            }
        })
    }

    function caridesa(obj)
    {
        var _token    = $("input[name='_token']").val();
        var kodedesa  = $("input[name='kodedesa']").val();
        var provinsi  = $("select[name='provinsi']").val();
        var kabupaten = $("select[name='kabupaten']").val();
        var kecamatan = $("select[name='kecamatan']").val();

        var valid = (kodedesa == "");

        if(valid)
        {
            alert("Silahkan untuk masukan kode desa atau nama desa.");
            return false;
        }

        var clone     = $("#clone");

        $.ajax({
            url : "getMaster/desa",
            type : "POST",
            dataType : "JSON",
            data : {
                _token : _token,
                kodedesa : kodedesa,
                provinsi : provinsi,
                kabupaten : kabupaten,
                kecamatan : kecamatan
            },
            beforeSend : function(xhr)
            {
                $(this).prop("disabled", true);
                $("#clone-content").html("<div class='col-lg-12' style='text-align:center'>Please wait, Loading content . . .</div>")
            },
            success : function(result, status, xhr)
            {
                $("#clone-content").html("");

                if(result.status)
                {

                    $.each(result.data, function(a, b){
                        
                        var htmlClone = $(clone).clone();

                        $(htmlClone).css({
                            display : "block"
                        });

                        $(htmlClone).find("[role='kodedesa']").text(b.kode);
                        $(htmlClone).find("[role='namadesa']").text(b.nama);                        
                        $(htmlClone).find("[role='alamat']").text(b.provinsi+", "+b.kabupaten+", "+b.kecamatan);                        
                        $(htmlClone).find("[role='member']").text(result.jmlMember+" member");                        
                        $(htmlClone).find("[role='button']").find("button").attr("onclick", "pilihdesa(this,'"+b.kode+"')"); 
                        
                        $("#clone-content").append(htmlClone);

                    });

                }
                else
                {
                    $("#clone-content").html("<div class='col-lg-12' style='text-align:center'>Maaf tidak ada desa yang ditemukan</div>")
            
                }
            }
        }) 
    }

    function pilihdesa(obj, kodedesa)
    {
        //alert('oke');
        //var isconfirm = confirm("Apakah anda yakin memilih desa dengan kode "+kodedesa+" ?");
        // var provinsi = $(obj).parents("tr").find("td:eq(1)").text();
        // var kabupaten = $(obj).parents("tr").find("td:eq(2)").text();
        // var kecamatan = $(obj).parents("tr").find("td:eq(3)").text();
        // var desa = $(obj).parents("tr").find("td:eq(5)").text();

        var alamat = $(obj).parents(".list-view").find("[role='alamat']").text();
        var desa = $(obj).parents(".list-view").find("[role='namadesa']").text();

        Swal.fire({
            html : "Anda yakin memilih Desa "+desa+", di Provinsi "+alamat,
            //html: 'Nama Desa : '+desa+' <br> Nama Provinsi : '+provinsi+'<br> Nama Kabupaten : '+kabupaten+'<br> Nama Kecamatan : '+kecamatan ,
            showCancelButton: true,
            confirmButtonText: `Simpan`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) 
            {
                var _token = $("input[name='_token']").val();

                $.ajax({
                    url : "/postJoinDesa",
                    type : "POST",
                    dataType : "JSON",
                    data : {
                        _token   : _token,
                        kodedesa : kodedesa
                    },
                    beforeSend : function(xhr)
                    {
                        $(obj).prop("disabled", true);
                    },
                    success : function(result, status, xhr)
                    {
                        if(result.status)
                        {
                            setTimeout(function(){
                                window.location.href = "/dashboard";
                            }, 1000);
                        }
                    },
                    error : function(error, status, xhr)
                    {
                        console.log("error : "+error);
                    }
                });
            } 
        });
    }

</script>

@endsection