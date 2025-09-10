<ul class="sidebar-menu">
    @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Support\Role::ROOT || \Illuminate\Support\Facades\Auth::user()->role == \App\Support\Role::ADMIN)
        @include('layouts.partials.sidebar.admin')
    @elseif(\Illuminate\Support\Facades\Auth::user()->role == \App\Support\Role::EDITOR )
        @include('layouts.partials.sidebar.editor')
    @elseif(\Illuminate\Support\Facades\Auth::user()->role == \App\Support\Role::CONTRIBUTOR )
        @include('layouts.partials.sidebar.contributor')
    @endif
</ul>

<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="{{route('beranda')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> SITUS UTAMA</a>
</div>
