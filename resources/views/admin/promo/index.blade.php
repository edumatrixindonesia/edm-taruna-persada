@extends('admin.layout.app')

@push('plugin-style')
<link rel="stylesheet" href="{{ asset('assets/libs/datatables-net-bs5/dataTables.bootstrap5.css') }}">
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <a class="btn btn-sm btn-primary mb-3" href="{{ route('promo.create') }}">Tambah</a>
            <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($promos as $key => $promo)
                        <tr>
                            <td>{{ (($key++) + 1) }}</td>
                            <td><img src="{{ asset('storage/'.$promo['image']) }}" width="50" alt=""></td>
                            <td>
                                <a class="btn btn-xs btn-warning text-white" href="{{ route('promo.edit', $promo['id']) }}">Edit</a>
                                <form action="{{ route('promo.destroy', $promo['id']) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
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