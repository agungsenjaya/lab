<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Dokter;
use App\Formula;
use App\Price;
use App\Diagnosa;
use App\Pricing;
use App\Cetak;
use Carbon\Carbon;
use DB,Session,Uuid,Validator,Auth,Hash, Response;

class ApiController extends Controller
{
    protected $cek_price;
    public function __construct()
    {
        // $this->middleware('auth');
        $this->cek_price = [];
    }

    public function pasiens(Request $request)
    {
        return Response::json([
            'code'  => 200,
            'data'  => Pasien::all()
        ]);
    }
    
    public function pasiens_search(Request $request, $a)
    {
        $data = Pasien::where('ktp',$a)->first();
        return Response::json([
            'code'  => 200,
            'data'  => $data
        ]);
    }

    public function prices_store(Request $request, $a)
    {
        $for;
        $valid = Price::where('formula_id',$request->formula_id)->where('cabang_id', Auth::user()->cabang_id)->first();
        if ($valid) {
            $valid->pembayaran = $request->pembayaran;
            $valid->save();
            if ($valid) {
                return Response::json([
                    'code'  => 200,
                ]);
            }
        }else{
            $for = Price::create([
                'cabang_id' => Auth::user()->cabang_id,
                'user_id' => Auth::user()->user_id,
                'formula_id' => $request->formula_Id,
                'pembayaran' => $request->pembayaran,
            ]);
            if (count($for)) {
                return Response::json([
                    'code'  => 200,
                ]);
            }
        }
    }

    public function formulas($id)
    {
        $data = Formula::where('formula_kat_id', $id)->get();
        if (count($data)) {
            for ($i=0; $i < count($data); $i++) {
                $dataa = Price::where('formula_id', $data[$i]->id)->where('cabang_id', 1)->first();
                if ($dataa) {
                    array_push($this->cek_price, $dataa);
                }
            }
            return Response::json([
                'code'  => 200,
                'data' => $data,
                'price' => $this->cek_price
            ]);
        }
    }

    public function formula_price(Request $request)
    {
        $data = Price::where('formula_id',$request->formula_id)->where('cabang_id',$request->cabang_id)->first();
        if ($data) {
            $data->pembayaran = $request->pembayaran;
            $data->save();
        }else {
            $dataa = Price::create([
                'user_id' => $request->user_id,
                'cabang_id' => $request->cabang_id,
                'pembayaran' => $request->pembayaran,
                'formula_id' => $request->formula_id,
            ]);
        }
        return Response::json([
            'code'  => 200,
            'data'  => $request->pembayaran,
        ]);
    }

    public function formula_price_check(Request $request){
        $embose = array();
        for ($i=0; $i < count($request->id); $i++) {
            $ro = $request->id[$i];
            $data = Price::where('formula_id', $ro)->where('cabang_id', $request->cabang_id)->first();
            if ($data) {
                array_push($embose, array(
                    'id' => $ro,
                    'price' => $data->pembayaran,
                ));
            }
        }
        return Response::json([
            'code'  => 200,
            'data' => $embose
        ]);
    }

    public function laporan_keuangan(Request $request) {
        $data;
        $periode;
        $dia = array();
        if ($request->start && $request->end) {
            $data = Diagnosa::where('cabang_id', $request->cabang_id)->whereDate('created_at', '>=' ,$request->start)->whereDate('created_at','<=',$request->end)->get();
            $periode = $request->start . ' - ' . $request->end;
            for ($i=0; $i < count($data); $i++) { 
                $ele = $data[$i];
                $ele->ctd = $ele->created_at->format('d-m-Y');
                $ele->pasien_id = $ele->pasien->name;
                $ele->dokter_id = $ele->dokter->name;
                array_push($dia, $ele);
            }
        }elseif($request->start){
            $data = Diagnosa::where('cabang_id', $request->cabang_id)->whereDate('created_at',$request->start)->get();
            $periode = $request->start;
            for ($i=0; $i < count($data); $i++) { 
                $ele = $data[$i];
                $ele->ctd = $ele->created_at->format('d-m-Y');
                $ele->pasien_id = $ele->pasien->name;
                $ele->dokter_id = $ele->dokter->name;
                array_push($dia, $ele);
            }
        }

        return Response::json([
            'code'  => 200,
            'data'  => $data,
            'dia'  => $dia,
            'periode' => $periode,
        ]);
    }

    public function pricing(Request $request) {
        $data = Pricing::where('cabang_id',$request->id )->first();
        if ($data->status == '0') {
            $data->status = '1';
            $data->save();
        }else{
            $data->status = '0';
            $data->save();
        }
        return Response::json([
            'code'  => 200,
            'data'  => $data,
        ]);
    }

    public function nliai(Request $request) {
        $data = Nilai::where('formula_id',$request->id)->get();
        if ($data) {
            return Response::json([
                'code'  => 200,
                'data'  => $data,
            ]);
        }
    }

    public function cetak(Request $request) {
        $cetak = Cetak::create([
            'diagnosa_id' => $request->diagnosa_id,
            'user_id' => $request->user_id,
        ]);
        if($cetak){
            return Response::json([
                'code'  => 200,
            ]);
        }
    }

}
