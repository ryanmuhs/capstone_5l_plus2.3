<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $antrian = Antrian::with('pasien')->get();
        return view('antrian.index', compact('antrian'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
{
        // Validasi input
        $request->validate([
            'antrianId' => 'required|exists:antrian,id',
            'status' => 'required|in:menunggu,dilayani,selesai,batal',
        ]);

        // Temukan antrian berdasarkan ID dan perbarui status
        $antrian = Antrian::findOrFail($request->antrianId);
        $antrian->status = $request->status;
        $antrian->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('antrian.index')->with('success', 'Status berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
