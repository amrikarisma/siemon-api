<?php

namespace App\Http\Controllers\Kenotariatan;

use App\Http\Controllers\Controller;
use App\Models\Kenotariatan\Laporan;
use App\Models\Kenotariatan\Legalisasi;
use App\Models\Kenotariatan\Warmerking;
use App\Models\Kenotariatan\Akta;
use App\Models\Kenotariatan\Notaris;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Notaris::selectRaw('notaris.id_notaris, notaris.nama_notaris, tbl_laporan_bulanan.*')
        ->leftJoin('tbl_laporan_bulanan', 'notaris.id_notaris', '=', 'tbl_laporan_bulanan.id_notaris')
        ->limit(100)
        ->get();
        $collection = collect($data);
        $multiplied = $collection->map(function ($item, $key) {
            $item->total_akta = Akta::where('id_notaris', $item->id_notaris)->where('tanggal_akta', 'like', '%'.date('Y').'%')->count();
            $item->total_legalisasi = Legalisasi::where('id_notaris', $item->id_notaris)->where('tanggal', 'like', '%'.date('Y').'%')->count();
            $item->total_warmerking = Warmerking::where('id_notaris', $item->id_notaris)->where('tanggal_pembukuan', 'like', '%'.date('Y').'%')->count();
            return $item;
        });
        $multiplied->all();
        return response([
            'success' => true,
            'message' => 'Berhasil ambil data laporan',
            'attributes' => $multiplied,
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
     * @param  \App\Models\Kenotariatan\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        $data = Notaris::findOrFail($laporan->id);
        return $data;
        $collection = collect($data);
        $multiplied = $collection->map(function ($item, $key) {
            $item->total_akta = Akta::where('id_notaris', $item->id_notaris)->where('tanggal_akta', 'like', '%'.date('Y').'%')->count();
            $item->total_legalisasi = Legalisasi::where('id_notaris', $item->id_notaris)->where('tanggal', 'like', '%'.date('Y').'%')->count();
            $item->total_warmerking = Warmerking::where('id_notaris', $item->id_notaris)->where('tanggal_pembukuan', 'like', '%'.date('Y').'%')->count();
            return $item;
        });
        $multiplied->all();
        return response([
            'success' => true,
            'message' => 'Berhasil ambil data laporan',
            'attributes' => $multiplied,
            // 'count' => $count,
            // 'relationships' => $relationships
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kenotariatan\Laporan  $laporan
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
     * @param  \App\Models\Kenotariatan\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kenotariatan\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
