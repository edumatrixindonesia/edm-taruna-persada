<!-- BEST PROGRAM -->
<div class="parent-best-program">
    <div class="box-best-program">
        <img class="model-best-program" src="{{ asset('storage/' . $program['image_1']) }}" alt="" />
        <div class="text-and-program">
            <h3 class="text-best-program">{{ $program['title'] }}</h3>
            @foreach ($bestPrograms as $bestProgram)
            <a class="link-web" href="#">
                <img class="child-program" src="{{ asset('storage/' . $bestProgram['image']) }}" alt="" />
            </a>
            @endforeach
        </div>
    </div>
</div>