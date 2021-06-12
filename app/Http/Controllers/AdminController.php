<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //


    public function login(Request $requst)
    {
        return view("admin.login");
    }

    public function authentication(Request $request)
    {
        $this->input = $request->input();

        $this->username = "+62".$this->input['username'];
        $this->password = md5($this->input['password']);

        $this->checkAuth = DB::table('mst_admin as a')
                           ->where('a.telp', $this->username)
                           ->where('a.password', $this->password)
                           ->get();
        
        if($this->checkAuth->count() > 0)
        {
            $this->DataAdmin = $this->checkAuth->first();

            $this->id = $this->DataAdmin->id;
            $this->nama = $this->DataAdmin->nama;
            $this->email = $this->DataAdmin->email;
            $this->telp = $this->DataAdmin->telp;


            $request->session()->put('idadmin', $this->id);
            $request->session()->put('nama', $this->nama);
            $request->session()->put('email', $this->email);
            $request->session()->put('telp', $this->telp);


            return redirect("admin/dashboard");
            exit();
        }
        else
        {
            return redirect("admin/login")->with("status", "Login gagal. Silahkan cek kembali user dan password anda.");
        }
    }

    public function dashboard(Request $request)
    {

        if($request->session()->get('idadmin') === "")
        {
            return view("/")->with("status", "Session anda telah habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->id = $request->session()->get('idadmin');

        $this->getAdminData = DB::table("mst_admin as a")
                              ->where("a.id", $this->id)
                              ->get();

        $data = array(
            "member"  => $this->getAdminData->first()
        );

        return view("admin.dashboard")->with($data);
    }

    public function lapdesaterdaftar(Request $request)
    {
        if($request->session()->get('idadmin') === "")
        {
            return view("admin.login")->with("status", "Session anda telah habis. Silahkan lakukan login kembali.");
            exit();
        }

        $namainstansi = $request->input("namainstansi");

        $this->instansi = DB::table("mst_instansi as i")
                        ->select( "i.id_instansi", "i.nama_instansi as nama", "i.id_provinsi", "i.id_kabupaten", 
                        "p.nama_propinsi as prov", "kb.nama_kabupaten as kab", "kc.nama_kecamatan as kec", 
                        "i.nama_kepala as kep", "i.no_wa_kepala as wa_kep", "i.nama_sekertaris as sek", 
                        "i.no_wa_sekertaris as wa_sek")
                        ->join("mst_provinsi as p", "i.id_provinsi","=","p.kode_propinsi")
                        ->join("mst_kabupaten as kb", "i.id_kabupaten","=","kb.kode_kabupaten")
                        ->join("mst_kecamatan as kc", "i.id_kecamatan","=","kc.kode_kecamatan")
                        ->distinct("i.id_instansi")
                        ->when($namainstansi, function($query, $namainstansi){
                            return $query->where("i.nama_instansi", "LIKE", "%".$namainstansi."%");
                         })

                        ->paginate(15);

        $this->id = $request->session()->get('idadmin');

        $this->getAdminData = DB::table("mst_admin as a")
                                ->where("a.id", $this->id)
                                ->get();
                                
        $data = array(
            "instansi"   => $this->instansi,
            "member"     => $this->getAdminData->first(),
            "inputCallback" => array(
                "namainstansi" => $namainstansi
            )
        );

        return view("admin.laporan.desa_terdaftar")->with($data);
    }

    public function lapdesaikutprogram(Request $request)
    {
        $namainstansi = $request->input("namainstansi");
        $this->instansi = DB::table("trx_pemesanan as tp")
                        ->select("m.id_instansi", "i.id_provinsi", "i.id_kabupaten", 
                        "p.nama_propinsi as prov", "kb.nama_kabupaten as kab", "kc.nama_kecamatan as kec",
                        "i.nama_instansi as nama", "i.nama_kepala as kep", "i.no_wa_kepala as wa_kep", 
                        "i.nama_sekertaris as sek", "i.no_wa_sekertaris as wa_sek")
                        ->join("mst_member as m", "tp.id_member","=","m.id")
                        ->join("mst_instansi as i", "m.id_instansi","=","i.id_instansi")
                        ->join("mst_provinsi as p", "i.id_provinsi","=","p.kode_propinsi")
                        ->join("mst_kabupaten as kb", "i.id_kabupaten","=","kb.kode_kabupaten")
                        ->join("mst_kecamatan as kc", "i.id_kecamatan","=","kc.kode_kecamatan")
                        ->distinct("i.id_instansi")
                        ->when($namainstansi, function($query, $namainstansi){
                            return $query->where("i.nama_instansi", "LIKE", "%".$namainstansi."%");
                        })
                        ->paginate(15);

        $this->id = $request->session()->get('idadmin');

        $this->getAdminData = DB::table("mst_admin as a")
                                ->where("a.id", $this->id)
                                ->get();

        $data = array(
            "instansi"   => $this->instansi,
            "member"     => $this->getAdminData->first(),
            "inputCallback" => array(
                "namainstansi" => $namainstansi
            )
        );

        return view("admin.laporan.desa_ikut_program")->with($data);
        // return view("admin.desa_ikut_program");
    }


    //LAPORAN RYZVIE
    public function lapmemberdaftar(Request $request)
    {
        if($request->session()->get('idadmin') === "")
        {
            return view("admin.login")->with("status", "Session anda telah habis. Silahkan lakukan login kembali.");
            exit();
        }

        $namapeserta = $request->input("namapeserta");

        $this->peserta = DB::table("mst_member as a")
                        ->when($namapeserta, function($query, $namapeserta){
                            return $query->where("a.nama", "LIKE", $namapeserta."%");
                        })
                        ->paginate(15);

        $this->id = $request->session()->get('idadmin');

        $this->getAdminData = DB::table("mst_admin as a")
                                ->where("a.id", $this->id)
                                ->get();

        $data = array(
            "peserta" => $this->peserta,
            "member" => $this->getAdminData->first(),
            "inputCallback" => array(
                "namapeserta" => $namapeserta
            )
        );

        return view("admin.laporan.laporan_member_daftar")->with($data);
    }

    public function lapmemberprogram(Request $request)
    {
        if($request->session()->get('idadmin') === "")
        {
            return view("admin.login")->with("status", "Session anda telah habis. Silahkan lakukan login kembali.");
            exit();
        }

        $namapeserta = $request->input("nama");
        $program     = $request->input("program");
        

        $this->id = $request->session()->get('idadmin');

        $this->getAdminData = DB::table("mst_admin as a")
                                ->where("a.id", $this->id)
                                ->get();

        $this->peserta = DB::table("trx_pemesanan as a")
                         ->select(
                            "b.nama as nama",
                            "b.email as email",
                            "b.telp as telp",
                            "b.alamat as alamat",
                            "c.kode_instansi as kodedesa",
                            "c.nama_instansi as namadesa",
                            "d.nama as namatraining",
                            "d.id as idtraining",
                         )
                         ->join("mst_member as b", "b.id", "=", "a.id_member")
                         ->join("mst_instansi as c", "c.id_instansi", "=", "b.id_instansi")
                         ->join("mst_training as d", "d.id", "=", "a.id_training")
                         ->when($namapeserta, function($query, $namapeserta){
                            return $query->where("b.nama", "LIKE", $namapeserta."%");
                         })
                         ->when($program, function($query, $program){
                            return $query->where("d.id",  $program);
                         })
                         ->paginate(15);
        
        $this->program = DB::table("mst_training as a")
                         ->where("a.reff_id","0")
                         ->get();


        $data = array(
            "member"    => $this->getAdminData->first(),
            "peserta"   => $this->peserta,
            "program"   => $this->program,
            "inputCallback" => array(
                "nama"      => $namapeserta,
                "program"   => $program
            )
        );

        return view("admin.laporan.laporan_member_program")->with($data);
    }

    public function lapmemberdesa(Request $request)
    {
        if($request->session()->get('idadmin') === "")
        {
            return view("admin.login")->with("status", "Session anda telah habis. Silahkan lakukan login kembali.");
            exit();
        }


        $namadesa = $request->input("namadesa");
        $kodedesa = $request->input("kodedesa");


        $this->id = $request->session()->get('idadmin');

        $this->getAdminData = DB::table("mst_admin as a")
                                ->where("a.id", $this->id)
                                ->get();

        $this->datamember = DB::table("mst_instansi as a")
                            ->select(
                                "a.nama_instansi as namadesa",
                                "a.kode_instansi as kodedesa",
                                "b.nama_propinsi as provinsi",
                                "c.nama_kabupaten as kabupaten",
                                "d.nama_kecamatan as kecamatan",
                                DB::raw("(SELECT COUNT(aa.id) FROM mst_member as aa
                                WHERE aa.id_instansi = a.id_instansi) as jml")
                            )
                            ->join("mst_provinsi as b", "b.kode_propinsi", "=", "a.id_provinsi")
                            ->join("mst_kabupaten as c", "c.kode_kabupaten", "=", "a.id_kabupaten")
                            ->join("mst_kecamatan as d", "d.kode_kecamatan", "=", "a.id_kecamatan")
                            ->when($namadesa , function($query, $namadesa){
                                return $query->where("a.nama_instansi", "LIKE", $namadesa."%");
                            })
                            ->when($kodedesa , function($query, $kodedesa){
                                return $query->where("a.kode_instansi", "LIKE", $kodedesa."%");
                            })
                            ->paginate(15);

        $data = array(
            "member" => $this->getAdminData->first(),
            "datamember" => $this->datamember,
            "inputCallback" => array(
                "namadesa" => $namadesa,
                "kodedesa" => $kodedesa
            )
        );

        return view("admin.laporan.laporan_member_desa")->with($data);
    }

    //laporan tampil semua data ALDO
    //1
    public function lapdesaterdaftar_all(Request $request)
    {
        if($request->session()->get('idadmin') === "")
        {
            return view("admin.login")->with("status", "Session anda telah habis. Silahkan lakukan login kembali.");
            exit();
        }

        $namainstansi = $request->input("namainstansi");
        $btn = $request->input("btn");

        $this->instansi_all = DB::table("mst_instansi as i")
                ->select( "i.id_instansi", "i.nama_instansi as nama", "i.id_provinsi", "i.id_kabupaten", 
                "p.nama_propinsi as prov", "kb.nama_kabupaten as kab", "kc.nama_kecamatan as kec", 
                "i.nama_kepala as kep", "i.no_wa_kepala as wa_kep", "i.nama_sekertaris as sek", 
                "i.no_wa_sekertaris as wa_sek")
                ->join("mst_provinsi as p", "i.id_provinsi","=","p.kode_propinsi")
                ->join("mst_kabupaten as kb", "i.id_kabupaten","=","kb.kode_kabupaten")
                ->join("mst_kecamatan as kc", "i.id_kecamatan","=","kc.kode_kecamatan")
                ->distinct("i.id_instansi")
                ->when($namainstansi, function($query, $namainstansi){
                    return $query->where("i.nama_instansi", "LIKE", "%".$namainstansi."%");
                })
                ->paginate();

        $this->id = $request->session()->get('idadmin');

        $this->getAdminData = DB::table("mst_admin as a")
                                ->where("a.id", $this->id)
                                ->get();

        $data = array(
            "instansi_all" => $this->instansi_all,
            "member"     => $this->getAdminData->first(),
            "btn"     => $btn,
            "inputCallback" => array(
                "namainstansi" => $namainstansi,
            )
        );

        return view("admin.laporan.desa_terdaftar_all")->with($data);
    }

    //2
    public function lapdesaikutprogram_all(Request $request)
    {
        if($request->session()->get('idadmin') === "")
        {
            return view("admin.login")->with("status", "Session anda telah habis. Silahkan lakukan login kembali.");
            exit();
        }

        $namainstansi = $request->input("namainstansi");
        $btn = $request->input("btn");

        $this->instansi_all = DB::table("trx_pemesanan as tp")
                        ->select("m.id_instansi", "i.id_provinsi", "i.id_kabupaten", 
                        "p.nama_propinsi as prov", "kb.nama_kabupaten as kab", "kc.nama_kecamatan as kec",
                        "i.nama_instansi as nama", "i.nama_kepala as kep", "i.no_wa_kepala as wa_kep", 
                        "i.nama_sekertaris as sek", "i.no_wa_sekertaris as wa_sek")
                        ->join("mst_member as m", "tp.id_member","=","m.id")
                        ->join("mst_instansi as i", "m.id_instansi","=","i.id_instansi")
                        ->join("mst_provinsi as p", "i.id_provinsi","=","p.kode_propinsi")
                        ->join("mst_kabupaten as kb", "i.id_kabupaten","=","kb.kode_kabupaten")
                        ->join("mst_kecamatan as kc", "i.id_kecamatan","=","kc.kode_kecamatan")
                        ->distinct("i.id_instansi")
                        ->when($namainstansi, function($query, $namainstansi){
                            return $query->where("i.nama_instansi", "LIKE", "%".$namainstansi."%");
                        })
                        ->paginate();

        $this->id = $request->session()->get('idadmin');

        $this->getAdminData = DB::table("mst_admin as a")
                                ->where("a.id", $this->id)
                                ->get();

        $data = array(
            "instansi_all" => $this->instansi_all,
            "member"     => $this->getAdminData->first(),
            "btn"     => $btn,
            "inputCallback" => array(
                "namainstansi" => $namainstansi,
            )
        );

        return view("admin.laporan.desa_ikut_program_all")->with($data);
    }

    //3
    public function lapmemberdaftar_all(Request $request)
    {
        if($request->session()->get('idadmin') === "")
        {
            return view("admin.login")->with("status", "Session anda telah habis. Silahkan lakukan login kembali.");
            exit();
        }

        $namapeserta = $request->input("namapeserta");
        $btn = $request->input("btn");

        $this->peserta = DB::table("mst_member as a")
                        ->when($namapeserta, function($query, $namapeserta){
                            return $query->where("a.nama", "LIKE", $namapeserta."%");
                        })
                        ->paginate();

        $this->id = $request->session()->get('idadmin');

        $this->getAdminData = DB::table("mst_admin as a")
                                ->where("a.id", $this->id)
                                ->get();

        $data = array(
            "peserta" => $this->peserta,
            "member" => $this->getAdminData->first(),
            "btn"     => $btn,
            "inputCallback" => array(
                "namapeserta" => $namapeserta
            )
        );

        return view("admin.laporan.laporan_member_daftar_all")->with($data);
    }

    //4
    public function lapmemberprogram_all(Request $request)
    {
        if($request->session()->get('idadmin') === "")
        {
            return view("admin.login")->with("status", "Session anda telah habis. Silahkan lakukan login kembali.");
            exit();
        }

        $namapeserta = $request->input("nama");
        $program     = $request->input("program");
        $btn = $request->input("btn");
        

        $this->id = $request->session()->get('idadmin');

        $this->getAdminData = DB::table("mst_admin as a")
                                ->where("a.id", $this->id)
                                ->get();

        $this->peserta = DB::table("trx_pemesanan as a")
                         ->select(
                            "b.nama as nama",
                            "b.email as email",
                            "b.telp as telp",
                            "b.alamat as alamat",
                            "c.kode_instansi as kodedesa",
                            "c.nama_instansi as namadesa",
                            "d.nama as namatraining",
                            "d.id as idtraining",
                         )
                         ->join("mst_member as b", "b.id", "=", "a.id_member")
                         ->join("mst_instansi as c", "c.id_instansi", "=", "b.id_instansi")
                         ->join("mst_training as d", "d.id", "=", "a.id_training")
                         ->when($namapeserta, function($query, $namapeserta){
                            return $query->where("b.nama", "LIKE", $namapeserta."%");
                         })
                         ->when($program, function($query, $program){
                            return $query->where("d.id",  $program);
                         })
                         ->paginate();
        
        $this->program = DB::table("mst_training as a")
                         ->where("a.reff_id","0")
                         ->get();


        $data = array(
            "member"    => $this->getAdminData->first(),
            "peserta"   => $this->peserta,
            "program"   => $this->program,
            "btn"   => $this->$btn,
            "inputCallback" => array(
                "nama"      => $namapeserta,
                "program"   => $program
            )
        );

        return view("admin.laporan.laporan_member_program_all")->with($data);
    }

    //5
    public function lapmemberdesa_all(Request $request)
    {
        if($request->session()->get('idadmin') === "")
        {
            return view("admin.login")->with("status", "Session anda telah habis. Silahkan lakukan login kembali.");
            exit();
        }


        $namadesa = $request->input("namadesa");
        $kodedesa = $request->input("kodedesa");
        $btn = $request->input("btn");


        $this->id = $request->session()->get('idadmin');

        $this->getAdminData = DB::table("mst_admin as a")
                                ->where("a.id", $this->id)
                                ->get();

        $this->datamember = DB::table("mst_instansi as a")
                            ->select(
                                "a.nama_instansi as namadesa",
                                "a.kode_instansi as kodedesa",
                                "b.nama_propinsi as provinsi",
                                "c.nama_kabupaten as kabupaten",
                                "d.nama_kecamatan as kecamatan",
                                DB::raw("(SELECT COUNT(aa.id) FROM mst_member as aa
                                WHERE aa.id_instansi = a.id_instansi) as jml")
                            )
                            ->join("mst_provinsi as b", "b.kode_propinsi", "=", "a.id_provinsi")
                            ->join("mst_kabupaten as c", "c.kode_kabupaten", "=", "a.id_kabupaten")
                            ->join("mst_kecamatan as d", "d.kode_kecamatan", "=", "a.id_kecamatan")
                            ->when($namadesa , function($query, $namadesa){
                                return $query->where("a.nama_instansi", "LIKE", $namadesa."%");
                            })
                            ->when($kodedesa , function($query, $kodedesa){
                                return $query->where("a.kode_instansi", "LIKE", $kodedesa."%");
                            })
                            ->paginate();

        $data = array(
            "member" => $this->getAdminData->first(),
            "datamember" => $this->datamember,
            "btn" => $btn,
            "inputCallback" => array(
                "namadesa" => $namadesa,
                "kodedesa" => $kodedesa
            )
        );

        return view("admin.laporan.laporan_member_desa_all")->with($data);
    }

}

//GAGAGSJGAJS