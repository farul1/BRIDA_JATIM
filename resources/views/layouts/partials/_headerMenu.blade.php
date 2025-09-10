<ul class="text-uppercase">
    <li class="{{Request::is('/') ? 'active' : ''}}"><a href="{{route('beranda')}}">
            <div>Beranda</div>
        </a></li>
    <li class="{{Request::is('profil*') ? 'active' : ''}}">
        <a href="#" style="cursor: default">
            <div>Profil<i class="icon-angle-down"></i></div>
        </a>
        <ul class="text-uppercase">
            <li class="{{Request::is('profil/tentang-bappeda*') ? 'active' : ''}}">
                <a href="{{route('profil.tentang-bappeda')}}">
                    <div>Tentang Bappeda</div>
                </a></li>
            <li class="{{Request::is('profil/visi-misi*') ? 'active' : ''}}">
                <a href="{{route('profil.visi-misi')}}">
                    <div>Visi dan Misi</div>
                </a></li>
            <li class="{{Request::is('profil/struktur-organisasi*') ? 'active' : ''}}">
                <a href="{{route('profil.struktur-organisasi')}}">
                    <div>Struktur Organisasi</div>
                </a></li>
        </ul>
    </li>
    <li class="{{Request::is('informasi-publik*') ? 'active' : ''}}">
        <a href="{{route('informasi-publik')}}">
            <div>Informasi Publik</div>
        </a></li>
    <li class="{{Request::is('layanan-publik*') ? 'active' : ''}}">
        <a href="{{route('layanan-publik')}}">
            <div>Layanan Publik</div>
        </a></li>
    <li class="{{Request::is('media*') && !Request::is('media/agenda*') ? 'active' : ''}}">
        <a href="#" style="cursor: default">
            <div>Media<i class="icon-angle-down"></i></div>
        </a>
        <ul class="text-uppercase">
            <li class="{{Request::is('media/event*') ? 'active' : ''}}">
                <a href="{{route('media.event')}}">
                    <div>Event</div>
                </a></li>
            <li class="{{Request::is('media/berita*') ? 'active' : ''}}">
                <a href="{{route('media.berita')}}">
                    <div>Berita</div>
                </a></li>
            <li class="{{Request::is('media/galeri*') ? 'active' : ''}}">
                <a href="{{route('media.galeri')}}">
                    <div>Galeri</div>
                </a></li>
        </ul>
    </li>

    @auth
        <li class="avatar {{Auth::user()->isAsn() && Request::is('media/agenda*') ? 'active' : ''}}">
            <a href="#" style="cursor: default">
                <div style="text-transform: none">
                    <img alt="Ava" class="img-thumbnail show_ava" height="20"
                         src="{{asset('admins/img/avatar/avatar-'.rand(1,5).'.png')}}">
                    <b class="show_username">{{\Illuminate\Support\Str::limit(Auth::user()->username,15)}}</b>
                </div>
            </a>
            <ul>
                @if(!Auth::user()->isAsn())
                    <li><a href="{{route('admin.dashboard')}}">
                            <div><i class="icon-dashboard"></i>Dashboard</div>
                        </a></li>
                @else
                    <li class="{{Request::is('media/agenda*') ? 'active' : ''}}"><a href="{{route('media.agenda')}}">
                            <div><i class="icon-calendar-check"></i>Agenda Hari Ini</div>
                        </a></li>
                    <li><a href="#" data-toggle="modal" data-target="#akunModal">
                            <div><i class="icon-cogs"></i>Pengaturan Akun</div>
                        </a></li>
                @endif
                <li class="dropdown-divider"></li>
                <li>
                    <a href="javascript:void(0)" class="btn_signOut">
                        <div><i class="icon-sign-out-alt"></i>Keluar</div>
                    </a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    @endauth
</ul>

<div id="top-search">
    <a href="javascript:void(0)" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
    <form action="#">
        <input id="keyword" type="text" class="form-control" autocomplete="off" spellcheck="false"
               placeholder="Cari&hellip;" name="q">
    </form>
</div>
