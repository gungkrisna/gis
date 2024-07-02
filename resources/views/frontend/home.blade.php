@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-search@3.0.9/dist/leaflet-search.src.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.css">
    <!-- <link rel="stylesheet" href="assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.css" /> -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
@endsection

@section('content')
    <div class="d-flex justify-content-end align-items-center">
        <a href="{{ route('spot.create') }}" class="btn btn-info btn-sm rounded-button">
            <i class="fas fa-user-plus me-1"></i> Tambah Penduduk
        </a>
        <a href="{{ route('centre-point.create') }}" class="btn btn-info btn-sm rounded-button"
            style="background-color: #dc3545; border-color: #dc3545;">
            <i class="fas fa-home me-1"></i> Tambah Banjar
        </a>
    </div>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Peta Penduduk Desa Ketewel</span>
                        <div class="d-flex gap-2">
                            <a onclick="locateUser()" class="btn btn-primary btn-sm">
                                <i class="fas fa-location-arrow"></i>
                            </a>
                            <div class="form-group">
                                <select name="centre_point_id" id="centre_point_id"
                                    class="form-control @error('centre_point_id') is-invalid @enderror"
                                    onchange="updateMapCenter(this)">
                                    <option value="">Pilih Wilayah Banjar</option>
                                    @foreach ($centerPoints as $center)
                                        <option value="{{ $center->id }}" data-coordinates="{{ $center->coordinates }}"
                                            {{ $center->coordinates == $centerPoint->coordinates ? 'selected' : '' }}>
                                            {{ $center->name }}</option>
                                    @endforeach
                                </select>
                                @error('centre_point_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="map" style="height: 87vh;"></div>
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
    <!-- <script src="assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script> -->
    <!-- Leaflet Routing Machine JS -->
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <!-- OSRM Leaflet JS -->
    <!-- <script src="https://unpkg.com/leaflet-routing-machine/dist/osrm.js"></script> -->
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
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
        var mapboxTiles = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11', // Contoh peta jalan, Anda dapat menggantinya dengan ID lain sesuai kebutuhan.
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'YOUR_MAPBOX_ACCESS_TOKEN' // Gantilah dengan access token Mapbox Anda.
            });

        var googleTiles = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });

        var thunderforestTiles = L.tileLayer(
            'https://{s}.tile.thunderforest.com/{variant}/{z}/{x}/{y}.png?apikey={apikey}', {
                attribution: 'Map data &copy; <a href="https://www.thunderforest.com/">Thunderforest</a>',
                maxZoom: 22,
                variant: 'landscape', // Contoh peta lanskap, Anda dapat menggantinya dengan jenis peta lain.
                apikey: 'YOUR_THUNDERFOREST_API_KEY' // Gantilah dengan API key Thunderforest Anda.
            });

        var openTopoMapTiles = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
            attribution: 'Map data &copy; <a href="https://www.opentopomap.org/">OpenTopoMap</a>',
        });

        var initialCenter = [
            {{ $targetSpot && $targetSpot->coordinates ? $targetSpot->coordinates : $centerPoint->coordinates ?? '-8.409518, 115.188919' }}
        ];
        var initialZoom = {{ $targetSpot && $targetSpot->coordinates ? 50 : 14.6 }}; // Use a higher zoom for targetSpot

        console.log('Initial Center:', JSON.stringify(initialCenter));
        console.log('Initial Zoom:', initialZoom);

        var map = L.map('map', {
            center: initialCenter,
            zoom: initialZoom,
            layers: [osm],
            fullscreenControl: {
                pseudoFullscreen: false
            }
        });

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
                var geojsonLayers = []; // Membuat array untuk menampung semua layer GeoJSON

                for (var i = 0; i < data.length; i++) {
                    var color;
                    // Tentukan warna berdasarkan indeks atau sesuai kebutuhan
                    switch (i) {
                        case 0:
                            color = 'blue';
                            break;
                        case 1:
                            color = 'red';
                            break;
                        case 2:
                            color = 'yellow';
                            break;
                        default:
                            color = 'black';
                    }

                    var geojsonLayer = L.geoJSON(data[i], {
                        style: function(feature) {
                            return {
                                color: color,
                                weight: 2
                            };
                        }
                    }).addTo(map);

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

        var controlSearch = new L.Control.Search({
            position: 'topleft',
            layer: markersLayer,
            zoom: 15,
            markerLocation: true
        })

        map.addControl(controlSearch)

        var markersLayer = new L.layerGroup()
        map.addLayer(markersLayer)

        var datas = [
            @foreach ($spot as $key => $value)
                {
                    "loc": [{{ $value->coordinates }}],
                    "title": '{!! $value->name !!}'
                },
            @endforeach
        ]

        for (i in datas) {
            var title = datas[i].title,
                loc = datas[i].loc,
                marker = new L.Marker(new L.latLng(loc), {
                    title: title
                })
            // markersLayer.addLayer(marker)


            @foreach ($spot as $item)
                var iconUrl;
                @switch($item->kelas_kemiskinan)
                    @case('Miskin')
                        iconUrl = '{{ asset('iconMarkers/miskin.png') }}';
                        @break
                    @case('Menengah')
                        iconUrl = '{{ asset('iconMarkers/menengah.png') }}';
                        @break
                    @case('Kaya')
                        iconUrl = '{{ asset('iconMarkers/kaya.png') }}';
                        @break
                    @default
                    iconUrl = '{{ asset('iconMarkers/marker.png') }}';
                @endswitch

                L.marker([{{ $item->coordinates }}], {
                    icon: L.icon({
                        iconUrl: iconUrl,
                        iconSize: [32, 32], // Adjust as needed
                        iconAnchor: [16, 32], // Adjust as needed
                        popupAnchor: [0, -32] // Adjust as needed
                    })
                })
                .bindPopup(
                    "<div class='my-2'><img src='{{ $item->getImageAsset() }}' class='img-fluid' width='700px'></div>" +
                    "<div class='my-2'><strong style='font-weight: bold;'>Nama Kepala Keluarga :</strong><br>{{ $item->name }}</div>" +
                    "<div class='my-2'><strong style='font-weight: bold;'>Description :</strong><br>{{ $item->description }}</div>" +
                    "<div class='my-2'><strong style='font-weight: bold;'>Wilayah Banjar :</strong><br>{{ optional($item->centrePoint)->name ?: 'Belum dipilih' }}</div>" +
                    "<div class='my-2'><strong style='font-weight: bold;'>Kontak WhatsApp :</strong><br>{{ $item->kontaknowa }}</div>" +
                    "<div class='my-2'><a href='https://wa.me/{{ $item->kontaknowa }}' class='btn btn-success btn-sm text-white' target='_blank'><i class='fab fa-whatsapp'></i> Go To Whatsapp</a></div>" +
                    "<div class='my-2'><a href='{{ route('detail-spot', $item->slug) }}' class='btn btn-info btn-sm text-white'><i class='fas fa-home'></i> Detail Rumah</a></div>" +
                    "<div class='my-2'><button onclick='return keSini(\"{{ $item->coordinates }}\")' class='btn btn-primary btn-sm'><i class='fas fa-directions'></i> Direction</button></div>"
                )
                .addTo(map);
            @endforeach
                }

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

                    L.marker(e.latlng).addTo(map)
                        .bindPopup("Anda berada pada radius sekitar " + radius + " meter dari titik ini").openPopup();

                    L.circle(e.latlng, radius).addTo(map);

                    var locateButton = document.querySelector('.btn-primary');
                    locateButton.innerHTML = '<i class="fas fa-location-arrow"></i>';
                });

                map.on('locationerror', function(e) {
                    alert(e.message);

                    var locateButton = document.querySelector('.btn-primary');
                    locateButton.innerHTML = '<i class="fas fa-location-arrow"></i>';
                });
                // const layerControl = L.control.layers(baseLayers).addTo(map)

                function keSini(coordinates) {
            var latLng = coordinates.split(',').map(parseFloat);

            if (map._routingControl) {
                map.removeControl(map._routingControl);
            }

            map.locate({
                setView: false,
                maxZoom: 16,
                timeout: 30000,
                enableHighAccuracy: true,
                maximumAge: 60000
            });

            map.once('locationfound', function(e) {
                var control = L.Routing.control({
                    waypoints: [
                        e.latlng,
                        L.latLng(latLng[0], latLng[1])
                    ],
                    routeWhileDragging: false,
                    addWaypoints: false, // Menonaktifkan penambahan waypoint baru
                    draggableWaypoints: false, // Menonaktifkan penggeseran waypoint yang ada
                    createMarker: function(i, waypoint, n) {
                        return L.marker(waypoint.latLng, {
                            draggable: false // Menonaktifkan draggable untuk semua pin
                        });
                    }
                }).addTo(map);

                map._routingControl = control;

                // Menambahkan tombol close direction
                var closeButton = L.control({position: 'topright'});
                closeButton.onAdd = function(map) {
                    var div = L.DomUtil.create('div', 'leaflet-bar leaflet-control leaflet-control-custom');
                    div.innerHTML = '<button type="button">Close Directions</button>';
                    div.style.backgroundColor = 'white';
                    div.style.padding = '5px';
                    div.style.cursor = 'pointer';

                    L.DomEvent.on(div, 'click', function() {
                        if (map._routingControl) {
                            map.removeControl(map._routingControl);
                            delete map._routingControl;
                            map.removeControl(closeButton); // Menghapus tombol close
                        }
                    });

                    return div;
                };
                closeButton.addTo(map);
            });

            map.once('locationerror', function(e) {
                alert("Unable to determine your location: " + e.message);
            });
        }
    </script>
@endpush
