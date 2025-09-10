<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Profil Data
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formEditProfilData" method="post" action="{{ route('simpan_profildata_ubah', $profildata->id) }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <!-- Judul -->
                            <div class="form-group status_lengkap">
                                <label for="judul" class="col-lg-3 control-label">Judul :</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul', $profildata->judul) }}" required>
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div class="form-group status_lengkap">
                                <label for="deskripsi" class="col-lg-3 control-label">Deskripsi :</label>
                                <div class="col-lg-8">
                                    <textarea name="deskripsi" id="deskripsi">{{ old('deskripsi', $profildata->description) }}</textarea>
                                    <script>
                                        CKEDITOR.replace('deskripsi');
                                    </script>
                                </div>
                            </div>

                            <!-- File -->
                            <div class="form-group status_lengkap">
                                <label for="file" class="col-lg-3 control-label">File :</label>
                                <div class="col-lg-8">
                                    <input type="file" class="form-control" name="file" id="file">
                                    @if($profildata->file)
                                        <p>File saat ini: 
                                            <a href="{{ asset('file_upload/profil_data/file/' . $profildata->file) }}" target="_blank">
                                                {{ $profildata->file }}
                                            </a>
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Kategori -->
                            <div class="form-group status_lengkap">
                                <label for="kategori" class="col-lg-3 control-label">Kategori :</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="kategori" id="kategori" required>
                                        @foreach($profilkat as $p)
                                            <option value="{{ $p->id }}" {{ $p->id == $profildata->id_kategori ? 'selected' : '' }}>
                                                {{ $p->nama_kategori }}
                                                @if($p->status == 0) (Non-Aktif) @endif
                                            </option>
                                        @endforeach
                                    </select>
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
