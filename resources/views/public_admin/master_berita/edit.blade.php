<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Data Berita
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form method="POST" action="{{ route('simpan_berita_ubah', $berita->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            {{-- Judul --}}
                            <div class="form-group row">
                                <label for="judul" class="col-lg-3 col-form-label text-right">Judul :</label>
                                <div class="col-lg-8">
                                    <input type="text" name="judul" id="judul" class="form-control" 
                                           value="{{ old('judul', $berita->judul) }}" required>
                                </div>
                            </div>

                            {{-- Deskripsi --}}
                            <div class="form-group row">
                                <label for="deskripsi" class="col-lg-3 col-form-label text-right">Deskripsi :</label>
                                <div class="col-lg-8">
                                    <textarea name="deskripsi" id="deskripsi" class="form-control">{{ old('deskripsi', $berita->description) }}</textarea>
                                    <script>CKEDITOR.replace('deskripsi');</script>
                                </div>
                            </div>

                            {{-- Tanggal --}}
                            <div class="form-group row">
                                <label for="tanggal" class="col-lg-3 col-form-label text-right">Tanggal :</label>
                                <div class="col-lg-8">
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" 
                                           value="{{ old('tanggal', \Carbon\Carbon::parse($berita->tanggal)->format('Y-m-d')) }}" required>
                                </div>
                            </div>

                            {{-- Gambar --}}
                            <div class="form-group row">
                                <label for="gambar" class="col-lg-3 col-form-label text-right">Gambar :</label>
                                <div class="col-lg-8">
                                    <input type="file" name="gambar" id="gambar" class="form-control">
                                    @if($berita->gambar)
                                        <img src="{{ asset('file_upload/berita/'.$berita->gambar) }}" 
                                             alt="Gambar Berita" style="width:30%; margin-top:10px;">
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="icon-cross"></i> Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
