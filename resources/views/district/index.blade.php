@extends('layout.app')

@push('plugin-style')
<link rel="stylesheet" href="{{ asset('assets/libs/datatables-net-bs5/dataTables.bootstrap5.css') }}">
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <button class="btn btn-sm btn-success mb-3" data-bs-toggle="modal" data-bs-target="#import">Import</button>
            <a class="btn btn-sm btn-primary mb-3" href="{{ route('district.create') }}">Tambah</a>
            <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kabupaten / Kota</th>
                            <th>Kecamatan</th>
                            <th>Slug</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($districts as $key => $district)
                        <tr>
                            <td>{{ (($key++) + 1) }}</td>
                            <td>{{ $district['regency']['name'] }}</td>
                            <td>{{ $district['name'] }}</td>
                            <td>{{ $district['slug'] }}</td>
                            <td>
                                <a href="{{ route('district.edit', $district['id']) }}" class="btn btn-xs btn-warning text-white">Edit</a>
                                <form action="{{ route('district.destroy', $district['id']) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-xs btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                <form method="POST" action="{{ route('district.importExcel') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Import Excel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <input type="file" name="file" id="nameBasic" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-script')
<script src="{{ asset('assets/libs/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/libs/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-script')
<script>
    $('#dataTableExample').DataTable({
        "aLengthMenu": [
            [10, 30, 50, -1],
            [10, 30, 50, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
            search: ""
        }
    });
    $('#dataTableExample').each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.removeClass('form-control-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.removeClass('form-control-sm');
    });
</script>
@endpush