<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pasien\StoreRequest;
use App\Http\Requests\Pasien\UpdateRequest;
use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pasien::with('rumahSakit');

        // filter berdasarkan rumah_sakit_id
        if ($request->has('rumah_sakit_id') && $request->rumah_sakit_id) {
            $query->where('rumah_sakit_id', $request->rumah_sakit_id);
        }

        $pasiens = $query->get();
        $rumahsakits = RumahSakit::all();

        // jika request AJAX (filtering)
        if ($request->ajax()) {
            $html = view('pasien.partials.table', compact('pasiens'))->render();
            return response()->json(['html' => $html]);
        }

        return view('pasien.index', compact('pasiens', 'rumahsakits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rumahsakits = RumahSakit::all();

        return view('pasien.create', compact('rumahsakits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Pasien::create($request->validate($request->rules()));

        return redirect()->route('pasien.index')
                         ->with('success', 'Pasien berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        $rumahsakits = RumahSakit::all();

        return view('pasien.edit', compact('pasien', 'rumahsakits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Pasien $pasien)
    {
        $pasien->update($request->validate($request->rules()));

        return redirect()->route('pasien.index')
                         ->with('success', 'Pasien berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Pasien $pasien)
    {
        $pasien->delete();

        if ($request->ajax()) {
            return response()->json(['success' => 'Pasien berhasil dihapus.']);
        }

        return redirect()->route('pasien.index')
                         ->with('success', 'Pasien berhasil dihapus.');
    }
}
