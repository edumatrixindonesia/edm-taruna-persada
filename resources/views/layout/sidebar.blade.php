<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/LOGO Taruna PErsada.png') }}" width="150" alt="">
            </span>
            <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span> -->
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('tutor.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Data Master Teacher</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('province.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Data Provinsi</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('regency.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Data Kabupaten</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('district.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Data Kecamatan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('program.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Data Program</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('program-regency.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Program per Kota</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('sub-program.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Data Sub Program</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('sub-program-regency.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Sub Program per Kota</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('mapel.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Data Mata Pelajaran</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('mapel-regency.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Mapel per Kota</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('page.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Landing Page</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('testimonial.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Testimonial</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('faq.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">FaQ</div>
            </a>
        </li>
    </ul>
</aside>