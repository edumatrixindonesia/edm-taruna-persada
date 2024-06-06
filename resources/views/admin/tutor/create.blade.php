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
                    <form action="{{ route('tutor.store') }}" method="post" enctype="multipart/form-data">
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
                            <label for="defaultFormControlInput" class="form-label">Foto <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="defaultFormControlInput" />
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Jenjang Pendidikan <span class="text-danger">*</span></label>
                            <select name="jenjang" id="defaultSelect" class="form-control jenjang @error('jenjang') is-invalid @enderror">
                                <option></option>
                                <option value="S1" {{ old('jenjang') == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('jenjang') == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('jenjang') == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('jenjang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Universitas <span class="text-danger">*</span></label>
                            <input type="text" name="university" class="form-control @error('university') is-invalid @enderror" id="defaultFormControlInput" placeholder="Contoh: Universitas Gajah Mada" value="{{ old('university') }}" />
                            @error('university')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Tema <span class="text-danger">*</span></label>
                            <input type="file" name="theme" class="form-control @error('theme') is-invalid @enderror" id="defaultFormControlInput" />
                            @error('theme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="defaultFormControlInput" placeholder="Masukkan Deskripsi Master Teacher" value="{{ old('description') }}" />
                            @error('description')
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
    $(".jenjang").select2({
        placeholder: 'Pilih Jenjang Pendidikan',
    });
</script>
@endpush