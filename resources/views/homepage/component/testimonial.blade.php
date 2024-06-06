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