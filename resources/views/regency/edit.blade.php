@extends('layout.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('regency.update', $regency['id']) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Nama Provinsi <span class="text-danger">*</span></label>
                            <select name="provinceId" id="defaultSelect" class="form-select @error('provinceId') is-invalid @enderror">
                                <option></option>
                                @foreach ($provinces as $province)
                                <option value="{{ $province['id'] }}" {{ $regency['provinceId'] == $province['id'] ? 'selected' : '' }}>{{ $province['name'] }}</option>
                                @endforeach
                            </select>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Nama Kabupaten/Kota <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="defaultFormControlInput" placeholder="Masukkan Nama Mata Pelajaran" value="{{ $regency['name'] }}" />
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