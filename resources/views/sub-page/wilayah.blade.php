@extends('homepage.layout.app')

@push('style')
<link rel="stylesheet" href="{{ asset('assets/css/Wilayah.css') }}">
@endpush

@section('content')
<!-- HERO -->
<div class="bg-wilayah">
    <div class="text-image">
        <div class="parent-text-wilayah">
            <h1 class="title-wilayah">
                BIMBEL TNI - POLRI & SEKOLAH KEDINASAN DI {{ $province['nameCapitalCity'] }}
            </h1>
            <p class="deskripsi-wilayah">
                Bersama Taruna Persada bimbel spesialis persiapan masuk TNI/Polri
                dan Sekolah Kedinasan dengan bimbingan Super Intensif dan Fasilitas
                lengkap. Siap membimbing calon generasi terbaik bangsa menjadi abdi
                negara yang unggul & berdedikasi tinggi, dengan slogan
                <strong>BERANI - BERJUANG - BERHASIL.</strong>
            </p>
            <a href="https://api.whatsapp.com/send?phone=6281216365729&text=Halo%20Kak%20Nia,%20saya%20ingin%20Daftar%20Bimbel%20TNI-Polri%20Taruna%20Persada.%20Mohon%20info%20selengkapnya%20...">
                <button class="btn-wilayah">Daftar Sekarang !</button>
            </a>
        </div>
        <img class="globe-tp" src="{{ asset('assets/img/id_world.png') }}" alt="" />
    </div>
</div>

<!-- ABOUT TARUNA PERSADA -->
<div class="bg-about-tp">
    <div class="text-image-about-tp">
        <img class="img-about-tp" src="{{ asset('storage/' . $about['image_1']) }}" alt="" />
        <div class="parent-text-about-tp">
            <h1 class="title-about-tp">{{ $about['title'] }}</h1>
            <div class="parent-divinder-about-tp">
                <img class="divinder-about-tp" src="{{ asset('assets/img/divinder.png') }}" alt="" />
            </div>
            <p class="deskripsi-about-tp">
                {{ $about['content'] }}
            </p>
        </div>
    </div>
    <div class="parent-counter">
        <div class="counter">
            <h2 class="number-counter">38</h2>
            <p class="text-counter">Provinsi</p>
        </div>
        <div class="counter">
            <h2 class="number-counter">2.000+</h2>
            <p class="text-counter">Soal Latihan</p>
        </div>
        <div class="counter">
            <h2 class="number-counter">98%</h2>
            <p class="text-counter">Kepuasan</p>
        </div>
    </div>
</div>

<!-- BEST PROGRAM -->
@include('homepage.component.program')

<!-- DIVINDER -->
<div class="parent-divinder">
    <img class="divinder-page" src="{{ asset('assets/img/divinder.png') }}" alt="" />
</div>

<!-- MASTER TEACHER -->
@include('homepage.component.master-teacher')

<!-- TIMELINE MATERI -->
@include('homepage.component.materi')

<!-- GALLERI KEGIATAN -->
@include('homepage.component.gallery')

<!-- PROMO SGS -->
@include('homepage.component.sgs')

<!-- TESTIMONI -->
@include('homepage.component.testimonial')

<!-- LIPUTAN MEDIA MASA -->
@include('homepage.component.media-massa')

<!-- FAQ -->
@include('homepage.component.faq')

@endsection
@push('script')
<script src="{{ asset('assets/js/Wilayah.js') }}"></script>
@endpush