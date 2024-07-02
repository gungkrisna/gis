@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <style>
        #map {
            height: 400px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between  align-items-center ">
                        <p>Update Rumah - {{ $spot->name }}</p>
                        <a onclick="locateUser()" class="btn btn-primary btn-sm">
                            <i class="fas fa-location-arrow"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Update Rumah - {{ $spot->name }}</div>
                    <div class="card-body">
                        <form action="{{ route('spot.update',$spot->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="centre_point_id">Sub Wilayah Banjar</label>
                                <select name="centre_point_id" id="centre_point_id" class="form-control @error('centre_point_id') is-invalid @enderror" onchange="updateMapCenter(this);">
                                    <option value="">Pilih Centre Point</option>
                                     @foreach($centerPoints as $center)
                                        <option value="{{ $center->id }}" data-coordinates="{{ $center->coordinates }}" {{ $center->id == $spot->centre_point_id ? 'selected' : '' }}>{{ $center->name }}</option>
                                    @endforeach
                                </select>
                                @error('centre_point_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group my-3">
                                <label for="">Koordinat</label>
                                <input type="text" class="form-control @error('coordinate')
                                    is-invalid
                                @enderror" name="coordinate" id="coordinate" value="{{ $spot->coordinates }}">
                                @error('coordinate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group my-3">
                                <label for="">Nama Kepala Keluarga</label>
                                <input type="text" class="form-control @error('name')
                                    is-invalid
                                @enderror" name="name" value="{{ $spot->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group my-3">
                                <label for="">Jumlah Anggota Keluarga</label>
                                <input type="number" class="form-control @error('jumlah_anggota_kk')
                                    is-invalid
                                @enderror" name="jumlah_anggota_kk" value="{{ $spot->jumlah_anggota_kk }}">
                                @error('jumlah_anggota_kk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group my-3">
                                <label for="">Upload Gambar</label>
                                <img src="{{ $spot->getImageAsset() }}" alt="">
                                <input type="file" class="form-control @error('image')
                                    is-invalid
                                @enderror" name="image" >
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group my-3">
                                <div class="form-group">
                                    <label for="kelas_kemiskinan">Kelas Kemiskinan</label>
                                    <select name="kelas_kemiskinan" id="kelas_kemiskinan" class="form-control @error('kelas_kemiskinan') is-invalid @enderror"">
                                        <option value="">Pilih Kelas Kemiskinan</option>
                                        <option {{ $spot->kelas_kemiskinan == 'Miskin' ? 'selected' : '' }} value="Miskin">Miskin</option>
                                        <option {{ $spot->kelas_kemiskinan == 'Menengah' ? 'selected' : '' }} value="Menengah">Menengah</option>
                                        <option {{ $spot->kelas_kemiskinan == 'Kaya' ? 'selected' : '' }} value="Kaya">Kaya</option>
                                    </select>
                                    @error('kelas_kemiskinan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group my-3">
                                <label for="kontaknowa">Kontak WhatsApp</label>
                                <input type="text" name="kontaknowa" id="kontaknowa" class="form-control @error('kontaknowa') is-invalid @enderror" value="{{ old('kontaknowa', $spot->kontaknowa) }}">
                                @error('kontaknowa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group my-3">
                                <label for="">Deskripsi</label>
                                <textarea name="description" id="" class="form-control @error('description')
                                    is-invalid
                                @enderror" cols="30" rows="10">{{ $spot->description }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm my-2">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('javascript')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script>
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        var Stadia_Dark = L.tileLayer(
            'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
                maxZoom: 20,
                attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
            });

        var Esri_WorldStreetMap = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
            });

        var map = L.map('map', {
            center: [{{ $spot->centrePoint->coordinates ?? '-8.632533735952645,115.28486251831056' }}],
            zoom: 15,
            layers: [osm]
        })


        var marker = L.marker([{{ $spot->coordinates ?? '-8.632533735952645,115.28486251831056' }}], {
            draggable: true
        }).addTo(map);

        var baseMaps = {
            'Open Street Map': osm,
            'Esri World': Esri_WorldStreetMap,
            'Stadia Dark': Stadia_Dark
        }

        L.control.layers(baseMaps).addTo(map)

        // CARA PERTAMA
        function onMapClick(e) {
            var coords = document.querySelector("[name=coordinate]")
            var latitude = document.querySelector("[name=latitude]")
            var longitude = document.querySelector("[name=longitude]")
            var lat = e.latlng.lat
            var lng = e.latlng.lng

            if (!marker) {
                marker = L.marker(e.latlng).addTo(map)
            } else {
                marker.setLatLng(e.latlng)
            }

            coords.value = lat + "," + lng
            latitude.value = lat,
                longitude.value = lng
        }
        map.on('click', onMapClick)
        // CARA PERTAMA

        // CARA KEDUA
        marker.on('dragend', function() {
            var coordinate = marker.getLatLng();
            marker.setLatLng(coordinate, {
                draggable: true
            })
            $('#coordinate').val(coordinate.lat + "," + coordinate.lng).keyup()
            $('#latitude').val(coordinate.lat).keyup()
            $('#longitude').val(coordinate.lng).keyup()
        })
        // CARA KEDUA

        function updateMapCenter(selectElement) {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var coordinates = selectedOption.getAttribute('data-coordinates');
            
            if (coordinates) {
                var [lat, lng] = coordinates.split(',').map(parseFloat);
                map.setView([lat, lng], 15);
            }
        }

    function locateUser() {
        var locateButton = document.querySelector('.btn-primary');
        locateButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

        map.locate({
            setView: true,
            maxZoom: 16,
            timeout: 30000,  
            enableHighAccuracy: true,  
            maximumAge: 60000  
        });
    }

    map.on('locationfound', function(e) {
        var radius = e.accuracy / 2;

        var coordinate = e.latlng;
        marker.setLatLng(e.latlng, {
            draggable: true
        })
        $('#coordinate').val(coordinate.lat + "," + coordinate.lng).keyup()
        $('#latitude').val(coordinate.lat).keyup()
        $('#longitude').val(coordinate.lng).keyup()

        var locateButton = document.querySelector('.btn-primary');
        locateButton.innerHTML = '<i class="fas fa-location-arrow"></i>';
    });

    map.on('locationerror', function(e) {
        alert(e.message);

        var locateButton = document.querySelector('.btn-primary');
        locateButton.innerHTML = '<i class="fas fa-location-arrow"></i>';
    });
    </script>
@endpush
