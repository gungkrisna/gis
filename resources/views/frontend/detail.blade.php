@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.css">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .leaflet-container {
            height: 400px;
            width: 600px;
            max-width: 100%;
            max-height: 100%;
        }
        .info-section {
            padding: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: -1px; /* Menimpa margin bawah dan border */
        }
        .info-section h5 {
            margin-bottom: 0.5rem; /* Jarak antara judul dan isi */
            font-size: 1.2rem; /* Ukuran teks judul */
        }
        .info-section p {
            margin-top: 0.5rem; /* Jarak antara isi dan judul berikutnya */
            font-size: 1rem; /* Ukuran teks isi */
        }
        .info-section:last-child {
            margin-bottom: 0; /* Tidak ada margin bawah untuk elemen terakhir */
        }
    </style>
@endsection

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Map Spot</div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Informasi Rumah : {{ $spot->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="info-section">
                                <h5><i class="fas fa-image"></i> <strong>Foto Rumah</strong></h5>
                                <img class="img-fluid" width="200" src="{{ $spot->getImageAsset() }}" alt="">
                            </div>

                            <div class="info-section">
                                <h5><i class="fas fa-user"></i> <strong>Nama Kepala Rumah Tangga:</strong></h5>
                                <p>{{ $spot->name }}</p>
                            </div>

                            <div class="info-section">
                                <h5><i class="fas fa-map-marker-alt"></i> <strong>Wilayah Banjar:</strong></h5>
                                <span id="centre_point_name_display">
                                    {{ $spot->centrePoint ? $spot->centrePoint->name : 'Belum dipilih' }}
                                </span>
                            </div>

                            <div class="info-section">
                                <h5><i class="fas fa-users"></i> <strong>Jumlah Anggota KK:</strong></h5>
                                <p>{{ $spot->jumlah_anggota_kk }}</p>
                            </div>

                            <div class="info-section">
                                <h5><i class="fas fa-money-bill-wave"></i> <strong>Kelas Penghasilan:</strong></h5>
                                <p>{{ $spot->kelas_kemiskinan }}</p>
                            </div>

                            <div class="info-section">
                                <h5><i class="fab fa-whatsapp"></i> <strong>Kontak (No WhatsApp):</strong></h5>
                                <p>{{ $spot->kontaknowa }}</p>
                                <a href="https://wa.me/{{ $spot->kontaknowa }}" target="_blank">
                                    <button id="toggleWhatsApp" class="btn btn-success btn-sm mt-2 text-white">
                                        <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
                                    </button>
                                </a>
                            </div>

                            <div class="info-section">
                                <h5><i class="fas fa-file-alt"></i> <strong>Detail Description:</strong></h5>
                                <p>{{ $spot->description }}</p>
                            </div>

                            <div class="info-section">
                                <h5><i class="fas fa-map-pin"></i> <strong>Titik Koordinat:</strong></h5>
                                <p>{{ $spot->coordinates }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script src="https://cdn.jsdelivr.net/npm/leaflet-search@3.0.9/dist/leaflet-search.src.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.js"></script>

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

    // Tambahkan layer tile baru
    var mapboxTiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11', // Contoh peta jalan, Anda dapat menggantinya dengan ID lain sesuai kebutuhan.
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'YOUR_MAPBOX_ACCESS_TOKEN' // Gantilah dengan access token Mapbox Anda.
    });

    var googleTiles = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    });

    var thunderforestTiles = L.tileLayer('https://{s}.tile.thunderforest.com/{variant}/{z}/{x}/{y}.png?apikey={apikey}', {
        attribution: 'Map data &copy; <a href="https://www.thunderforest.com/">Thunderforest</a>',
        maxZoom: 22,
        variant: 'landscape', // Contoh peta lanskap, Anda dapat menggantinya dengan jenis peta lain.
        apikey: 'YOUR_THUNDERFOREST_API_KEY' // Gantilah dengan API key Thunderforest Anda.
    });

    var openTopoMapTiles = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
        maxZoom: 17,
        attribution: 'Map data &copy; <a href="https://www.opentopomap.org/">OpenTopoMap</a>',
    });

    var map = L.map('map', {
        center: [{{ $spot->coordinates }}],
        zoom: 36,
        layers: [osm],
        fullscreenControl: {
            pseudoFullscreen: false
        }
    })

    const baseLayers = {
        'Openstreetmap': osm,
        'StadiaDark': Stadia_Dark,
        'Esri': Esri_WorldStreetMap,
        'Google Maps': googleTiles,
        'OpenTopoMap': openTopoMapTiles,
        'Thunderforest': thunderforestTiles,
        'Mapbox': mapboxTiles
    }

    // Tambahkan layer GeoJSON
    var geojsonLayers = []; // Membuat array untuk menampung semua layer GeoJSON

    Promise.all([
        fetch('/geojson/Ketewel.geojson').then(response => response.json()),
        fetch('/geojson/ClippedLine(Jalan).geojson').then(response => response.json()),
        fetch('/geojson/ClippedPoly(Bangunan).geojson').then(response => response.json())
    ])
    .then(data => {
        for (var i = 0; i < data.length; i++) {
            var geojsonLayer = L.geoJSON(data[i]).addTo(map);
            geojsonLayers.push(geojsonLayer); // Tambahkan layer ke dalam array
        }

        // Tambahkan kontrol layers setelah fetch selesai
        var overlays = {
            "Batas Desa": geojsonLayers[0],
            "Jalan": geojsonLayers[1],
            "Bangunan": geojsonLayers[2]
        };
        L.control.layers(baseLayers, overlays).addTo(map);
    });
        var curLocation = [{{ $spot->coordinates }}] 

        var marker = new L.marker(curLocation,{
            draggable:false
        })
        map.addLayer(marker)
        
    </script>
@endpush
