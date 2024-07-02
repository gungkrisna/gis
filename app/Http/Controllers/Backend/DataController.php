<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CentrePoint;
use App\Models\Spot;

class DataController extends Controller
{
    public function centrepoint()
    {
        $centrepoint = CentrePoint::latest()->with('spots')->get();
        
        return datatables()->of($centrepoint)
            ->addColumn('spot_count', function ($centrepoint) {
                return $centrepoint->spots->count();
            })
            ->addColumn('jumlah_anggota_kk', function ($centrepoint) {
                return $centrepoint->spots->sum('jumlah_anggota_kk') . ' Orang';
            })
            ->addColumn('action','backend.CentrePoint.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function spot()
    {
        $spot = Spot::with('createdBy')->latest()->get();

        return datatables()->of($spot)
            ->addColumn('centrepoint', function ($spot) {
                return $spot->centrePoint ? $spot->centrePoint->name : 'N/A'; 
            })
            ->addColumn('created_by', function ($spot) {
                return $spot->createdBy ? $spot->createdBy->name : 'N/A'; 
            })
            ->addColumn('action', 'backend.Spot.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
}
