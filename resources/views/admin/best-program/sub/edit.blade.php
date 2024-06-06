@extends('admin.layout.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('akurasi.update', $akurasi['id']) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Sub Program <span class="text-danger">*</span></label>
                            <select class="form-select @error('sub') is-invalid @enderror" name="sub" id="">
                                <option value=""></option>
                                <option value="ALFA" {{ $akurasi['sub'] == 'ALFA' ? 'selected' : '' }}>ALFA</option>
                                <option value="BRAVO" {{ $akurasi['sub'] == 'BRAVO' ? 'selected' : '' }}>BRAVO</option>
                                <option value="DELTA" {{ $akurasi['sub'] == 'DELTA' ? 'selected' : '' }}>DELTA</option>
                            </select>
                            @error('sub')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Paket <span class="text-danger">*</span></label>
                            <input type="text" name="package" class="form-control @error('package') is-invalid @enderror" id="defaultFormControlInput" placeholder="Contoh: Private, Small Class" value="{{ $akurasi['package'] }}" />
                            @error('package')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Benefit</label>
                            <input type="file" name="benefit" class="form-control @error('benefit') is-invalid @enderror" id="defaultFormControlInput" />
                            @error('benefit')
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