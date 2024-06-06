<div class="parent-galeri-kegiatan">
    <h1 class="title-galeri-kegiatan">&nbsp; Galeri <br />&nbsp; Kegiatan</h1>
</div>
<div class="carousel-wrapper">
    <div class="carousel">
        @foreach($galleries as $gallery)
        <div class="item">
            <img class="img-binsik" src="{{ asset('storage/' . $gallery['image']) }}" alt="binsik" />
        </div>
        @endforeach
    </div>
</div>