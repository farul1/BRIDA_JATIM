@extends('index')

@section('tempat_content')
<style>
    .image-thumb > img:hover {
        width: 500px;
        height: 200px;
    }
</style>

<div class="row">
    <div class="col-md-12">
        {{-- Alert Sukses --}}
        @if (session('status'))
            <script>
                alertKu('success', "{{ session('status') }}");
            </script>
            <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                <span class="text-semibold">Berhasil!</span> {{ session('status') }}
            </div>
        @endif

        {{-- Alert Gagal --}}
        @if (session('statusT'))
            <div class="alert alert-warning alert-styled-left">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                <span class="text-semibold">Gagal!</span> {{ session('statusT') }}
            </div>
        @endif
    </div>

    <div class="col-lg-12">
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Pengaturan Footer</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form action="{{ route('simpanfooter') }}" class="form-horizontal" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $footerdata->id ?? '' }}">

                    {{-- Alamat --}}
                    <div class="form-group">
                        <label class="control-label col-lg-2">Alamat :</label>
                        <div class="col-lg-10">
                            <input type="text" name="alamat"
                                   value="{{ old('alamat', $footerdata->alamat ?? '') }}"
                                   class="form-control" required>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label class="control-label col-lg-2">Email :</label>
                        <div class="col-lg-10">
                            <input type="email" name="email"
                                   value="{{ old('email', $footerdata->email ?? '') }}"
                                   class="form-control" required>
                        </div>
                    </div>

                    {{-- Telepon --}}
                    <div class="form-group">
                        <label class="control-label col-lg-2">Telepon :</label>
                        <div class="col-lg-10">
                            <input type="text" name="telepon"
                                   value="{{ old('telepon', $footerdata->telepon ?? '') }}"
                                   class="form-control" required>
                        </div>
                    </div>

                {{-- Link Google Maps --}}
                <div class="form-group">
                    <label class="control-label col-lg-2">Link Google Maps :</label>
                    <div class="col-lg-10">
                        <input type="url" name="map_url"
                            value="{{ old('map_url', $footerdata->map_url ?? '') }}"
                            class="form-control" placeholder="https://www.google.com/maps/embed?pb=..." >
                        <span class="help-block" style="color:#e74c3c;">
                            ⚠️ <strong>Petunjuk link Google Maps:</strong><br>
                            1. Buka lokasi Anda di <a href="https://maps.google.com" target="_blank">Google Maps</a>.<br>
                            2. Klik tombol <b>Bagikan</b> → pilih <b>Sematkan peta</b>.<br>
                            3. Salin link dari atribut <code>&lt;iframe src="..."&gt;</code>.<br>
                            4. Tempelkan di sini (URL akan diawali <code>https://www.google.com/maps/embed?pb=</code>).
                        </span>
                    </div>
                </div>


                    {{-- Tombol Simpan --}}
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>

                {{-- Preview Map --}}
                @if (!empty($footerdata->map_url))
                    <hr>
                    <h5>Preview Peta:</h5>
                    <div style="width: 100%; height: 300px;">
                        <iframe
                            src="{{ $footerdata->map_url }}"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
