@extends('admin.layout.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <!-- <h5 class="card-header">Default</h5> -->
                <div class="card-body">
                    <form action="{{ route('program.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="defaultFormControlInput" class="form-label">Nama Program</label>
                            <input type="text" name="namaProgram" class="form-control @error('namaProgram') is-invalid @enderror" id="defaultFormControlInput" placeholder="Masukkan Nama Program" value="{{ old('namaProgram') }}" />
                            @error('namaProgram')
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