<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CentrePoint;
use App\Models\Spot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spots = Spot::all(); // Mengambil semua data Spot dari model
    
        return view('backend.Spot.index', compact('spots'));
    }    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centerPoints = CentrePoint::all(); 
        return view('backend.Spot.create', ['centerPoints' => $centerPoints]);
    }

    public function showDetail($id)
    {
        // Ambil data spot berdasarkan ID
        $spot = Spot::findOrFail($id);

        // Ambil semua data centre points
        $centrePoints = CentrePoint::all();

        // Kirim data ke view
        return view('backend.Spot.detail', compact('spot', 'centrePoints'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
  
    
        // Validasi input
        $this->validate($request, [
            'coordinate' => 'required',
            'name' => 'required',
            'jumlah_anggota_kk' => 'required',
            'kelas_kemiskinan' => 'required|in:Miskin,Menengah,Kaya',
            'kontaknowa' => 'required',
            'description' => 'required',
            'image' => 'file|image|mimes:png,jpg,jpeg',
            'centre_point_id' => 'required|exists:centre_points,id'
        ]);
    
        // Buat instance Spot baru
        $spot = new Spot;
    
        // Proses upload file image jika ada
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadFile = $file->hashName();
            $file->move(public_path('upload/spots/'), $uploadFile);
            $spot->image = $uploadFile;
        }
    
        // Set data ke instance Spot
        $spot->name = $request->input('name');
        $spot->slug = Str::slug($request->input('name'), '-');
        $spot->jumlah_anggota_kk = $request->input('jumlah_anggota_kk');
        $spot->kelas_kemiskinan = $request->input('kelas_kemiskinan');
        $spot->kontaknowa = $request->input('kontaknowa');
        $spot->description = $request->input('description');
        $spot->coordinates = $request->input('coordinate');
        $spot->centre_point_id = $request->input('centre_point_id');
        $spot->created_by = auth()->id();
    
        // Simpan data ke database
        $spot->save();
    
        // Redirect dengan pesan sukses atau gagal
        if ($spot) {
            return redirect()->route('spot.index')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->route('spot.index')->with('error', 'Data gagal disimpan');
        }
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
    public function edit(Spot $spot)
    {
        $centerPoints = CentrePoint::all(); 
        return view('backend.Spot.edit', [
            'centerPoints' => $centerPoints,
            'spot' => $spot
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spot $spot)
    {
        $this->validate($request, [
            'coordinate' => 'required',
            'name' => 'required',
            'jumlah_anggota_kk' => 'required',
            'kelas_kemiskinan' => 'required|in:Miskin,Menengah,Kaya',
            'kontaknowa' => 'required',
            'description' => 'required',
            'image' => 'file|image|mimes:png,jpg,jpeg',
            'centre_point_id' => 'required|exists:centre_points,id'
        ]);

        if ($request->hasFile('image')) {

            /**
             * Hapus file image pada folder public/upload/spots
             */
            if (File::exists('upload/spots/' . $spot->image)) {
                File::delete('upload/spots/' . $spot->image);
            }

            /**
             * Proses upload file image ke folder public/upload/spots
             */
            $file = $request->file('image');
            $uploadFile = $file->hashName();
            $file->move('upload/spots/', $uploadFile);
            $spot->image = $uploadFile;

            /**
             * Proses hapus & upload file image ke folder public/upload/spots
             */
            // Storage::disk('local')->delete('public/ImageSpots/' . ($spot->image));
            // $file = $request->file('image');
            // $file->storeAs('public/ImageSpots', $file->hashName());
            // $spot->image = $file->hashName();
        }

        $spot->name = $request->input('name');
        $spot->slug = Str::slug($request->name, '-');
        $spot->jumlah_anggota_kk = $request->input('jumlah_anggota_kk');
        $spot->kelas_kemiskinan = $request->input('kelas_kemiskinan');
        $spot->kontaknowa = $request->input('kontaknowa');
        $spot->description = $request->input('description');
        $spot->coordinates = $request->input('coordinate');
        $spot->centre_point_id = $request->input('centre_point_id'); 
        
        $spot->updated_by = auth()->id();
        $spot->update();

        if ($spot) {
            return to_route('spot.index')->with('success', 'Data berhasil diupdate');
        } else {
            return to_route('spot.index')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $spot = Spot::findOrFail($id);
        if (File::exists('upload/spots/' . $spot->image)) {
            File::delete('upload/spots/' . $spot->image);
        }

        //Storage::disk('local')->delete('public/ImageSpots/' . ($spot->image));
        
        $spot->delete();
        return redirect()->back();
    }

    public function showMap()
    {
        $spots = Spot::all(); // Ambil semua data spot dari database
        // dd($spots);
        return view('backend.Spot.show_map', compact('spots'));
    }

    public function customStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'coordinates' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        Spot::create($validated);

        return redirect()->route('spots.index');
    }
    
}
