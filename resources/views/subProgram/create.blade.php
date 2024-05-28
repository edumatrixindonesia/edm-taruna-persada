@extends('layout.app')

@push('plugin-style')
<link href="{{ asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('sub-program.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Program <span class="text-danger">*</span></label>
                            <select name="programId" id="defaultSelect" class="form-control program @error('programId') is-invalid @enderror">
                                <option></option>
                                @foreach ($programs as $program)
                                <option value="{{ $program['id'] }}" {{ old('programId') == $program['id'] ? 'selected' : '' }}>{{ $program['namaProgram'] }}</option>
                                @endforeach
                            </select>
                            @error('subProgram')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Nama Sub Program <span class="text-danger">*</span></label>
                            <input type="text" name="subProgram" class="form-control @error('subProgram') is-invalid @enderror" id="defaultFormControlInput" placeholder="Masukkan Nama Mata Pelajaran" value="{{ old('subProgram') }}" />
                            @error('subProgram')
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
    $(".program").select2({
        placeholder: 'Pilih Program',
    });
</script>
@endpush