<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/Homepage.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <title>Bimbel TNI/Polri dan Sekolah Kedinasan Terbaik - Taruna Persada</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/taruna-persada.ico') }}">

    @stack('style')

</head>

<body>
    @include('homepage.layout.navbar')

    @yield('content')

    <!-- DIVINDER -->
    <div class="parent-divinder">
        <img class="divinder-page" src="{{ asset('assets/img/divinder.png') }}" alt="" />
    </div>

    <!-- FOOTER -->
    @include('homepage.layout.footer')

    <!-- FLOATING CTA -->
    @include('homepage.layout.cta')

    <!-- BOTTOM BAR -->
    @include('homepage.layout.bottom-bar')

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.js"></script>

    <!-- JavaScript -->
    <!--Uncomment this line-->
    <script src="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/script.js"></script>
    <!-- <script src="{{ asset('assets/js/Homepage.js') }}"></script> -->
    @stack('script')
</body>

</html>