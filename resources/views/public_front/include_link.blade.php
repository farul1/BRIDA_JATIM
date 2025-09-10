@php

$bridaKat = \App\Models\BridaKategori::all();
$linkbypass = App\Models\LinkBypass::all();
$linkterkait = \App\Models\LinkTerkaits::all();
@endphp

<ul id="mainmenu" style="text-transform: uppercase; ">
    {{-- Menggunakan nama rute agar konsisten --}}
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('/profil') }}">Profil</a></li>
    <li><a href="#">Berita</a>
        <ul>
            <li><a href="{{ url('/pengumuman') }}">Pengumuman</a></li>
            <li><a href="{{ url('/beritaartikel') }}">Berita & Artikel</a></li>
        </ul>
    </li>
    {{-- Rebranding dari "Litbang" menjadi "BRIDA" --}}
<li><a href="#">Produk BRIDA</a>
    <ul>
        {{-- Loop kategori BRIDA --}}
        @foreach($bridaKat as $kategori)
            <li>
                <a href="{{ url('/produk', $kategori->id) }}">
                    {{ $kategori->nama_kategori }}
                </a>
            </li>
        @endforeach

        {{-- Tambahan menu statis untuk Policy Brief --}}
        <li>
            <a href="{{ route('policybrief') }}">Policy Brief</a>
        </li>
    </ul>
</li>


    <li><a href="#">Galeri</a>
        <ul>
            <li><a href="{{ url('/galerifoto') }}">Foto</a></li>
            <li><a href="{{ url('/galerivideo') }}">Video</a></li>
        </ul>
    </li>
    <li><a href="{{ url('/sakip') }}">Sakip</a></li>
    {{-- Link PPID ini mungkin perlu diperbarui ke domain BRIDA jika sudah ada --}}
    <li><a target="_blank" href="https://ppid.brida.jatimprov.go.id/">PPID</a></li>

    {{-- Loop ini diperbaiki agar menggunakan variabel $linkterkait --}}
    <li><a href="#">LINK TERKAIT</a>
        <ul>
            @foreach($linkterkait as $link)
            <li><a target="_blank" href="{{ $link->link }}" style="text-transform: uppercase;">{{ $link->name }}</a></li>
            @endforeach
        </ul>
    </li>
</ul>
<!-- mainmenu close -->
