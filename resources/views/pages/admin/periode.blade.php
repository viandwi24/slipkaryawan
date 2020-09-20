@extends('layouts.admin', ['title' => "Pilih Periode"])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-user mr-2"></i>
                            Periode
                        </h3>
                        <span class="card-right-button">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a href="{{ route('admin.periode.create') }}" class="dropdown-item">
                                        <i class="fa fa-plus mr-2"></i> New
                                    </a>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <th width="6%">#</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Action</th>
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
                exportExcel () {
                    this.$refs.formExport.submit()
                },
                openFile () {
                    this.$refs.file.click()
                },
                fileOnChange () {
                    this.$refs.form.submit()
                }
            }
        });
        $('#table').DataTable({
            ajax: "{{ route('admin.slip-gaji') }}?ajax=periode",
            processing: true,
            serverSide: true,
            // responsive: true,
            order: [[0, 'asc']],
            columnDefs: [ { orderable: false, targets: [3] }, ],
            columns: [
                { render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1 },
                { data: 'mulai' },
                { data: 'selesai' },
                {
                    data: null,
                    render: function ( data, type, row ) {
                        // <a href="{{ url('admin/periode') . '/' }}`+data.id+`/edit" class="btn btn-sm btn-icon text-white btn-warning"><i class="fa fa-edit"></i></a>
                        return `
                        <div class="btn-group mb-3" role="group">
                            <a href="{{ url()->route('admin.slip-gaji') }}?periode=`+data.id+`" class="btn btn-sm btn-icon text-white btn-primary">Slip Gaji</a>
                            <form method="post" action="{{ url('admin/periode') . '/' }}`+data.id+`">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-icon text-white btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                        `;
                    }
                }
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