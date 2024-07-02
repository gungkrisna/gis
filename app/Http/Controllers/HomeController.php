<?php

namespace App\Http\Controllers;

use App\Models\CentrePoint;
use App\Models\Spot;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $centerPoint = CentrePoint::get()->first();
        $centerPoints = CentrePoint::all(); 
        return view('home', 
            [
                'centerPoints' => $centerPoints,
                'centerPoint' => $centerPoint
            ]
        );
    }

    public function simple_map()
    {
        return view('leaflet.simple-map');
    }

    public function marker()
    {
        return view('leaflet.marker');
    }

    public function circle()
    {
        return view('leaflet.circle');
    }

    public function polygon()
    {
        return view('leaflet.polygon');
    }

    public function polyline()
    {
        return view('leaflet.poyline');
    }

    public function rectangle()
    {
        return view('leaflet.rectangle');
    }

    public function layers()
    {
        return view('leaflet.layer');
    }

    public function layer_group()
    {
        return view('leaflet.layer_group');
    }

    public function geojson()
    {
        return view('leaflet.geojson');
    }

    public function getCoordinate()
    {
        return view('leaflet.get_coordinate');
    }

    public function spots($id = null)
    {
        $centerPoints = CentrePoint::all(); 
        $centerPoint = CentrePoint::get()->first();
        $spot = Spot::get();

        $targetSpot = null;
        if ($id) {
            $targetSpot = Spot::findOrFail($id);
        }

        return view('frontend.home',[
            'centerPoints' => $centerPoints,
            'centerPoint' => $centerPoint,
            'spot' => $spot,
            'targetSpot' => $targetSpot,
        ]);
    }

    public function detailSpot($slug)
    {
        $spot = Spot::where('slug',$slug)->first();
        return view('frontend.detail',['spot' => $spot]);
    }

    public function fetchDashboardData($id = null)
    {
        if ($id) {
            $centerPoint = CentrePoint::with('spots')->find($id);
            if (!$centerPoint) {
                return response()->json(['error' => 'Centre Point not found'], 404);
            }

            $spots = $centerPoint->spots;
        } else {
            $spots = Spot::all();
        }

        $jumlah_kk = $spots->count();
        $jumlah_anggota = $spots->sum('jumlah_anggota_kk');

        $jumlah_kk_miskin = $spots->where('kelas_kemiskinan', 'Miskin')->count();
        $jumlah_anggota_miskin = $spots->where('kelas_kemiskinan', 'Miskin')->sum('jumlah_anggota_kk');

        $jumlah_kk_menengah = $spots->where('kelas_kemiskinan', 'Menengah')->count();
        $jumlah_anggota_menengah = $spots->where('kelas_kemiskinan', 'Menengah')->sum('jumlah_anggota_kk');

        $jumlah_kk_kaya = $spots->where('kelas_kemiskinan', 'Kaya')->count();
        $jumlah_anggota_kaya = $spots->where('kelas_kemiskinan', 'Kaya')->sum('jumlah_anggota_kk');

        return response()->json([
            'jumlah_kk' => $jumlah_kk,
            'jumlah_anggota' => $jumlah_anggota,
            'jumlah_kk_miskin' => $jumlah_kk_miskin,
            'jumlah_anggota_miskin' => $jumlah_anggota_miskin,
            'jumlah_kk_menengah' => $jumlah_kk_menengah,
            'jumlah_anggota_menengah' => $jumlah_anggota_menengah,
            'jumlah_kk_kaya' => $jumlah_kk_kaya,
            'jumlah_anggota_kaya' => $jumlah_anggota_kaya,
        ]);
    }


    
}
