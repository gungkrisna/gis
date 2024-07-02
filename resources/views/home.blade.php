{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.dashboard-volt')

@section('content')
            <div class="moving-text-container">
                <h2 class="moving-text">Jl. Raya Ketewel, Kecamatan Sukawati, Kabupaten Gianyar. Email: desaketewel04@gmail.com. Telp: (0361)297474.</h2>
            </div>
            <div class="col-6 spaced-div">
                <!-- <h1>Dashboard</h1> -->
            </div>
<!-- Row start -->
<div class="container">
    <div class="d-flex justify-content-between align-items-center content-header">
        <p class="h2 mb-0">Hasil Kalkulasi Data</p> <!-- Adjust the size of the text using Bootstrap's text size classes -->
        <div class="form-group mb-0">
            <select name="centre_point_id" id="centre_point_id" class="form-control custom-select @error('centre_point_id') is-invalid @enderror">
                <option value="" id="no_filter">Seluruh Wilayah Ketewel</option>
                @foreach($centerPoints as $center)
                    <option value="{{ $center->id }}" data-coordinates="{{ $center->coordinates }}" {{ $center->coordinates == $centerPoint->coordinates ? 'selected' : '' }}>{{ $center->name }}</option>
                @endforeach
            </select>
            @error('centre_point_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row gx-3">
    <div class="col-xxl-3 col-sm-6 col-12">
        <div class="stats-tile">
            <div class="sale-icon shade-blue">
                <i class="bi bi-bar-chart-line-alt"></i> <!-- Unique icon name: bar-chart-line-alt -->
            </div>
            <div class="sale-details">
                <h3 class="text-blue" id="jumlah_kk">{{ $centerPoint->spots->count() }}</h3>
                <p id="jumlah_kk_text">Jumlah KK ({{ $centerPoint->spots->sum('jumlah_anggota_kk') }} Orang)</p>
            </div>
            <div class="sale-graph">
                <div id="sparklineLine1"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-sm-6 col-12">
        <div class="stats-tile">
            <div class="sale-icon shade-yellow">
                <i class="bi bi-emoji-laughing-beam"></i> <!-- Unique icon name: emoji-laughing-beam -->
            </div>
            <div class="sale-details">
                <h3 class="text-red" id="jumlah_kk_miskin">{{ $centerPoint->spots->where('kelas_kemiskinan', 'Miskin')->count() }}</h3>
                <p id="jumlah_kk_miskin_text">KK Miskin ({{ $centerPoint->spots->where('kelas_kemiskinan', 'Miskin')->sum('jumlah_anggota_kk') }} Orang)</p>
            </div>
            <div class="sale-graph">
                <div id="sparklineLine2"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-sm-6 col-12">
        <div class="stats-tile">
            <div class="sale-icon shade-red">
                <i class="bi bi-people-fill"></i> <!-- Unique icon name: people-fill -->
            </div>
            <div class="sale-details">
                <h3 class="text-yellow" id="jumlah_kk_menengah">{{ $centerPoint->spots->where('kelas_kemiskinan', 'Menengah')->count() }}</h3>
                <p id="jumlah_kk_menengah_text">KK Menengah ({{ $centerPoint->spots->where('kelas_kemiskinan', 'Menengah')->sum('jumlah_anggota_kk') }} Orang)</p>
            </div>
            <div class="sale-graph">
                <div id="sparklineLine3"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-sm-6 col-12">
        <div class="stats-tile">
            <div class="sale-icon shade-green">
                <i class="bi bi-briefcase-fill"></i> <!-- Unique icon name: briefcase-fill -->
            </div>
            <div class="sale-details">
                <h3 class="text-yellow" id="jumlah_kk_kaya">{{ $centerPoint->spots->where('kelas_kemiskinan', 'Kaya')->count() }}</h3>
                <p id="jumlah_kk_kaya_text">KK Kaya ({{$centerPoint->spots->where('kelas_kemiskinan', 'Kaya')->sum('jumlah_anggota_kk')}} Orang)</p>
            </div>
            <div class="sale-graph">
                <div id="sparklineLine4"></div>
            </div>
        </div>
    </div>
</div>

    <!-- <div class="row gx-3">
        <div class="col-sm-8 col-12">
            <div class="content-wrapper">
                <div class="map-container">
                    <div id="world-map-markers2" class="chart-height"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-12">
            <div class="content-wrapper">
                <div class="global-sales">
                    <h3><i class="bi bi-globe icon"></i>$2,75,000 <i class="bi bi-arrow-up-right text-primary"></i></h3>
                    <p>This dashboard unquestionably the largest visitors in the world with TWO million monthly active users and ONE million daily active.</p>
                </div>
            </div>
        </div>
    </div> -->
</div>
<br><br>
<h3>Batas Wilayah administratif Desa</h3>
<br>
<img src="images/sedang_1655186204_ketewel warna_page-0001.jpg" alt="" class="mx-auto d-block">
<br><br>
<div class="info-container">
        <h2>Informasi Desa Ketewel</h2>
        <br>
        <p>Secara geografis, Desa Ketewel terletak di bagian selatan Kabupaten Gianyar. Luas wilayahnya lebih kurang 6,75 km<sup>2</sup>, atau sekitar 1,83% luas Kabupaten Gianyar. Desa Ketewel berada pada posisi 8°38’26”S Lintang Selatan dan 115°17’43”E Bujur Timur.</p>
        <p>Secara topografi, Desa Ketewel, Kecamatan Sukawati, Kabupaten Gianyar merupakan daerah pesisir pantai yang mempunyai kemiringan 0,10% (relatif landai), dengan ketinggian kurang lebih antara 20 sampai 30 meter dari permukaan laut.</p>
        <p>Curah hujan relatif kering dengan batas wilayah administratif sebagai berikut:</p>
        <ul>
            <li>Sebelah Utara: Desa Guwang</li>
            <li>Sebelah Timur: Sungai Yeh Wos Teben</li>
            <li>Sebelah Selatan: Selat Badung</li>
            <li>Sebelah Barat: Desa Batubulan Kangin</li>
        </ul>
        <p>Penggunaan lahan di wilayah Desa Ketewel, sekarang dipilah sebagai berikut:</p>
        <ul>
            <li>Daerah pemukiman: 270 ha</li>
            <li>Tanah sawah: 247,2 ha</li>
            <li>Pertanian lahan kering: 0 ha</li>
            <li>Perkebunan/tegalan: 13,5 ha</li>
            <li>Hutan: 0 ha</li>
            <li>Perikanan dan peternakan: 0 ha</li>
            <li>Lain-lain (fasilitas umum, pura, setra, jalan, lapangan, dan sebagainya): 9,3 ha</li>
        </ul>
        <p>Secara administratif, Desa Ketewel terbagi atas 15 banjar dinas/dusun yang meliputi:</p>
        <ol>
            <li>Banjar Dinas Rangkan</li>
            <li>Banjar Dinas Tengah</li>
            <li>Banjar Dinas Puseh</li>
            <li>Banjar Dinas Pamesan</li>
            <li>Banjar Dinas Pasekan</li>
            <li>Banjar Dinas Kacagan</li>
            <li>Banjar Dinas Keden</li>
            <li>Banjar Dinas Kucupin</li>
            <li>Banjar Dinas Pabean</li>
            <li>Banjar Dinas Manyar</li>
            <li>Banjar Dinas Kubur</li>
            <li>Banjar Dinas Gumicik</li>
            <li>Banjar Dinas Luglug</li>
            <li>Banjar Dinas Jayakertha</li>
            <li>Banjar Dinas Akta</li>
        </ol>
        <p>Secara adat, wilayah Desa Ketewel dibagi menjadi tiga Desa Adat yaitu:</p>
        <ul>
            <li>Desa Adat Ketewel (terdiri dari sebelas banjar adat)</li>
            <li>Desa Adat Rangkan (terdiri dari satu banjar adat)</li>
            <li>Desa Adat Lembeng (terdiri dari tiga banjar adat)</li>
        </ul>
    </div>
    <img src="images/qgis map desa.png" alt="" class="mx-auto d-block">
@endsection

@push('javascript')
    <script>

    document.getElementById('centre_point_id').addEventListener('change', function() {
            var selectedId = this.value;

            var url = selectedId == '' ? '/fetch-dashboard-data' : `/fetch-dashboard-data/${selectedId}`;
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('jumlah_kk').innerText = data.jumlah_kk;
                    document.getElementById('jumlah_kk_text').innerText = `Jumlah KK (${data.jumlah_anggota} Orang)`;

                    document.getElementById('jumlah_kk_miskin').innerText = data.jumlah_kk_miskin;
                    document.getElementById('jumlah_kk_miskin_text').innerText = `KK Miskin (${data.jumlah_anggota_miskin} Orang)`;

                    document.getElementById('jumlah_kk_menengah').innerText = data.jumlah_kk_menengah;
                    document.getElementById('jumlah_kk_menengah_text').innerText = `KK Menengah (${data.jumlah_anggota_menengah} Orang)`;

                    document.getElementById('jumlah_kk_kaya').innerText = data.jumlah_kk_kaya;
                    document.getElementById('jumlah_kk_kaya_text').innerText = `KK Kaya (${data.jumlah_anggota_kaya} Orang)`;
                })
                .catch(error => console.error('Error fetching data:', error));
    }
    
);

    </script>
@endpush