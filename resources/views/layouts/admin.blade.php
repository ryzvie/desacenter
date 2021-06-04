
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DesaCenter.ID - Ini tagline.</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/dsc_logo.png') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    
    
</head>
<style>
    .nk-sidebar .metismenu ul a{
        padding:10px 62px !important;
    }

    .table thead tr th{
        padding:5px 10px;
        background:#283593 !important;
        color:#fff;
        border:1px solid #fff;
    }

    .table tbody tr td{
        padding:5px 10px;
        border:1px solid #ccc;
        line-height:20px;
    }

    .table tbody tr:hover{
        background:#eee;
        cursor:pointer;
    }
</style>
<body>
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header" style="background:#fff !important;">
            <div class="brand-logo">
                <a href="#">
                    <b>
                        <img style="width:60px" src="{{ asset('assets/images/dsc_logo.png') }}" alt="">
                    </b>
                </a>
            </div>
            <div class="nav-control" style="color:#000 !important;">
                <div style="color:#000 !important;" class="hamburger">
                    <span style="color:#000 !important;" class="line"></span>  
                    <span style="color:#000 !important;" class="line"></span>  
                    <span style="color:#000 !important;" class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header" style="background-color:#fff !important;">    
            <div class="header-content">
                <div class="header-left">
                        {{-- masih kosong --}}
                </div>
                <div class="header-right">
                    <ul>
                        <li class="icons">
                            <a href="javascript:void(0)" class="log-user">
                                <span style="color:#000; text-transform:capitalize">{{ $member->nama }}</span>  <i style="color:#000 !important;" class="fa fa-caret-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-profile animated bounceInDown">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="{{ url('/profil/akun') }}"><i style="color:#000 !important;" class="mdi mdi-account-circle"></i> <span>Akun Anda</span></a></li>
                                        <li><a href="#" onclick="signOut()"><i style="color:red !important;" class="mdi mdi-power text-danger"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar" style="top:0px !important;">           
            <div class="nk-nav-scroll">
                <ul class="metismenu mm-show" id="menu">
                    <li class="nav-label">Dashboard</li>

                    <li class="">
                        <a class="" href="{{ url('/dashboard')}}" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="{{ url('/program')}}" aria-expanded="false">
                            <i class="mdi mdi-content-copy"></i><span class="nav-text">Laporan </span>
                            <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                        </a>

                        <ul class="submenu mm-collapse mm-show">
                            <li class=""><a href="{{ url('admin/laporan/desa-terdaftar') }}" aria-expanded="false">Desa yang daftar desacenter.id</a></li>
                            <li class=""><a href="{{ url('admin/laporan/desa-ikut-program') }}" aria-expanded="false">Desa ikut Program</a></li>
                            <li class=""><a href="{{ url('admin/laporan/member-daftar') }}" aria-expanded="false">Member yang mendaftar desacenter.id</a></li>
                            <li class=""><a href="{{ url('admin/laporan/member-program') }}" aria-expanded="false">Member yang ikut program</a></li>
                            <li class=""><a href="{{ url('admin/laporan/member-desa') }}" aria-expanded="false">Total member per/ desa</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        
        @yield('content')
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Developed by <a href="#">Desacenter.id</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    
    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/gleek.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>
    <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.4.0/firebase-auth.js"></script>
    <script src="{{ asset('assets/js/firebase.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    @yield('script')
</body>

</html>