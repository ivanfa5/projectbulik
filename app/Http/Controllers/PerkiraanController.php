<?php

namespace App\Http\Controllers;

use App\Models\Perkiraan;
use Illuminate\Http\Request;

class PerkiraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perkiraan.index');
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
        $request->validate([
            'kodeperkiraan' => 'required',
            'namaperkiraan' => 'required',
            'jenisperkiraan' => 'required',
        ]);
    
        Perkiraan::create($request->all());
     
        return redirect()->route('IndexKodeperkiraan')
                        ->with('success','Data Telah Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perkiraan  $perkiraan
     * @return \Illuminate\Http\Response
     */
    public function show(Perkiraan $perkiraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perkiraan  $perkiraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perkiraan $perkiraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perkiraan  $perkiraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perkiraan $perkiraan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perkiraan  $perkiraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perkiraan $perkiraan)
    {
        //
    }
}
