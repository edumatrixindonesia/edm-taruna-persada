@extends('homepage.layout.app')

@push('style')
<link rel="stylesheet" href="{{ asset('assets/css/ProgramPresisi.css') }}">
<style>
    .bg-hero-presisi {
        background-image: url("/storage/{{ $program['background'] }}");
    }
</style>
@endpush

@section('content')
<!-- HERO -->
<div class="bg-hero-presisi">
    <div class="text-image">
        <div class="parent-text-presisi">
            <h1 class="title-presisi">
                PROGRAM <span class="text-presisi">{{ $program['name'] }}</span>
            </h1>
            <p class="deskripsi-presisi">
                {{ $program['description'] }}
            </p>
            <a href="https://api.whatsapp.com/send?phone=6285600422188&text=Halo%20Kak%20Sari,%20saya%20ingin%20Daftar%20Program%20Presisi%20Taruna%20Persada.%20Mohon%20info%20selengkapnya%20...">
                <button class="btn-presisi">Daftar Sekarang !</button>
            </a>
        </div>
        <img class="model-presisi" src="{{ asset('storage/' . $program['icon']) }}" alt="" />
    </div>
</div>

@if($program['slug'] == 'akurasi')
<!-- BENEFIT -->
<div class="parent-benefit">
    <h1 class="title-benefit-akurasi">
        BANYAK <span class="text-benefit">BENEFIT</span> YANG DITAWARKAN
    </h1>
    <!-- ALFA -->
    @foreach ($benefits as $key => $benefit)
    <h1 class="title-alfa">&nbsp;{{ $key }}</h1>
    <div class="parent-pricelist-alfa">
        @foreach ($benefit as $key => $benefit2)
        <img class="img-pricelist-alfa" src="{{ asset('storage/' . $benefit2['benefit']) }}" alt="" />
        @endforeach
    </div>
    @endforeach
</div>
@else
<!-- BENEFIT -->
<div class="parent-benefit">
    <h1 class="title-benefit-presisi">
        BANYAK <span class="text-benefit">BENEFIT</span> YANG DITAWARKAN
    </h1>
    <div class="parent-pricelist-logo">
        <img class="img-pricelist" src="{{ asset('storage/' . $program['benefit']) }}" alt="" />
        <img class="logotp-edm" src="{{ asset('assets/img/logo/tarunapersada_by_edumatrix.png') }}" alt="" />
    </div>
</div>
@endif

<!-- DIVINDER -->
<div class="parent-divinder">
    <img class="divinder-page" src="{{ asset('assets/img/divinder.png') }}" alt="" />
</div>

<!-- MASTER TEACHER -->
@include('homepage.component.master-teacher')

<!-- TIMELINE MATERI -->
@include('homepage.component.materi')

<!-- PROMO SGS -->
@include('homepage.component.sgs')

<!-- TESTIMONI -->
@include('homepage.component.testimonial')

<!-- LIPUTAN MEDIA MASA -->
@include('homepage.component.media-massa')

@endsection

@push('script')
<script src="{{ asset('assets/js/ProgramPresisi.js') }}"></script>
@endpush