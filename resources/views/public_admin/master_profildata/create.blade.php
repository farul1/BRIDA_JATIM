<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Tambah Profil Data
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formTambahMasterRS" method="post" action="{{ route('simpan_profildata') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <!-- Judul -->
                            <div class="form-group status_lengkap">
                                <label for="judul" class="col-lg-3 control-label">
                                    Judul <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="judul" id="judul" required>
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div class="form-group status_lengkap">
                                <label for="deskripsi" class="col-lg-3 control-label">
                                    Deskripsi <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <textarea name="deskripsi" id="deskripsi"></textarea>
                                    <script>CKEDITOR.replace('deskripsi');</script>
                                </div>
                            </div>

                            <!-- File -->
                            <div class="form-group status_lengkap">
                                <label for="file" class="col-lg-3 control-label">
                                    File <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <input type="file" class="form-control" name="file" id="file" required>
                                </div>
                            </div>

                            <!-- Kategori -->
                            <div class="form-group status_lengkap">
                                <label for="kategori" class="col-lg-3 control-label">
                                    Kategori <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <select name="kategori" class="form-control" id="kategori" required>
                                        @foreach($profilkat as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama_kategori }}</option>
                                        @endforeach
                                    </select>
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
