<div class="parent-media-masa">
    <h1 class="title-faq">&nbsp; Telah Diliput <br />&nbsp; Oleh</h1>
    <div class="parent-img-media-masa">
        @foreach($medias as $media)
        <img class="img-media-masa" src="{{ asset('storage/'.$media['image']) }}" alt="" />
        @endforeach
    </div>
</div>