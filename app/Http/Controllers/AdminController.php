<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Dokter;
use App\Cabang;
use App\Nilai;
use App\Formula;
use App\Formula_kat;
use App\Diagnosa;
use App\Pricing;
use App\Cetak;
use Carbon\Carbon;
use Faker\Factory as Faker; 
use PDF;
use DB,Session,Uuid,Validator,Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Diagnosa::where('cabang_id', Auth::user()->cabang_id)->whereDate('created_at', Carbon::today())->get();
        return view('admin.index',compact('data'));
    }

    public function pasien()
    {
        // $data =Diagnosa::select('*')
        $data =Diagnosa::where('cabang_id', Auth::user()->cabang_id)
        ->whereBetween('created_at', 
            [Carbon::now()->subMonth(1), Carbon::now()]
        )
        ->get();

        // $pasien = Diagnosa::where('cabang_id', Auth::user()->cabang_id)->get();
        return view('admin.pasien',compact('data'));
    }
    
    public function pasien_search()
    {
        return view('admin.pasien_search')->with('pasien', Pasien::all());
    }
    
    public function pasien_new()
    {
        $dokter = Dokter::where('cabang_id', Auth::user()->cabang_id)->get();
        return view('admin.pasien_new',compact('dokter'))->with('pasien', Pasien::all())->with('formula', Formula::all())->with('nilai', Nilai::all());
    }

    public function pasien_store(Request $request)
    {
        // dd($request->all());
        $pasien;
        if ($request->ktp) {
            $valid = Validator::make($request->all(), [
                'ktp' => 'unique:pasiens',
            ]);
            if ($valid->fails()) {
                $pasien = Pasien::where('ktp',$request->ktp)->first();
                $pasien = $pasien->id;
            }
            else{
                $pasien = Pasien::create([
                    'name' => $request->name,
                    'tanggal_lahir' => $request->tgl,
                    'ktp' => ($request->ktp) ? $request->ktp : NULL,
                    'kelamin' => $request->kelamin,
                    'alamat' => $request->alamat,
                ]);
                if ($pasien) {
                    $pasien = $pasien->id;
                }
            }
        }else{
            $pasien = Pasien::create([
                'name' => $request->name,
                'tanggal_lahir' => $request->tgl,
                'kelamin' => $request->kelamin,
                'alamat' => $request->alamat,
            ]);
            if ($pasien) {
                $pasien = $pasien->id;
            } 
        }


        $formula = json_decode($request->formula);
        $uuid = Uuid::generate(1);
        $diagnosa = Diagnosa::create([
            'kode'  => $uuid->string,
            'pasien_id' => $pasien,
            'cabang_id' => Auth::user()->cabang_id,
            'dokter_id' => $request->dokter,
            'data' => json_encode($request->data),
            'user_id' => $request->user,
            'pembayaran' => $request->pembayaran,
        ]);
        if ($diagnosa) {
            Session::flash('success','Anda berhasil menambahkan data.');
            return redirect()->route('admin.diagnosa',$diagnosa->kode);
        }
    }

    public function diagnosa($id)
    {
        $data = Diagnosa::where('kode', $id)->first();
        $dat = json_decode($data->data);
        $da = json_decode($dat[0]);
        
        for ($i=0; $i < count($da) ; $i++) {
            $ded = Formula_kat::find($da[$i]->data->formula_kat_id);
            $da[$i]->no_kategori = $ded->id;
            $da[$i]->kategori = $ded->judul;
        }
        $data->data = $da;

        $gas = array();
        foreach ($data->data as $element) {
            $gas[$element->kategori][] = $element;
        }
        
        return view('admin.diagnosa',compact('data','gas'));
    }

    public function pasien_detail($id)
    {
        $pasien = Pasien::where('id', $id)->first();
        return view('admin.pasien_detail',compact('pasien'));
    }

    public function dokter()
    {
        $dokter = Dokter::where('cabang_id', Auth::user()->cabang_id)->get();
        return view('admin.dokter', compact('dokter'));
    }

    public function info()
    {
        $cabang = Cabang::where('id', Auth::user()->cabang_id)->first();
        return view('admin.info', compact('cabang'));
    }

    public function cetak(Request $request, $id)
    {
        $data = Diagnosa::where('kode', $id)->first();
        $dat = json_decode($data->data);
        $da = json_decode($dat[0]);
        $paper = ($request->query('paper') == 'A4') ? 'A4' : 'Letter';
        $margin = ($request->query('paper') == 'A4') ? '80mm' : '100mm';
        
        for ($i=0; $i < count($da) ; $i++) {
            $ded = Formula_kat::find($da[$i]->data->formula_kat_id);
            $da[$i]->no_kategori = $ded->id;
            $da[$i]->kategori = $ded->judul;
        }
        $data->data = $da;

        $gas = array();
        foreach ($data->data as $element) {
            $gas[$element->kategori][] = $element;
        }

        $headerHtml = view()->make('pdf.header',compact('data'))->render();
        $pdf = PDF::loadView('pdf.pasien', compact('data','gas'));
        return $pdf
        ->setOption('page-size', $paper)
        ->setOrientation('portrait')
        ->setOption('margin-top', $margin)
        ->setOption('footer-left','(*) Menunjukan hasil diatas atau dibawah nilai normal')
        ->setOption('header-font-name','Verdana')
        ->setOption('footer-font-name','Verdana')
        ->setOption('header-font-size','6')
        ->setOption('footer-font-size','7')
        ->setOption('header-html',$headerHtml)
        ->setOption('footer-right', 'Page [page] of [toPage]')
        ->inline();
    }

    public function cetak_testing(){
        $pdf = PDF::loadView('pdf.testing');
        return $pdf
        ->setOrientation('portrait')
        ->setOption('footer-right', 'Page [page] of [toPage]')
        ->setOption('page-width', '210')
        ->setOption('page-height', '297')
        ->inline();
    }
}
