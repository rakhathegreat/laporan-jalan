<?php

namespace App\Http\Controllers;

use App\Models\DataJalan;
use Illuminate\Http\Request;

class DataJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataJalan = DataJalan::orderBy('created_at', 'asc');

        if (request('search')) {
            $regex = new \MongoDB\BSON\Regex(request('search'), 'i');
            $dataJalan->where('nama', $regex);
            $dataJalan->orWhere('kelurahan', $regex);
            $dataJalan->orWhere('kondisi', $regex);
            $dataJalan->orWhere('rt', $regex);
            $dataJalan->orWhere('rw', $regex);
        }

        return view('admin.data-jalan', [
            'dataJalan' => $dataJalan->get()
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataJalan $dataJalan)
    {
        //
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
