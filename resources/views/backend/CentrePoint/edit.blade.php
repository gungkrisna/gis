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
                        <p>Edit Map Desa</p>
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
                    <div class="card-header">Titik Koordinat</div>
                    <div class="card-body">
                        <form action="{{ route('centre-point.update',$centrePoint->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Nama Wilayah Banjar</label>
                                <input type="text" value="{{ $centrePoint->name }}" class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="">Koordinat</label>
                                <input type="text" value="{{ $centrePoint->coordinates }}"
                                class="form-control @error('coordinate') is-invalid
                                @enderror" name="coordinate" id="coordinate">
                                @error('coordinate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Latitude</label>
                                <input type="text" class="form-control" name="latitude" id="latitude" value="{{ $centrePoint->coordinates }}">
                            </div>
                            <div class="form-group">
                                <label for="">Longitude</label>
                                <input type="text" class="form-control" name="longitude" id="longitude" value="{{ $centrePoint->coordinates }}">
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
            center: [{{ $centrePoint->coordinates }}],
            zoom: 36,
            layers: [osm],
            fullscreenControl: {
                pseudoFullscreen: false
            }
        })

        var marker = L.marker([{{ $centrePoint->coordinates }}], {
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
