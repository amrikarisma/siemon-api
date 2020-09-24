<?php

namespace App\Http\Controllers\Kenotariatan;

use App\Http\Controllers\Controller;
use App\Models\Kenotariatan\Akta;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AktaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('notaris')
        ->leftJoin('aktas', 'notaris.id_notaris', '=', 'aktas.id_notaris')
        ->select('aktas.*', 'notaris.nama_notaris')
        ->limit(1000)
        ->get();

        return $data;
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
     * @param  \App\Models\Kenotariatan\Akta  $akta
     * @return \Illuminate\Http\Response
     */
    public function show(Akta $akta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kenotariatan\Akta  $akta
     * @return \Illuminate\Http\Response
     */
    public function edit(Akta $akta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kenotariatan\Akta  $akta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Akta $akta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kenotariatan\Akta  $akta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Akta $akta)
    {
        //
    }
}
