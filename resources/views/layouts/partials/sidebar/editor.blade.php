<li class="menu-header">General</li>
<li class="dropdown {{\Illuminate\Support\Facades\Request::is('sys-admin/dashboard*') ? 'active' : ''}}">
    <a href="{{route('admin.dashboard')}}" class="nav-link">
        <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
    </a>
</li>

<li class="menu-header">Data Master</li>
<!-- TODO sidebar menu -->
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
