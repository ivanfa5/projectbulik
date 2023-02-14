<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Laporandetail;
use App\Models\Laporangroup;
use App\Models\Laporangroupkredit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdetail()
    {
        return view('laporan.indexdetail');
    }

    public function olahdetail(Request $request)
    {
        $request->validate([
            'bulan'=> 'required',
            'tahun'=> 'required',
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;
        
        $laporandetail = DB::table('transaksis')
            ->select('*')
            ->where(DB::raw('MONTH(tanggaltransaksi)'), '=', $bulan, 'and')
            ->where(DB::raw('YEAR(tanggaltransaksi)'), '=', $tahun)
            ->get();
        // dd($laporandetail);
        Laporandetail::query()->truncate();
        for ($f = 0; $f < $laporandetail->count(); $f++){
            Laporandetail::create(['kodetransaksi' =>$laporandetail[$f]->kodetransaksi,
                                 'tanggaltransaksi' =>$laporandetail[$f]->tanggaltransaksi, 
                                 'kdperkiraan' =>$laporandetail[$f]->kdperkiraan, 
                                 'keterangan' =>$laporandetail[$f]->keterangan, 
                                 'transaksidebit' =>$laporandetail[$f]->transaksidebit, 
                                 'transaksikredit' => $laporandetail[$f]->transaksikredit]); 
        }

        return redirect()->route('IndexLaporandetail')->with('berhasil','Data Telah Diperbaharui.');
    }

    public function indexgroup()
    {
        return view('laporan.indexgroup');
    }

    public function olahgroupdebit(Request $request)
    {
        $request->validate([
            'bulan'=> 'required',
            'tahun'=> 'required',
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;
        
        $laporangrup = DB::table('transaksis')
            ->selectRaw('kdperkiraan, SUM(transaksidebit) AS TOTAL, MONTH(tanggaltransaksi) AS BULAN, YEAR(tanggaltransaksi) AS TAHUN')
            ->where(DB::raw('MONTH(tanggaltransaksi)'), '=', $bulan, 'and')
            ->where(DB::raw('YEAR(tanggaltransaksi)'), '=', $tahun)
            ->groupBy('kdperkiraan', 'BULAN', 'TAHUN')
            ->get();
        // dd($laporangrup);
        Laporangroup::query()->truncate();
        for ($f = 0; $f < $laporangrup->count(); $f++){
            // $nilaiakhirnya[$f] = array('kodenyaalter' =>$alternatifs[$f]->kodealternatif,
            //                            'namanyaalter' =>$alternatifs[$f]->namaalternatif, 
            //                            'nilaipreferensi' => $Preferensi[$f]); 
            Laporangroup::create(['kodeperkiraan' =>$laporangrup[$f]->kdperkiraan,
                                 'totaldebit' =>$laporangrup[$f]->TOTAL, 
                                 'bulan' =>$laporangrup[$f]->BULAN, 
                                 'tahun' => $laporangrup[$f]->TAHUN]); 
        }

        return redirect()->route('IndexLaporangroup')->with('berhasil','Data Telah Diperbaharui.');
    }

    public function olahgroupkredit(Request $request)
    {
        $request->validate([
            'bulan'=> 'required',
            'tahun'=> 'required',
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;
        
        $laporangrup = DB::table('transaksis')
            ->selectRaw('kdperkiraan, SUM(transaksikredit) AS TOTAL, MONTH(tanggaltransaksi) AS BULAN, YEAR(tanggaltransaksi) AS TAHUN')
            ->where(DB::raw('MONTH(tanggaltransaksi)'), '=', $bulan, 'and')
            ->where(DB::raw('YEAR(tanggaltransaksi)'), '=', $tahun)
            ->groupBy('kdperkiraan', 'BULAN', 'TAHUN')
            ->get();
        // dd($laporangrup);
        Laporangroupkredit::query()->truncate();
        for ($f = 0; $f < $laporangrup->count(); $f++){
            // $nilaiakhirnya[$f] = array('kodenyaalter' =>$alternatifs[$f]->kodealternatif,
            //                            'namanyaalter' =>$alternatifs[$f]->namaalternatif, 
            //                            'nilaipreferensi' => $Preferensi[$f]); 
            Laporangroupkredit::create(['kodeperkiraan' =>$laporangrup[$f]->kdperkiraan,
                                 'totalkredit' =>$laporangrup[$f]->TOTAL, 
                                 'bulan' =>$laporangrup[$f]->BULAN, 
                                 'tahun' => $laporangrup[$f]->TAHUN]); 
        }

        return redirect()->route('IndexLaporangroup')->with('berhasil','Data Telah Diperbaharui.');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
