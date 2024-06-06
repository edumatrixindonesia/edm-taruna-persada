@extends('homepage.layout.app')

@push('style')
@endpush

@section('content')
<!-- HERO -->
<div class="bg-hero">
    <div class="text-image">
        <div class="parent-text">
            <h1 class="title-tp">{{ $jumbotron['title'] }}</h1>

            <!-- COUNTDOWN PROMO -->
            <div class="container-countdown">
                <div class="promo-countdown" id="countdown">
                    <ul>
                        <li class="list-countdown"><span id="days"></span>Hari</li>
                        <li class="list-countdown"><span id="hours"></span>Jam</li>
                        <li class="list-countdown"><span id="minutes"></span>Menit</li>
                        <li class="list-countdown"><span id="seconds"></span>Detik</li>
                    </ul>
                    <a href="https://api.whatsapp.com/send?phone=6281216365729&text=Halo%20Kak%20Nia,%20saya%20ingin%20Klaim%20Promo%20Program%20Bimbel%20TNI%20-Polri.%20Mohon%20info%20selengkapnya%20...">
                        <button class="btn-klaim-promo">Klaim Promo !</button>
                    </a>
                </div>
                <div id="content" class="emoji">
                    <span>🥳</span>
                    <span>🎉</span>
                    <span>🎂</span>
                </div>
            </div>

            <p class="deskripsi-tp">
                {{ $jumbotron['content'] }}
            </p>
        </div>
        <img class="model-tp" src="{{ asset('storage/'.$jumbotron['image_1']) }}" alt="" />
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
<script src="{{ asset('assets/js/Homepage.js') }}"></script>

@endpush