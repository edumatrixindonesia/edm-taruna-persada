@extends('homepage.layout.app')

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
<div class="parent-best-program">
    <div class="box-best-program">
        <img class="model-best-program" src="{{ asset('storage/' . $program['image_1']) }}" alt="" />
        <div class="text-and-program">
            <h3 class="text-best-program">{{ $program['title'] }}</h3>
            <!-- <div class="parent-child-program"> -->
            <a href="https://api.whatsapp.com/send?phone=6285600422188&text=Halo%20Kak%20Sari,%20saya%20ingin%20Bertanya%20Tentang%20Program%20Komando%20Taruna%20Persada.%20Mohon%20info%20selengkapnya%20...">
                <img class="child-program" src="{{ asset('storage/' . $program['image_2']) }}" alt="" />
            </a>
            <a href="https://api.whatsapp.com/send?phone=6281216365729&text=Halo%20Kak%20Nia,%20saya%20ingin%20Bertanya%20Tentang%20Program%20Presisi%20Taruna%20Persada.%20Mohon%20info%20selengkapnya%20...">
                <img class="child-program" src="{{ asset('storage/' . $program['image_3']) }}" alt="" />
            </a>
            <a href="https://api.whatsapp.com/send?phone=6285600422188&text=Halo%20Kak%20Sari,%20saya%20ingin%20Bertanya%20Tentang%20Program%20Taktis%20Taruna%20Persada.%20Mohon%20info%20selengkapnya%20...">
                <img class="child-program" src="{{ asset('storage/' . $program['image_4']) }}" alt="" />
            </a>
            <a href="https://api.whatsapp.com/send?phone=6281216365729&text=Halo%20Kak%20Nia,%20saya%20ingin%20Bertanya%20Tentang%20Program%20Presisi%20Taruna%20Akurasi.%20Mohon%20info%20selengkapnya%20...">
                <img class="child-program" src="{{ asset('storage/' . $program['image_5']) }}" alt="" />
            </a>
            <!-- </div> -->
        </div>
    </div>
</div>

<!-- DIVINDER -->
<div class="parent-divinder">
    <img class="divinder-page" src="{{ asset('assets/img/divinder.png') }}" alt="" />
</div>

<!-- TIMELINE MATERI -->
<div class="parent-materi">
    <h1 class="title-materi">
        &nbsp; Materi Program <br />&nbsp; Integritas Kedinasan
    </h1>
    <img class="img-materi" src="{{ asset('assets/img/PNG_materi.png') }}" alt="">
</div>



<!-- GALLERI KEGIATAN -->
<!-- <div class="parent-galeri-kegiatan">
      <h1 class="title-materi">&nbsp; Galeri <br />&nbsp; Kegiatan</h1>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/v=g6jSRjry8mM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div> -->

<!-- PROMO SGS -->
<div class="parent-promo-sgs">
    <img class="img-promo-sgs" src="{{ asset('storage/'. $sgs['image_1']) }}" alt="" />
</div>

<!-- TESTIMONI -->
<div class="parent-testimoni-siswa">
    <h1 class="title-testimoni">&nbsp; Testimonial <br />&nbsp; Siswa</h1>
</div>
<main class="main-carousel">
    <button class="carousel-arrow carousel-arrow--prev" onclick="handleCarouselMove(false)">
        &#8249;
    </button>

    <div class="carousel-container" dir="ltr">
        @foreach($testimonials as $testimonial)
        <div class="carousel-slide">
            <img class="img-siswa" src="{{ asset('storage/'.$testimonial['photo']) }}" alt="" />
            <img class="five-star" src="https://static.vecteezy.com/system/resources/previews/003/355/389/original/five-5-star-rank-sign-illustration-free-vector.jpg" alt="" />
            <h2 class="nama-siswa">{{ $testimonial['siswaName'] }}</h2>
            <p class="deskripsi-siswa">{{ $testimonial['description'] }}</p>
        </div>
        @endforeach
    </div>
    <button class="carousel-arrow carousel-arrow--next" onclick="handleCarouselMove()">
        &#8250;
    </button>
</main>

<!-- FAQ -->
<div class="parent-faq">
    <h1 class="title-faq">&nbsp; Frequently <br />&nbsp; Asked Questions</h1>
    <main>
        <div class="accordion">
            @foreach($faqs as $faq)
            <div class="accordion-item">
                <div class="accordion-item-header">
                    <span class="accordion-item-header-title">{{ $faq['question'] }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down accordion-item-header-icon">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </div>
                <div class="accordion-item-description-wrapper">
                    <div class="accordion-item-description">
                        <hr />
                        <p>
                            {{ $faq['answer'] }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</div>
@endsection