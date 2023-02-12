<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usrman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UsrmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usrman.index');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
        $user = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        );
        User::create($user);
        return redirect()->route('IndexUsrman')
                        ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usrman  $usrman
     * @return \Illuminate\Http\Response
     */
    public function show(Usrman $usrman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usrman  $usrman
     * @return \Illuminate\Http\Response
     */
    public function edit(Usrman $usrman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usrman  $usrman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usrman $usrman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usrman  $usrman
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $datausrman)
    {
        $datausrman->delete();
    
        return redirect()->route('IndexUsrman')
                        ->with('success','Data Telah Dihapus.');
    }
}
