@extends('layouts.admin', ['title' => "Slip Gaji"])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-user mr-2"></i>
                            Master Data Slip Gaji
                        </h3>

                        <span class="card-right-button">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a href="#" @click.prevent="addModal" class="dropdown-item">
                                        <i class="fa fa-plus mr-2"></i> New
                                    </a>
                                    <a href="#" @click.prevent="addModal" class="dropdown-item">
                                        <i class="fa fa-file-excel mr-2"></i> Import Excel
                                    </a>
                                    <a href="#" @click.prevent="addModal" class="dropdown-item">
                                        <i class="fa fa-trash mr-2"></i> Delete All
                                    </a>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-hover table-responsive">
                            <thead>
                                <th width="6%">#</th>
                                <th>nama</th>
                                <th>bagian</th>
                                <th>outsourcing</th>
                                <th>hari_gaji_pokok</th>
                                <th>hari_diliburkan</th>
                                <th>hari_borongan</th>
                                <th>hari_gp7</th>
                                <th>lembur_1</th>
                                <th>lembur_2</th>
                                <th>lembur_3</th>
                                <th>sub_kerja</th>
                                <th>sub_lembur</th>
                                <th>bpjs</th>
                                <th>total</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>
        const vm = new Vue({
            el: '#app',
            data: {
            },
            methods: {
            }
        });
        $('#table').DataTable({
            ajax: "{{ route('admin.slip-gaji') }}",
            processing: true,
            serverSide: true,
            // responsive: true,
            order: [[0, 'asc']],
            columnDefs: [ { orderable: false, targets: [3] }, ],
            columns: [
                { render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1 },
                { data: 'nama' },
                { data: 'bagian' },
                { data: 'outsourcing' },
                { data: 'hari_gaji_pokok' },
                { data: 'hari_diliburkan' },
                { data: 'hari_borongan' },
                { data: 'hari_gp7' },
                { data: 'lembur_1' },
                { data: 'lembur_2' },
                { data: 'lembur_3' },
                { data: 'sub_kerja' },
                { data: 'sub_lembur' },
                { data: 'bpjs' },
                { data: 'total' }
            ]
        });
    </script>    
@endpush

@push('css-lib')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@push('js-lib')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
@endpush