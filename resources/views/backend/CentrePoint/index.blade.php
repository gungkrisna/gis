@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Daftar Wilayah Banjar</span>
                        <a href="{{ route('centre-point.create') }}" class="btn btn-info btn-sm rounded-button" style="background-color: #dc3545; border-color: #dc3545;">
                            <i class="fas fa-home me-1"></i> Tambah Banjar
                        </a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table" id="dataCenterPoint">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Wilayah Banjar</th>
                                        <th>Jumlah KK</th>
                                        <th>Jumlah Penduduk</th>
                                        <th>Titik Koordinat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                        <form action="" method="POST" id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Hapus" style="display:none">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(function() {
        $('#dataCenterPoint').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            ajax: `{{ route('centre-point.data') }}`,
            columns: [
                {
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                }, 
                {
                    data: 'name'
                },
                {
                    data: 'spot_count'
                },
                {
                    data: 'jumlah_anggota_kk'
                },
                {
                    data: 'coordinates'
                },
                {
                    data: 'action'
                }
            ]
        })
    })
</script>
@endpush