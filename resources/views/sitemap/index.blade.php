<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- LANDING -->
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- PAGE KELAS     -->
    <url>
        <loc>{{ url('/') }}/kelas</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- BEST PROGRAM -->
    @foreach ($bestPrograms as $bestProgram)
    <url>
        <loc>{{ url('/') }}/bimbel-tni-polri-dan-sekolah-kedinasan/program/{{ $bestProgram['slug'] }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    <!-- KELAS -->
    @foreach ($programs as $program)
    <url>
        <loc>{{ url('/') }}/bimbel/{{ $program['slug'] }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($subprograms as $subprogram)
    <url>
        <loc>{{ url('/') }}/bimbel/{{ $subprogram['slug'] }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    <!-- KOTA -->
    @foreach ($provinces as $province)
    <url>
        <loc>{{ url('/') }}/bimbel-tni-polri-dan-sekolah-kedinasan/kota/{{ $province['slugCapitalCity'] }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($regencies as $regency)
    <url>
        <loc>{{ url('/') }}/bimbel-tni-polri-dan-sekolah-kedinasan/kota/{{ $regency['slug'] }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($districts as $district)
    <url>
        <loc>{{ url('/') }}/bimbel-tni-polri-dan-sekolah-kedinasan/kota/{{ $district['slug'] }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    <!-- KELAS PER KOTA -->
    @foreach ($programRegencies as $key => $programRegency)
    @foreach ($programRegency as $programRegency2)
    @foreach ($programRegency2['regencies'] as $programRegency3)
    <url>
        <loc>{{ url('/') }}/bimbel/{{ $key }}/kota/{{ $programRegency3['slug'] }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
    @endforeach
    @endforeach

    @foreach ($subProgramRegencies as $key => $subProgramRegency)
    @foreach ($subProgramRegency as $subProgramRegency2)
    @foreach ($subProgramRegency2['regencies'] as $subProgramRegency3)
    <url>
        <loc>{{ url('/') }}/bimbel/{{ $key }}/kota/{{ $subProgramRegency3['slug'] }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
    @endforeach
    @endforeach

    <!-- KELAS PER KECAMATAN -->
    @foreach ($programRegencies as $key => $programRegency)
    @foreach ($programRegency as $programRegency2)
    @foreach ($programRegency2['regencies'] as $programRegency3)
    @foreach ($districts as $district)
    @if($district['regencyId'] == $programRegency3['id'])
    <url>
        <loc>{{ url('/') }}/bimbel/{{ $key }}/kota/{{ $programRegency3['slug'] }}/kecamatan/{{ $district['slug'] }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endif
    @endforeach
    @endforeach
    @endforeach
    @endforeach

    @foreach ($subProgramRegencies as $key => $subProgramRegency)
    @foreach ($subProgramRegency as $subProgramRegency2)
    @foreach ($subProgramRegency2['regencies'] as $subProgramRegency3)
    @foreach ($districts as $district)
    @if($district['regencyId'] == $subProgramRegency3['id'])
    <url>
        <loc>{{ url('/') }}/bimbel/{{ $key }}/kota/{{ $subProgramRegency3['slug'] }}/kecamatan/{{ $district['slug'] }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endif
    @endforeach
    @endforeach
    @endforeach
    @endforeach
</urlset>