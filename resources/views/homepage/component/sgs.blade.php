<!-- PROMO SGS -->
<div class="parent-promo-sgs">
    @foreach ($promos as $promo)
    <img class="img-promo-sgs" src="{{ asset('storage/' . $promo['image']) }}" alt="" />
    @endforeach
</div>