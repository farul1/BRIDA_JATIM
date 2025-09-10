<li class="menu-header">General</li>
<li class="dropdown {{\Illuminate\Support\Facades\Request::is('sys-admin/dashboard*') ? 'active' : ''}}">
    <a href="{{route('admin.dashboard')}}" class="nav-link">
        <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
    </a>
</li>

<li class="menu-header">Data Master</li>
<!-- TODO sidebar menu -->

<li class="dropdown {{\Illuminate\Support\Facades\Request::is('sys-admin/kategori*') ? 'active' : ''}}">
    <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-columns"></i><span>Kategori / Bidang</span>
    </a>
    <ul class="dropdown-menu">
        <li class="{{\Illuminate\Support\Facades\Request::is('sys-admin/kategori/berita*') ?
            'active' : ''}}"><a href="{{route('admin.kategori.berita')}}" class="nav-link">Berita</a></li>
        <li class="{{\Illuminate\Support\Facades\Request::is('sys-admin/kategori/informasi*') ?
            'active' : ''}}"><a href="{{route('admin.kategori.informasi')}}" class="nav-link">Informasi Publik</a></li>
        <li class="{{\Illuminate\Support\Facades\Request::is('sys-admin/kategori/galeri*') ?
            'active' : ''}}"><a href="{{route('admin.kategori.galeri')}}" class="nav-link">Galery</a></li>
        <li class="{{\Illuminate\Support\Facades\Request::is('sys-admin/kategori/agenda*') ?
            'active' : ''}}"><a href="{{route('admin.kategori.agenda')}}" class="nav-link">Agenda</a></li>
    </ul>
</li>
<li class="dropdown {{\Illuminate\Support\Facades\Request::is('sys-admin/berita*') ? 'active' : ''}}">
    <a href="{{route('admin.berita')}}" class="nav-link">
        <i class="fas fa-newspaper"></i><span>Berita</span>
    </a>
</li>
<li class="dropdown {{\Illuminate\Support\Facades\Request::is('sys-admin/informasi*') ? 'active' : ''}}">
    <a href="{{route('admin.informasi')}}" class="nav-link">
        <i class="fas fa-info-circle"></i><span>Informasi Publik</span>
    </a>
</li>
<li class="dropdown {{\Illuminate\Support\Facades\Request::is('sys-admin/layanan*') ? 'active' : ''}}">
    <a href="{{route('admin.layanan')}}" class="nav-link">
        <i class="fas fa-headset"></i><span>Layanan Publik</span>
    </a>
</li>
<li class="dropdown {{\Illuminate\Support\Facades\Request::is('sys-admin/galeri*') ? 'active' : ''}}">
    <a href="{{route('admin.galeri')}}" class="nav-link">
        <i class="fas fa-images"></i><span>Gallery</span>
    </a>
</li>
<li class="dropdown {{\Illuminate\Support\Facades\Request::is('sys-admin/akun*') ? 'active' : ''}}">
    <a href="{{route('admin.akun.asn')}}" class="nav-link">
        <i class="fas fa-users"></i><span>Daftar Pengguna</span>
    </a>
</li>
<li class="dropdown {{\Illuminate\Support\Facades\Request::is('sys-admin/jadwal*') ? 'active' : ''}}">
    <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-calendar-alt"></i><span>Jadwal </span>
    </a>
    <ul class="dropdown-menu">
        <li class="{{\Illuminate\Support\Facades\Request::is('sys-admin/jadwal/pengumuman*') ?
            'active' : ''}}"><a href="{{route('admin.pengumuman')}}" class="nav-link">Pengumuman</a></li>
        <li class="{{\Illuminate\Support\Facades\Request::is('sys-admin/jadwal/agenda*') ?
            'active' : ''}}"><a href="{{route('admin.agenda')}}" class="nav-link">Agenda</a></li>
        <li class="{{\Illuminate\Support\Facades\Request::is('sys-admin/jadwal/event*') ?
            'active' : ''}}"><a href="{{route('admin.event')}}" class="nav-link">Event</a></li>
    </ul>
</li>
<li class="dropdown {{\Illuminate\Support\Facades\Request::is('sys-admin/setting*') ? 'active' : ''}}">
    <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-globe"></i><span>Website</span>
    </a>
    <ul class="dropdown-menu">
        <li class="{{\Illuminate\Support\Facades\Request::is('sys-admin/setting/skema-warna*') ?
            'active' : ''}}"><a href="{{route('admin.setting.color')}}" class="nav-link">Skema Warna</a></li>
        <li class="{{\Illuminate\Support\Facades\Request::is('sys-admin/setting/slider*') ?
            'active' : ''}}"><a href="{{route('admin.setting.slider')}}" class="nav-link">Slider / Carousel</a></li>
        <li class="{{\Illuminate\Support\Facades\Request::is('sys-admin/setting/info_kontak*') ?
            'active' : ''}}"><a href="{{route('admin.setting.kontak')}}" class="nav-link">Info Kontak</a></li>
        <li class="{{\Illuminate\Support\Facades\Request::is('sys-admin/setting/info_web*') ?
            'active' : ''}}"><a href="{{route('admin.setting.web')}}" class="nav-link">Info Website</a></li>
        <li class="{{\Illuminate\Support\Facades\Request::is('sys-admin/setting/saran*') ?
            'active' : ''}}"><a href="{{route('admin.setting.saran')}}" class="nav-link">Kritik & saran</a></li>
    </ul>
</li>
