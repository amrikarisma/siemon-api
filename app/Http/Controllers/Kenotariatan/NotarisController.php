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
        return response([
            'success' => true,
            'message' => 'Berhasil data notaris',
            'attributes' => $notaris,
            // 'count' => $count,
            // 'relationships' => $relationships
        ], 200);   
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
    public function show($id, Notaris $notaris)
    {
        $data = User::selectRaw('notaris.*, mst_kota_kab.*')
        ->leftJoin('notaris', 'notaris.id_notaris', '=', 'users.id_notaris')
        ->leftJoin('mst_kota_kab', 'notaris.id_kota_kab', '=', 'mst_kota_kab.id_kota_kab')
        ->where('notaris.id_notaris', $id)
        ->first();
        
        $data->foto_notaris =  url('foto/'.$data['foto_notaris']);

        return response([
            'success' => true,
            'message' => 'Berhasil data notaris',
            'attributes' => $data
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
    public function update(Request $request, Notaris  $notaris)
    {
        // $this->validate($request, [
        //     'category_type'	        => 'required|in:income,spending',
        //     'category_name'	        => 'required|string',
        //     // 'category_description'	=> 'string'
        // ]);
        // return $request;
        $notaris = Notaris::where('id_notaris', $request->id_notaris)->update($request->all());
        
        if($notaris === 1){
            return response([
                'success' => true,
                'message' => 'Berhasil update Data!',
                'data' => [
                    $request->id_notaris,
                    $request->no_telepon_notaris
                    ]
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'Gagal!',
                'data' => [
                    $request->id_notaris,
                    $request->no_telepon_notaris
                    ]
            ], 400);
        }
 
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
