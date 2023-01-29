<?php

namespace App\Http\Controllers;

use App\Models\Perkiraan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perkiraans = Perkiraan::all();
        $code = 'T' . date('ym') . rand(1111, 9999);
        return view('transaksi.index', [
            'perkiraans' => $perkiraans,
            'code' => $code,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // $request->validate([
            //     'kodetransaksi' => ['required', 'min:8', 'max:8'],
            //     'tanggaltransaksi' => 'required',
            //     'kdperkiraan' => 'required',
            //     'keterangan ' => 'required',
            //     'nominal ' => 'required',
            // ]);

            $pilihan = $request->kdperkiraan;
            $jenisold = Perkiraan::where('kodeperkiraan', $pilihan)
                ->select('jenisperkiraan')
                ->get();

            foreach ($jenisold as $value) {
                $jenisnew = $value->jenisperkiraan;
            }
            // dd($request->nominal);
        
            if($jenisnew == 'Debit'){
                DB::table('transaksis')->insert([
                    'kodetransaksi' => $request->kodetransaksi,
                    'tanggaltransaksi' => $request->tanggaltransaksi,
                    'kdperkiraan' => $request->kdperkiraan,
                    'keterangan' => $request->keterangan,
                    'transaksidebit' => $request->nominal,
                    'transaksikredit' => 0,
                ]);
            }elseif($jenisnew == 'Kredit'){
                DB::table('transaksis')->insert([
                    'kodetransaksi' => $request->kodetransaksi,
                    'tanggaltransaksi' => $request->tanggaltransaksi,
                    'kdperkiraan' => $request->kdperkiraan,
                    'keterangan' => $request->keterangan,
                    'transaksidebit' => 0,
                    'transaksikredit' => $request->nominal,
                ]);
            }
            
            return redirect()->route('IndexTransaksi')
                        ->with('success','Data Telah Ditambahkan.');
        } catch (QueryException $exception) {
            return redirect()->route('IndexTransaksi')
                        ->with('error','Data Telah Ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $datatransaksi)
    {
        $datatransaksi->delete();
    
        return redirect()->route('IndexTransaksi')
                        ->with('success','Data Telah Dihapus.');
    }
}
