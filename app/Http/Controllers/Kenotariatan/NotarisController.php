<?php

namespace App\Http\Controllers\Kenotariatan;

use App\Http\Controllers\Controller;
use App\Models\Kenotariatan\Notaris;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notaris = Notaris::all();
        return $notaris;
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
     * @param  \App\Models\Kenotariatan\Notaris  $notaris
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request, Notaris $notaris)
    {
        $data = [];
        $data = User::selectRaw('notaris.*, mst_kota_kab.*')
        ->leftJoin('notaris', 'notaris.id_notaris', '=', 'users.id_notaris')
        ->leftJoin('mst_kota_kab', 'notaris.id_kota_kab', '=', 'mst_kota_kab.id_kota_kab')
        ->where('notaris.id_notaris', $id)
        ->first();
        $data['foto_notaris'] =  url('foto/'.$data['foto_notaris']);
        return response()->json([
            'code' => '200',
            'data' => $data
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kenotariatan\Notaris  $notaris
     * @return \Illuminate\Http\Response
     */
    public function edit(Notaris $notaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kenotariatan\Notaris  $notaris
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Notaris $notaris)
    public function update(Request $request, $id)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kenotariatan\Notaris  $notaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notaris $notaris)
    {
        //
    }
}
