<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Data Foto
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formEditFoto" method="post" action="{{ route('simpan_foto_ubah', $foto->id) }}"
                          class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <!-- Kategori -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Kategori <span style="color:red">*</span> :</label>
                            <div class="col-lg-8">
                                <select required class="form-control" name="galeri">
                                    @foreach($galeri as $g)
                                        <option value="{{ $g->id }}" {{ $g->id == $foto->id_galeri ? 'selected' : '' }}>
                                            {{ $g->judul }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Judul -->
                        <div class="form-group">
                            <label for="judul" class="col-lg-3 control-label">Judul :</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="judul" id="judul"
                                       value="{{ $foto->judul }}">
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-group">
                            <label for="deskripsi" class="col-lg-3 control-label">Deskripsi :</label>
                            <div class="col-lg-8">
                                <textarea name="deskripsi" id="deskripsi">{{ $foto->description }}</textarea>
                                <script>
                                    CKEDITOR.replace('deskripsi');
                                </script>
                            </div>
                        </div>

                        <!-- File Foto -->
                        <div class="form-group">
                            <label for="file" class="col-lg-3 control-label">File :</label>
                            <div class="col-lg-8">
                                <input type="file" accept=".jpeg,.jpg,.png" class="form-control" name="file" id="file">
                                @if($foto->gambar)
                                    <img src="{{ asset('file_upload/foto/' . $foto->gambar) }}" alt="Foto"
                                         style="width:30%; margin-top:10px;">
                                @endif
                            </div>
                        </div>

                        <!-- Footer -->
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
