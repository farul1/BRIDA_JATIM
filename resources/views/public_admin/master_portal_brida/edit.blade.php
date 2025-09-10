<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Link Portal
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    {{-- DIUBAH: Nama rute, method, dan variabel disesuaikan --}}
                    <form id="formUbahMasterRS" method="post" action="{{ route('simpan_portal_brida_ubah', $portalBrida->id) }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf {{-- DIUBAH: Menggunakan sintaks Blade modern --}}
                        @method('POST') {{-- Method spoofing untuk update --}}

                        <div class="modal-body">
                            <div class="form-group status_lengkap">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Nama <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    {{-- DIUBAH: Menggunakan helper old() dan variabel $portalBrida --}}
                                    <input required="required" type="text" class="form-control" value="{{ old('nama', $portalBrida->nama) }}" name="nama" id="nama">
                                </div>
                            </div>

                            <div class="form-group status_lengkap">
                                <label for="link" style="text-align: right;" class="col-lg-3 control-label">
                                    Link <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required="required" type="text" class="form-control" value="{{ old('link', $portalBrida->link) }}" name="link" id="link">
                                    <span style="color:red">Contoh : <i>https://brida.jatimprov.go.id/</i></span>
                                </div>
                            </div>

                            <div class="form-group status_lengkap">
                                <label for="deskripsi" style="text-align: right;" class="col-lg-3 control-label">
                                    Deskripsi :
                                </label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" name="deskripsi" id="deskripsi">{{ old('deskripsi', $portalBrida->deskripsi) }}</textarea>
                                </div>
                            </div>

                            <div class="form-group status_lengkap">
                                <label for="foto" style="text-align: right;" class="col-lg-3 control-label">
                                    Foto :
                                </label>
                                <div class="col-lg-8">
                                    <input type="file" class="form-control" name="foto" id="foto">
                                    <span style="color:red">File : <i>Jpeg,jpg,png</i>. Kosongkan jika tidak ingin mengubah foto.</span>
                                    @if($portalBrida->logo)
                                        <div class="mt-2">
                                            <p>Logo Saat Ini:</p>
                                            <img src="{{ asset($portalBrida->logo) }}" alt="Logo saat ini" style="max-height: 80px;" class="img-thumbnail">
                                        </div>
                                    @endif
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

