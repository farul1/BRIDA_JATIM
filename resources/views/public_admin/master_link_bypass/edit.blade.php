<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Link Bypass
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form method="POST" action="{{ route('simpan_linkbypass_ubah', $id) }}" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                Nama :
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" value="{{ old('nama', $link->name) }}" name="nama" id="nama" >
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="link" style="text-align: right;" class="col-lg-3 control-label">
                                Link :
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" value="{{ old('link', $link->link) }}" name="link" id="link" >
                                @error('link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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


