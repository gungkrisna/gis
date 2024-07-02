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
                        <span>List Penduduk Desa</span>
                        <a href="{{ route('spot.create') }}" class="btn btn-info btn-sm rounded-button">
                            <i class="fas fa-user-plus me-1"></i> Tambah Penduduk
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
                            <table class="table" id="dataSpot">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas Penghasilan</th>
                                        <th>Nama Kepala Rumah Tangga</th>
                                        <th>Jumlah Anggota KK</th>
                                        <th>Kontak (No WhatsApp)</th>
                                        <th>Subwilayah</th>
                                        <th>Koordinat</th>
                                        <th>Created By</th>
                                        <th>Updated By</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
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
            $('#dataSpot').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                lengthChange: true,
                autoWidth: false,
                ajax: `{{ route('spot.data') }}`,
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'kelas_kemiskinan' },
                    { data: 'name' },
                    { data: 'jumlah_anggota_kk' },
                    { data: 'kontaknowa',
                    render: function(data) {
                        return '<a href="https://wa.me/' + data + '" target="_blank">' + data + '</a>';
                    }
                    },
                    { data: 'centrepoint' },
                    { data: 'coordinates' },
                    { data: 'created_by' },
                    { data: 'updated_by' },
                    { 
                        data: 'created_at',
                        render: function(data) {
                            return moment(data).format('YYYY-MM-DD HH:mm:ss');
                        }
                    },
                    { 
                        data: 'updated_at',
                        render: function(data) {
                            return moment(data).format('YYYY-MM-DD HH:mm:ss');
                        }
                    },
                    { data: 'action', orderable: false, searchable: false }
                ],
                order: [
                    [2, 'asc'] // Mengurutkan berdasarkan nama (kolom index 2) secara ascending (A-Z)
                ],
                columnDefs: [
                    { targets: [0, 7, 8], className: 'text-center' } // Untuk mengatur class pada kolom tertentu
                ]
            });
        });
    </script>
@endpush
