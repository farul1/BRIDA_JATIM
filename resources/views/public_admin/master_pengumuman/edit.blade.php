<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab">Ubah Data Pengumuman</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form method="POST" action="{{ route('simpan_pengumuman_ubah', $peng->id) }}" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        
                        {{-- Judul --}}
                        <div class="form-group">
                            <label for="judul" class="col-lg-3 control-label text-right">Judul:</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="judul" id="judul" value="{{ $peng->judul }}" required>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="form-group">
                            <label for="deskripsi" class="col-lg-3 control-label text-right">Deskripsi:</label>
                            <div class="col-lg-8">
                                <textarea name="deskripsi" id="deskripsi">{!! $peng->description !!}</textarea>
                                <script>CKEDITOR.replace('deskripsi');</script>
                            </div>
                        </div>

                        {{-- Lokasi --}}
                        <div class="form-group">
                            <label for="lokasi" class="col-lg-3 control-label text-right">Lokasi:</label>
                            <div class="col-lg-8">
                                <textarea name="lokasi" id="lokasi">{!! $peng->location !!}</textarea>
                                <script>CKEDITOR.replace('lokasi');</script>
                            </div>
                        </div>

                        {{-- Tanggal --}}
                        <div class="form-group">
                            <label for="tanggal" class="col-lg-3 control-label text-right">Tanggal:</label>
                            <div class="col-lg-8">
                                <input type="date" class="form-control" name="tanggal" value="{{ $peng->tanggal }}" required>
                            </div>
                        </div>

                        {{-- Gambar --}}
                        <div class="form-group">
                            <label for="gambar" class="col-lg-3 control-label text-right">Gambar:</label>
                            <div class="col-lg-8">
                                <input type="file" class="form-control" name="gambar" id="gambar">
                                @if($peng->gambar)
                                    <img src="{{ asset('file_upload/pengumuman/gambar/'.$peng->gambar) }}" alt="Gambar" style="width:30%; margin-top:10px;">
                                @endif
                            </div>
                        </div>

                        {{-- File --}}
                        <div class="form-group">
                            <label for="file" class="col-lg-3 control-label text-right">File:</label>
                            <div class="col-lg-8">
                                <input type="file" class="form-control" name="file" id="file">
                                @if($peng->file)
                                    <a target="_blank" href="{{ asset('file_upload/pengumuman/file/'.$peng->file) }}" style="display:block; margin-top:10px;">
                                        {{ $peng->file }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross"></i> Batal</button>
                            <button type="submit" class="btn btn-primary"><i class="icon-check"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
