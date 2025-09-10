<div class="sidebar sidebar-main">
    <div>
        <div class="sidebar-content">

            <!-- User menu -->
            <div class="sidebar-user-material">
                <div class="category-content">
                    <div class="sidebar-user-material-content">
                        <a href="#">
                            <img src="{{ asset('assets/images/logo_provinsi.png') }}" class="img-circle img-responsive" alt="Logo Provinsi">
                        </a>
                        <h6>{{ auth()->user()->name ?? '' }}</h6>
                        <span class="text-size-small">{{ auth()->user()->email ?? '' }}</span>
                    </div>

                    <div class="sidebar-user-material-menu">
                        <a href="#user-nav" data-toggle="collapse" aria-expanded="false">
                            <span>My account</span> <i class="caret"></i>
                        </a>
                    </div>
                </div>

                <div class="navigation-wrapper collapse" id="user-nav">
                    <ul class="navigation">
                        <li>
                            <a href="{{ url('/admin/myprofile') }}">
                                <i class="icon-user-plus"></i> <span>My profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-switch2"></i> <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            <!-- /user menu -->

            <!-- Main navigation -->
            <div class="sidebar-category sidebar-category-visible">
                <div class="category-content no-padding">
                    <ul class="navigation navigation-main navigation-accordion">

                        <!-- Main Header -->
                        <li class="navigation-header">
                            <span>Main</span>
                            <i class="icon-menu" title="Main pages"></i>
                        </li>

                        <li class="{{ Request::is('admin/home') ? 'active' : '' }}">
                            <a href="{{ url('/admin/home') }}"><i class="icon-home4"></i> <span>Dashboard</span></a>
                        </li>

                        <!-- Master Header -->
                        <li class="navigation-header">
                            <span>Master</span>
                            <i class="icon-menu" title="Master pages"></i>
                        </li>

                        <!-- Master Menu -->
                        <li>
                            <a href="#"><i class="icon-book"></i> <span>Master</span></a>
                            <ul>
                                <li class="{{ Request::is('admin/master_user*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/master_user') }}">Master User</a>
                                </li>
                                <li class="{{ Request::is('admin/master_bidang*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/master_bidang') }}">Master Bidang</a>
                                </li>
                                <li class="{{ Request::is('admin/master_pejabat*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/master_pejabat') }}">Master Pejabat</a>
                                </li>
                                <li class="{{ Request::is('admin/master_subbidang*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/master_subbidang') }}">Master Sub Bidang</a>
                                </li>
                                <li class="{{ Request::is('admin/master_judul*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/master_judul') }}">Master Judul</a>
                                </li>
                                <li class="{{ Request::is('admin/policy-brief*') ? 'active' : '' }}">
                                    <a href="{{ route('policybrief.index') }}">Master Policy Brief</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Master Profil -->
                        <li>
                            <a href="#"><i class="icon-sort"></i> <span>Master Profil</span></a>
                            <ul>
                                <li class="{{ Request::is('admin/master_profilkategori*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/master_profilkategori') }}">Master Profil Kategori</a>
                                </li>
                                <li class="{{ Request::is('admin/master_profildata*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/master_profildata') }}">Master Profil Data</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Data Website -->
                        <li class="navigation-header">
                            <span>Data Website</span>
                            <i class="icon-menu" title="Website data"></i>
                        </li>

                        <li>
                            <a href="#"><i class="icon-earth"></i> <span>Data Website</span></a>
                            <ul>
                                <li class="{{ Request::is('admin/data_profile*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/data_profile') }}">Profile BRIDA</a>
                                </li>
                                <li class="{{ Request::is('admin/data_footer*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/data_footer') }}">Data Footer</a>
                                </li>
                                <li class="{{ Request::is('admin/data_slider*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/data_slider') }}">Data Slider</a>
                                </li>
                                <li class="{{ Request::is('admin/sosmed*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/sosmed') }}">Data Sosial Media</a>
                                </li>
                                <li class="{{ Request::is('admin/master_bgmenu*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/master_bgmenu') }}">Background Menu</a>
                                </li>
                                <li class="{{ Request::is('admin/logo_header*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/logo_header') }}">Logo Header</a>
                                </li>
                                <li class="{{ Request::is('admin/rating*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/rating') }}">Rating</a>
                                </li>
                                <li class="{{ Request::is('admin/master_komen*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/master_komen') }}">Daftar Komentar</a>
                                </li>
                                <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
                                    <a href="{{ route('settings.index') }}"><i class="icon-cog5"></i> Pengaturan Tampilan</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Data Berita & Pengumuman -->
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-bullhorn"></i> <span>Data Berita & Pengumuman</span></a>
                            <ul>
                                <li class="{{ Request::is('admin/master_pengumuman*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/master_pengumuman') }}">Master Pengumuman</a>
                                </li>
                                <li class="{{ Request::is('admin/master_berita*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/master_berita') }}">Master Berita</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Data Kegiatan -->
                        <li class="navigation-header">
                            <span>Data Kegiatan</span>
                            <i class="icon-menu" title="Data kegiatan"></i>
                        </li>

                        <li class="{{ Request::is('admin/periodekegiatan*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/periodekegiatan') }}"><i class="icon-calendar"></i> Periode Kegiatan</a>
                        </li>
                        <li class="{{ Request::is('admin/pprg*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/pprg') }}"><i class="glyphicon glyphicon-folder-open"></i> Data PPRG</a>
                        </li>
                        <li class="{{ Request::is('admin/program_evaluasi*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/program_evaluasi') }}"><i class="icon-stack-text"></i> Evaluasi Capaian Kinerja</a>
                        </li>
                        <li class="{{ Request::is('admin/proposal_data*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/proposal_data') }}"><i class="icon-book2"></i> Data Proposal</a>
                        </li>

                        <!-- Sakip -->
                        <li>
                            <a href="#"><i class="icon-magazine"></i> Sakip</a>
                            <ul>
                                <li class="{{ Request::is('admin/sakip_kategori*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/sakip_kategori') }}">Kategori Sakip</a>
                                </li>
                                <li class="{{ Request::is('admin/sakip_data*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/sakip_data') }}">Data Sakip</a>
                                </li>
                            </ul>
                        </li>

                        <!-- BRIDA -->
                        <li>
                            <a href="#"><i class="icon-pencil"></i> BRIDA</a>
                            <ul>
                                <li class="{{ Request::is('admin/brida_kategori*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/brida_kategori') }}">Kategori BRIDA</a>
                                </li>
                                <li class="{{ Request::is('admin/brida_data*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/brida_data') }}">Data BRIDA</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Data Galeri -->
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-film"></i> Data Galeri</a>
                            <ul>
                                <li class="{{ Request::is('admin/master_video*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/master_video') }}">Video</a>
                                </li>
                                <li class="{{ Request::is('admin/master_galerifoto*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/master_galerifoto') }}">Kategori Foto</a>
                                </li>
                                <li class="{{ Request::is('admin/master_foto*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/master_foto') }}">Foto</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Data Link -->
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-link"></i> Data Link</a>
                            <ul>
                                <li class="{{ Request::is('admin/master_link_linkterkait*') ? 'active' : '' }}">
                                    <a href="{{ route('linkterkait') }}">Master Link Terkait</a>
                                </li>
                                <li class="{{ Request::is('admin/master_link_linkbypass*') ? 'active' : '' }}">
                                    <a href="{{ route('linkbypass') }}">Master Link Bypass</a>
                                </li>
                                <li class="{{ Request::is('admin/master_portal_brida*') ? 'active' : '' }}">
                                    <a href="{{ route('portal_brida') }}">Master Portal BRIDA</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- /main navigation -->

        </div>
    </div>
</div>

<script type="text/javascript">
    @if (session()->has('nama_menu_sidebar'))
        $('.' + "{{ session('nama_menu_sidebar') }}").addClass('active');
    @endif
</script>
