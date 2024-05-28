@extends('layout.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('mapel.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Program <span class="text-danger">*</span></label>
                            <select name="programId" id="defaultSelect" class="form-select @error('programId') is-invalid @enderror">
                                <option>Pilih Program</option>
                                @foreach ($programs as $program)
                                <option value="{{ $program['id'] }}" {{ old('programId') == $program['id'] ? 'selected' : '' }}>{{ $program['namaProgram'] }}</option>
                                @endforeach
                            </select>
                            @error('programId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Nama Mata Pelajaran <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="defaultFormControlInput" placeholder="Masukkan Nama Mata Pelajaran" value="{{ old('name') }}" />
                            @error('name')
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

@push('custom-script')
<script src="{{ asset('assets/js/form-basic-inputs.js') }}"></script>
@endpush