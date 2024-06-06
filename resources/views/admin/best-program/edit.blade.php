@extends('admin.layout.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('best-program.update', $program['id']) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Nama Program <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="defaultFormControlInput" placeholder="Masukkan Nama Program" value="{{ $program['name'] }}" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Deskripsi Program <span class="text-danger">*</span></label>
                            <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" rows="10" id="defaultFormControlInput" placeholder="Masukkan Deskripsi Program">{{ $program['description'] }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Background</label>
                            <input type="file" name="background" class="form-control @error('background') is-invalid @enderror" id="defaultFormControlInput" />
                            @error('background')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="defaultFormControlInput" />
                            @error('image')
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
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Icon</label>
                            <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" id="defaultFormControlInput" />
                            @error('icon')
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