<!-- views/spot/show_map.blade.php -->

@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Map of Spots</div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        var firstCoordinates = '{{ $spots->first()->coordinates }}'.split(',');
        var map = L.map('map').setView([firstCoordinates[0], firstCoordinates[1]], 15);

        var osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        });

        var stadiaDarkLayer = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
            maxZoom: 20,
        });

        var esriLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 17,
        });

        var baseLayers = {
            "OpenStreetMap": osmLayer,
            "StadiaDark": stadiaDarkLayer,
            "Esri": esriLayer
        };

        osmLayer.addTo(map); // Tambahkan layer OSM ke peta secara default

            // Tambahkan layer GeoJSON
        var geojsonLayer1 = L.geoJSON().addTo(map);
        var geojsonLayer2 = L.geoJSON().addTo(map);
        var geojsonLayer3 = L.geoJSON().addTo(map);
        var geojsonLayer4 = L.geoJSON().addTo(map);

        // Ambil data GeoJSON dari file
        Promise.all([
            fetch('/geojson/Ketewel.geojson').then(response => response.json()),
            fetch('/geojson/ClippedLine(Jalan).geojson').then(response => response.json()),
            fetch('/geojson/ClippedPoint(Titik).geojson').then(response => response.json()),
            fetch('/geojson/ClippedPoly(Bangunan).geojson').then(response => response.json())
        ])
        .then(data => {
            geojsonLayer1.addData(data[0]);
            geojsonLayer2.addData(data[1]);
            geojsonLayer3.addData(data[2]);
            geojsonLayer4.addData(data[3]);

            // Tambahkan kontrol layers setelah fetch selesai
            var overlays = {
                "GeoJSON 1": geojsonLayer1,
                "GeoJSON 2": geojsonLayer2,
                "GeoJSON 3": geojsonLayer3,
                "GeoJSON 4": geojsonLayer4
            };
            L.control.layers(baseLayers, overlays).addTo(map);
        });

        function createPopupContent(spot) {
            var imageUrl = spot.image_asset ? spot.image_asset : 'https://placehold.co/150x200?text=No+Image';
            return `
                <div>
                    <h3>${spot.name}</h3>
                    <p>${spot.description}</p>
                    ${imageUrl ? `<img src="${imageUrl}" alt="${spot.name}" class="img-fluid" width="700px" style="height: auto;">` : ''}
                </div>
            `;
        }

        @foreach ($spots as $spot)
            var coordinates = '{{ $spot->coordinates }}'.split(',');
            L.marker([coordinates[0], coordinates[1]]).addTo(map)
                .on('click', function() {
                    var popupContent = createPopupContent(@json($spot));
                    this.bindPopup(popupContent).openPopup();
                });
        @endforeach
    </script>
@endpush
