@extends('layout.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('district.update', $district['id']) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Nama Kabupaten/Kota <span class="text-danger">*</span></label>
                            <select name="regencyId" id="defaultSelect" class="form-select @error('regencyId') is-invalid @enderror">
                                <option>Pilih Kabupaten/Kota</option>
                                @foreach ($regencies as $regency)
                                <option value="{{ $regency['id'] }}" {{ $district['regencyId'] == $regency['id'] ? 'selected' : '' }}>{{ $regency['name'] }}</option>
                                @endforeach
                            </select>
                            @error('regencyId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Nama Kecamatan <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="defaultFormControlInput" placeholder="Masukkan Nama Kecamatan" value="{{ $district['name'] }}" />
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