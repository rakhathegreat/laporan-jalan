<?php

namespace App\Http\Controllers;

use App\Models\DataJalan;
use Illuminate\Http\Request;
use App\Models\KondisiJalan;
use App\Models\Alamat;

class DataJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataJalan = DataJalan::orderBy('created_at', 'desc');
        if (request()->filled('search')) {
            $search = request('search');

            $dataJalan->where(function ($query) use ($search) {
                $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('panjang', 'like', "%{$search}%")
                    ->orWhere('lebar', 'like', "%{$search}%")
                    ->orWhere('keterangan', 'like', "%{$search}%");
            });
        }

        if (request('kondisi')) {
            $dataJalan->whereHas('kondisi_jalan', function ($query) {
                $query->where('kondisi', request('kondisi'));
            });
        }

        if (request('kelurahan')) {
            $dataJalan->whereHas('alamat', function ($query) {
                $query->where('kelurahan', request('kelurahan'));
            });
        }

        if (request('rt')) {
            $dataJalan->whereHas('alamat', function ($query) {
                $query->where('rt', request('rt'));
            });
        }

        if (request('rw')) {
            $dataJalan->whereHas('alamat', function ($query) {
                $query->where('rw', request('rw'));
            });
        }

        return view('admin.data-jalan', [
            'dataJalan' => $dataJalan->paginate(50)
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        DataJalan::whereIn('id', $ids)->delete();
        return response()->json([
            'success' => "Data deleted successfully"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $alamat = Alamat::create([
            'kelurahan' => $request->kelurahan,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);

        DataJalan::create([
            'nama' => $request->nama,
            'panjang' => $request->panjang,
            'lebar' => $request->lebar,
            'kondisi_jalan_id' => $request->kondisi,
            'keterangan' => $request->keterangan,
            'alamat_id' => $alamat->id,
        ]);

        return redirect('/data-jalan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataJalan $dataJalan)
    {
        return view('admin.detail', [
            'dataJalan' => $dataJalan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataJalan $dataJalan)
    {
        return view('admin.edit', [
            'dataJalan' => $dataJalan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataJalan $dataJalan)
    {
        $dataJalan->update([
            'nama' => $request->nama,
            'panjang' => $request->panjang,
            'lebar' => $request->lebar,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
        ]);

        $dataJalan->alamat->update([
            'kelurahan' => $request->kelurahan,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);

        return redirect('/data-jalan/'.$dataJalan->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataJalan $dataJalan)
    {
        $dataJalan->delete();

        return redirect('/data-jalan');
    }
}
