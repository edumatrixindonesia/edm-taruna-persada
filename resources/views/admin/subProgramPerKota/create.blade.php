@extends('admin.layout.app')

@push('plugin-style')
<link href="{{ asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('sub-program-regency.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Sub Program <span class="text-danger">*</span></label>
                            <select name="subProgramId" id="defaultSelect" class="form-control sub-program @error('subProgramId') is-invalid @enderror">
                                <option></option>
                                @foreach ($programs as $program)
                                <option value="{{ $program['id'] }}" {{ old('subProgramId') == $program['id'] ? 'selected' : '' }}>{{ $program['subProgram'] }}</option>
                                @endforeach
                            </select>
                            @error('subProgramId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Kabupaten/Kota <span class="text-danger">*</span></label>
                            <select name="regencyId[]" id="defaultSelect" class="form-control kota @error('regencyId') is-invalid @enderror" multiple="multiple">
                                <option></option>
                                @foreach ($regencies as $regency)
                                <option value="{{ $regency['id'] }}" {{ old('regencyId') == $regency['id'] ? 'selected' : '' }}>{{ $regency['name'] }}</option>
                                @endforeach
                            </select>
                            @error('regencyId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-script')
<script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
@endpush

@push('custom-script')
<script>
    $(".sub-program").select2({
        placeholder: 'Pilih Program',
    });
    $(".kota").select2({
        allowClear: true,
        selectOnClose: true,
        placeholder: 'Pilih Kabupaten/Kota',
    });
</script>
@endpush