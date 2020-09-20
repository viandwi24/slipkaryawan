@extends('layouts.admin', ['title' => "Slip Gaji"])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-user mr-2"></i>
                            Master Data Slip Gaji [Periode {{ $periode->mulai->format('d/m/Y') }} - {{ $periode->selesai->format('d/m/Y') }}]
                        </h3>
                        <form ref="form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="action" value="import">
                            <input name="file" type="file" ref="file" @change="fileOnChange" style="display: none;">
                        </form>
                        <span class="card-right-button">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a href="#" @click.prevent="addModal" class="dropdown-item">
                                        <i class="fa fa-plus mr-2"></i> New
                                    </a>
                                    <a href="#" @click.prevent="openFile" class="dropdown-item">
                                        <i class="fa fa-file-excel mr-2"></i> Import Excel
                                    </a>
                                    <form ref="formExport" method="POST">
                                        @csrf
                                        <input type="hidden" name="action" value="export">
                                    </form>
                                    <a href="#" @click.prevent="exportExcel" class="dropdown-item">
                                        <i class="fa fa-file-excel mr-2"></i> Export Excel
                                    </a>
                                    <form ref="formDestroy" action="{{ route('admin.slip-gaji.destroy') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a href="#" @click.prevent="$refs.formDestroy.submit()" class="dropdown-item">
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
                                <th>Uid</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Bagian</th>
                                <th>Outsourcing</th>
                                <th>Hari Gaji Pokok</th>
                                <th>Hari Diliburkan</th>
                                <th>Hari Borongan</th>
                                <th>Hari Gp7</th>
                                <th>Lembur 1</th>
                                <th>Lembur 2</th>
                                <th>Lembur 3</th>
                                <th>Sub Kerja</th>
                                <th>Sub Lembur</th>
                                <th>Bpjs</th>
                                <th>Total</th>
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
            ajax: "{{ route('admin.slip-gaji') }}?periode={{ $periode->id }}",
            processing: true,
            serverSide: true,
            // responsive: true,
            order: [[0, 'asc']],
            columnDefs: [ { orderable: false, targets: [3] }, ],
            columns: [
                { render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1 },
                { data: 'uid' },
                { data: 'nama' },
                { data: 'tanggal_lahir' },
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