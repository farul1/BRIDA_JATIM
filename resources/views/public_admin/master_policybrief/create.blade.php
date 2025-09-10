<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Tambah Policy Brief
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formTambahMasterRS" action="{{ route('policybrief.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Judul <span style="color:red">*</span> :</label>
                            <div class="col-lg-8">
                                <input type="text" name="judul" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Deskripsi :</label>
                            <div class="col-lg-8">
                                <textarea name="deskripsi" class="form-control" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">File (PDF) :</label>
                            <div class="col-lg-8">
                                <input type="file" name="file" class="form-control" accept="application/pdf">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Gambar :</label>
                            <div class="col-lg-8">
                                <input type="file" name="gambar" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <a href="{{ route('policybrief.index') }}" class="btn btn-danger">
                                    <i class="icon-cross"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="icon-check"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>