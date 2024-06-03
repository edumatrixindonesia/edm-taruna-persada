@extends('layout.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('faq.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Pertanyaan <span class="text-danger">*</span></label>
                            <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" id="defaultFormControlInput" placeholder="Masukkan Pertanyaan" value="{{ old('question') }}" />
                            @error('question')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Jawaban <span class="text-danger">*</span></label>
                            <input type="text" name="answer" class="form-control @error('answer') is-invalid @enderror" id="defaultFormControlInput" placeholder="Masukkan Jawaban" value="{{ old('answer') }}" />
                            @error('answer')
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