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
    public function indexmaster()
    {
        return view('laporan.indexmaster');
    }

    public function indexdetail()
    {
        return view('laporan.indexdetail');
    }

    public function olahdetail(Request $request)
    {
        $request->validate([
            'tanggalawal'=> 'required',
            'tanggalakhir'=> 'required',
        ]);

        $tanggalawal = $request->tanggalawal;
        $tanggalakhir = $request->tanggalakhir;
        
        $laporandetail = DB::table('transaksis')
            ->select('*')
            ->whereBetween('tanggaltransaksi', [$tanggalawal, $tanggalakhir])
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

    public function olahgroup(Request $request)
    {
        $request->validate([
            'tanggalawal'=> 'required',
            'tanggalakhir'=> 'required',
        ]);

        $tanggalawal = $request->tanggalawal;
        $tanggalakhir = $request->tanggalakhir;

        $laporangrupdebit = DB::table('transaksis')
            ->selectRaw('transaksis.kdperkiraan, perkiraans.namaperkiraan, SUM(transaksis.transaksidebit) AS TOTAL')
            ->join('perkiraans','transaksis.kdperkiraan', '=', 'perkiraans.kodeperkiraan')
            ->whereBetween('tanggaltransaksi', [$tanggalawal, $tanggalakhir])
            ->groupBy('transaksis.kdperkiraan', 'perkiraans.namaperkiraan')
            ->get();
        
        $laporangrupkredit = DB::table('transaksis')
            ->selectRaw('transaksis.kdperkiraan, perkiraans.namaperkiraan, SUM(transaksis.transaksikredit) AS TOTAL')
            ->join('perkiraans','transaksis.kdperkiraan', '=', 'perkiraans.kodeperkiraan')
            ->whereBetween('tanggaltransaksi', [$tanggalawal, $tanggalakhir])
            ->groupBy('transaksis.kdperkiraan', 'perkiraans.namaperkiraan')
            ->get();

        Laporangroup::query()->truncate();
        Laporangroupkredit::query()->truncate();
        for ($f = 0; $f < $laporangrupdebit->count(); $f++){
            Laporangroup::create(['kodeperkiraan' =>$laporangrupdebit[$f]->kdperkiraan,
                                 'keterangan' =>$laporangrupdebit[$f]->namaperkiraan, 
                                 'totaldebit' =>$laporangrupdebit[$f]->TOTAL]); 
        }
        for ($f = 0; $f < $laporangrupkredit->count(); $f++){
            Laporangroupkredit::create(['kodeperkiraan' =>$laporangrupkredit[$f]->kdperkiraan,
                                 'keterangan' =>$laporangrupkredit[$f]->namaperkiraan, 
                                 'totalkredit' =>$laporangrupkredit[$f]->TOTAL]); 
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
    public function destroygroup()
    {
        Laporangroup::query()->truncate();
        Laporangroupkredit::query()->truncate();
        return redirect()->route('IndexLaporangroup')->with('berhasil','Data Telah Diperbaharui.');
    }
    public function destroydetail(Laporan $laporan)
    {
        Laporandetail::query()->truncate();
        return redirect()->route('IndexLaporandetail')->with('berhasil','Data Telah Diperbaharui.');
    }
}
