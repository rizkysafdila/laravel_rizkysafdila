<?php

namespace App\Http\Controllers;

use App\Http\Requests\RumahSakit\StoreRequest;
use App\Http\Requests\RumahSakit\UpdateRequest;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rumahsakits = RumahSakit::all();
        return view('rumahsakit.index', compact('rumahsakits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rumahsakit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedData = $request->validate($request->rules());

        RumahSakit::create($validatedData);

        return redirect()->route('rumahsakit.index')->with('success', 'Rumah Sakit berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RumahSakit $rumahsakit)
    {
        return view('rumahsakit.edit', compact('rumahsakit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, RumahSakit $rumahsakit)
    {
        $validatedData = $request->validate($request->rules());

        $rumahsakit->update($validatedData);

        return redirect()->route('rumahsakit.index')->with('success', 'Rumah Sakit berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RumahSakit $rumahsakit)
    {
        $rumahsakit->delete();
        return response()->json(['success' => true]);
    }
}
