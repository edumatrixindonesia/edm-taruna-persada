<!-- MASTER TEACHER -->
<div class="slide-container swiper">
    <div class="slide-content">
        <h1 class="title-mt">MASTER TEACHER</h1>
        <div class="card-wrapper swiper-wrapper">
            @foreach($teachers as $teacher)
            <div class="card swiper-slide">
                <div class="image-content">
                    <img class="bg-mt" src="{{ asset('storage/' . $teacher['theme'])}}" alt="" />
                </div>

                <div class="card-content">
                    <h2 class="name">{{ $teacher['name'] }}</h2>
                    <div class="parent-card-mt">
                        <img class="img-mt" src="{{ asset('storage/' . $teacher['image']) }}" alt="" />

                        <p class="description">
                            {{ $teacher['description'] }}
                        </p>
                    </div>
                    <img class="five-star" src="https://static.vecteezy.com/system/resources/previews/003/355/389/original/five-5-star-rank-sign-illustration-free-vector.jpg" alt="" />
                    <button class="button">{{ $teacher['jenjang'] }} - {{ $teacher['university'] }}</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
</div>