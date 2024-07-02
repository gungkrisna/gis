<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CentrePoint;
use Illuminate\Http\Request;

class CentrePointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.CentrePoint.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.CentrePoint.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'coordinate' => 'required'
        ]);

        $centerPoint = new CentrePoint;
        $centerPoint->name = $request->input('name');
        $centerPoint->coordinates = $request->input('coordinate');
        $centerPoint->created_by = auth()->id();
        $centerPoint->save();

        if ($centerPoint) {
            return to_route('centre-point.index')->with('success','Data berhasil disimpan');
        } else {
            return to_route('centre-point.index')->with('error','Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function showMap()
    {
        $centrePoint = CentrePoint::all(); // atau query sesuai kebutuhan Anda
        return view('backend.Spot.show_map', ['centrePoint' => $centrePoint]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CentrePoint $centrePoint)
    {
        $centrePoint = CentrePoint::findOrFail($centrePoint->id);
        return view('backend.CentrePoint.edit',['centrePoint' => $centrePoint]);
    }

    /**
     * Update the specified resourece in storage.
     */
    public function update(Request $request, CentrePoint $centrePoint)
    {
        $centrePoint = CentrePoint::findOrFail($centrePoint->id);
        $centrePoint->name = $request->input('name');
        $centrePoint->coordinates = $request->input('coordinate');
        $centrePoint->updated_by = auth()->id();
        $centrePoint->update();

        if ($centrePoint) {
            return to_route('centre-point.index')->with('success','Data berhasil diupdate');
        } else {
            return to_route('centre-point.index')->with('error','Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $centrePoint = CentrePoint::findOrFail($id);
        $centrePoint->delete();
        return redirect()->back();
    }
}