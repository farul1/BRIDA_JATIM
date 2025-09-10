<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_edit" data-toggle="tab" aria-expanded="false">
                        Ubah Data Foto
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_edit">
                    <form id="formUbahGaleriFoto" method="post"
                          action="{{ route('simpan_galerifoto_ubah', $foto->id) }}"
                          class="form-horizontal" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf

                            <!-- Judul -->
                            <div class="form-group">
                                <label for="judul" class="col-lg-3 control-label text-right">
                                    Judul :
                                </label>
                                <div class="col-lg-8">
                                    <input type="text"
                                           class="form-control"
                                           value="{{ $foto->judul }}"
                                           name="judul"
                                           id="judul"
                                           required>
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div class="form-group">
                                <label for="deskripsi" class="col-lg-3 control-label text-right">
                                    Deskripsi :
                                </label>
                                <div class="col-lg-8">
                                    <textarea name="deskripsi" id="deskripsi">{{ $foto->description }}</textarea>
                                    <script>
                                        if (typeof CKEDITOR !== 'undefined') {
                                            CKEDITOR.replace('deskripsi');
                                        }
                                    </script>
                                </div>
                            </div>

                            <!-- File Upload -->
                            <div class="form-group">
                                <label for="file" class="col-lg-3 control-label text-right">
                                    File :
                                </label>
                                <div class="col-lg-8">
                                    <input type="file"
                                           accept=".jpeg,.jpg,.png,.gif"
                                           class="form-control"
                                           name="file"
                                           id="file">
                                    @if($foto->thumbnail)
                                        <img src="{{ asset('file_upload/thumbnail/foto/' . $foto->thumbnail) }}"
                                             alt="Thumbnail"
                                             style="width:30%; margin-top:10px;">
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
