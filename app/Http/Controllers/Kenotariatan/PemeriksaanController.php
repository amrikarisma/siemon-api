<?php

namespace App\Http\Controllers\Kenotariatan;

use App\Http\Controllers\Controller;
use App\Models\Kenotariatan\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pemeriksaan::all();
        $collection = collect($data);
        $multiplied = $collection->map(function ($item, $key) {
            $item->protokol_hasil = unserialize($item->protokol_hasil);
            $item->protokol_catatan = unserialize($item->protokol_catatan);
            return $item;
        });
        $multiplied->all();
        
        
        return response([
            'success' => true,
            'message' => 'Berhasil data pemeriksaan protokol notaris',
            'attributes' => $multiplied,
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
        // return $request;
        $validator = Validator::make($request->all(), [
            'id_notaris' => 'required|integer',
            'protokol_status' => 'required',
            'protokol_tahun' => 'required',
            'protokol_hasil' => 'required',
            'protokol_tanggal_pengiriman' => 'required',
        ]);

        if ($validator->fails()) {
            $res = $validator->errors();
            return response([
                'success' => false,
                'message' => 'Gagal disimpan',
                'attributes' => $res,
            ], 400);
        } else {
            $res = Pemeriksaan::create($request->all());
            return response([
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'attributes' => $res,
            ], 200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kenotariatan\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemeriksaan $pemeriksaan)
    {
        // return unserialize($pemeriksaan->protokol_hasil);

        if( isset($pemeriksaan) ){

            $pemeriksaan->protokol_hasil = unserialize($pemeriksaan->protokol_hasil);
            $pemeriksaan->protokol_catatan = unserialize($pemeriksaan->protokol_catatan);
            
            return response([
                'success' => true,
                'message' => 'Berhasil ambil Data!',
                'data' => $pemeriksaan
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'Gagal!',
                'data' => $pemeriksaan
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kenotariatan\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kenotariatan\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemeriksaan $pemeriksaan)
    {
        $update = Pemeriksaan::where('id', $pemeriksaan->id)->update($request->all());

        if($update === 1){
            return response([
                'success' => true,
                'message' => 'Berhasil update Data!',
                'data' => [
                    $request->all(),
                    ]
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'Gagal!',
                'data' => [
                    $request->all(),
                    ]
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kenotariatan\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemeriksaan $pemeriksaan)
    {
        $delete = Pemeriksaan::find($pemeriksaan->id)->delete();
        if($delete == 1){
            return response([
                'success' => true,
                'message' => 'Berhasil hapus Data!',
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'Gagal!',
            ], 400);
        }
    }
}
