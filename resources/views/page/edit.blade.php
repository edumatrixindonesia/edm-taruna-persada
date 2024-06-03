@extends('layout.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('page.update', $page['id']) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Nama Section <span class="text-danger">*</span></label>
                            <input type="text" name="namaSection" class="form-control @error('namaSection') is-invalid @enderror" id="defaultFormControlInput" placeholder="Masukkan Nama Section" value="{{ $page['namaSection'] }}" readonly />
                            @error('namaSection')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="defaultFormControlInput" placeholder="Masukkan Title Section" value="{{ $page['title'] }}" />
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Content <span class="text-danger">*</span></label>
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10">{{ $page['content'] }}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Image</label>
                            <input type="file" name="image_1" class="form-control @error('image_1') is-invalid @enderror" id="defaultFormControlInput" />
                            @error('image_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Image</label>
                            <input type="file" name="image_2" class="form-control @error('image_2') is-invalid @enderror" id="defaultFormControlInput" />
                            @error('image_2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Image</label>
                            <input type="file" name="image_3" class="form-control @error('image_3') is-invalid @enderror" id="defaultFormControlInput" />
                            @error('image_3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Image</label>
                            <input type="file" name="image_4" class="form-control @error('image_4') is-invalid @enderror" id="defaultFormControlInput" />
                            @error('image_4')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Image</label>
                            <input type="file" name="image_5" class="form-control @error('image_5') is-invalid @enderror" id="defaultFormControlInput" />
                            @error('image_5')
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