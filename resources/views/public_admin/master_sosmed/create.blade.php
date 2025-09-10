<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Tambah Sosial Media
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formTambahMasterRS" method="post" action="{{ route('simpan_sosmed') }}" class="form-horizontal" enctype="multipart/form-data" >
                        <div class="modal-body">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>
                            <div class="form-group">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Nama :
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="nama" id="nama" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="link" style="text-align: right;" class="col-lg-3 control-label">
                                    Link :
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="link" id="link" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file" style="text-align: right;" class="col-lg-3 control-label">
                                    Gambar <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required="required" type="file" accept=".jpeg, .jpg, .png" class="form-control" value="" name="file" id="file" >
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
