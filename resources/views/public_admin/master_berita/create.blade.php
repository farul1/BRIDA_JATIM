<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Tambah Berita
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formTambahMasterRS" method="post" action="{{ route('simpan_berita') }}" class="form-horizontal" enctype="multipart/form-data" >
                        <div class="modal-body">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>
                            <div class="form-group status_lengkap">
                                <label for="judul" style="text-align: right;" class="col-lg-3 control-label">
                                    Judul <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required="required" type="text" class="form-control" value="" name="judul" id="judul" >
                                </div>
                            </div>
                            <div class="form-group status_lengkap">
                                <label for="link" style="text-align: right;" class="col-lg-3 control-label">
                                    Deskripsi <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <textarea name="deskripsi"></textarea>
                                    <script>
                                            CKEDITOR.replace( 'deskripsi' );
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="link" style="text-align: right;" class="col-lg-3 control-label">
                                    Tanggal <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="tanggal" >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group status_lengkap">
                                <label for="file" style="text-align: right;" class="col-lg-3 control-label">
                                    Gambar  :
                                </label>
                                <div class="col-lg-8">
                                    <input type="file" class="form-control" value="" name="gambar" id="gambar" >
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
