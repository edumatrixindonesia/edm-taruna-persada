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
                    <form action="{{ route('tutor.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Nama Master Teacher <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="defaultFormControlInput" placeholder="Masukkan Nama Master Teacher" value="{{ old('name') }}" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Tema <span class="text-danger">*</span></label>
                            <input type="text" name="theme" class="form-control @error('theme') is-invalid @enderror" id="defaultFormControlInput" placeholder="Masukkan Tema" value="{{ old('theme') }}" />
                            @error('theme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Mata Pelajaran <span class="text-danger">*</span></label>
                            <select name="mapel[]" id="defaultSelect" class="form-control mapel @error('mapel') is-invalid @enderror" multiple="multiple">
                                <option></option>
                                @foreach ($mapels as $mapel)
                                <option value="{{ $mapel['name'] }}" {{ old('mapel') == $mapel['name'] ? 'selected' : '' }}>{{ $mapel['name'] }}</option>
                                @endforeach
                            </select>
                            @error('mapel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Program <span class="text-danger">*</span></label>
                            <select name="program[]" id="program" class="form-control program @error('program') is-invalid @enderror" multiple="multiple">
                                <option></option>
                                @foreach ($programs as $program)
                                <option value="{{ $program['namaProgram'] }}" {{ old('program') == $program['namaProgram'] ? 'selected' : '' }}>{{ $program['namaProgram'] }}</option>
                                @endforeach
                            </select>
                            @error('program')
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
    $("#program").select2({
        allowClear: true,
        selectOnClose: true,
        placeholder: 'Pilih Program',
    });
    $(".mapel").select2({
        allowClear: true,
        selectOnClose: true,
        placeholder: 'Pilih Mata Pelajaran',
    });
</script>
@endpush