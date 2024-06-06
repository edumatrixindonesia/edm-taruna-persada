@extends('admin.layout.app')

@push('plugin-style')
<link rel="stylesheet" href="{{ asset('assets/libs/datatables-net-bs5/dataTables.bootstrap5.css') }}">
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <a class="btn btn-sm btn-primary mb-3" href="{{ route('program-regency.create') }}">Tambah</a>
            <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Program</th>
                            <th>Nama Kota</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($programs as $key => $program)
                        @foreach ($program['regencies'] as $regency)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $program['namaProgram']}}</td>
                            <td>{{ $regency['name'] }}</td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
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