<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Video
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formTambahMasterRS" method="post" action="{{ route('simpan_video_ubah', $video->id) }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group status_lengkap">
                                <label for="judul" class="col-lg-3 control-label">Judul :</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" value="{{ old('judul', $video->judul) }}" name="judul" id="judul">
                                </div>
                            </div>
                            <div class="form-group status_lengkap">
                                <label for="deskripsi" class="col-lg-3 control-label">Deskripsi :</label>
                                <div class="col-lg-8">
                                    <textarea name="deskripsi" id="deskripsi" class="form-control">{{ old('deskripsi', $video->description) }}</textarea>
                                    <script>CKEDITOR.replace('deskripsi');</script>
                                </div>
                            </div>
                            <div class="form-group status_lengkap">
                                <label for="link" class="col-lg-3 control-label">Link :</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" value="{{ old('link', $video->link) }}" name="link" id="link">
                                </div>
                            </div>
                        </div>
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


