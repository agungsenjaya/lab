<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Dokter;
use App\Formula;
use App\Price;
use App\Diagnosa;
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
}
