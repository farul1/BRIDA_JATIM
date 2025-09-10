<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Tambah Link Portal
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    {{-- DIUBAH: Nama rute disesuaikan --}}
                    <form id="formTambahMasterRS" method="post" action="{{ route('simpan_portal_brida') }}" class="form-horizontal" enctype="multipart/form-data">
                        {{-- DIUBAH: Menggunakan @csrf --}}
                        @csrf
                        <div class="modal-body">
                            <div class="form-group status_lengkap">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Nama <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required type="text" class="form-control" value="{{ old('nama') }}" name="nama" id="nama" placeholder="Masukkan nama portal">
                                </div>
                            </div>

                            <div class="form-group status_lengkap">
                                <label for="link" style="text-align: right;" class="col-lg-3 control-label">
                                    Link <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required type="url" class="form-control" value="{{ old('link') }}" name="link" id="link" placeholder="https://brida.jatimprov.go.id/">
                                    <span style="color:red">Contoh : <i>https://brida.jatimprov.go.id/</i></span>
                                </div>
                            </div>

                            <div class="form-group status_lengkap">
                                <label for="deskripsi" style="text-align: right;" class="col-lg-3 control-label">
                                    Deskripsi :
                                </label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi singkat (opsional)">{{ old('deskripsi') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group status_lengkap">
                                <label for="foto" style="text-align: right;" class="col-lg-3 control-label">
                                    Foto <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required type="file" class="form-control-file" name="foto" id="foto" accept=".jpeg,.jpg,.png">
                                    <span style="color:red">File : <i>Jpeg,jpg,png</i>. Maksimal 2MB.</span>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="{{ route('portal_brida') }}" class="btn btn-danger"><i class="icon-cross"></i> Batal</a>
                            <button type="submit" class="btn btn-primary"><i class="icon-check"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
