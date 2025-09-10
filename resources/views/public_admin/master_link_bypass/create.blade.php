<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Tambah Link Bypass
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form method="post" action="{{ route('simpan_linkbypass') }}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama" class="col-lg-3 control-label">Nama :</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="link" class="col-lg-3 control-label">Link :</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="link" id="link" value="{{ old('link') }}">
                            @error('link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross"></i> Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-check"></i> Simpan</button>
                    </div>
                </form>

                @if ($errors->has('link'))
                    <script>
                        alert("Error pada link: {{ $errors->first('link') }}");
                    </script>
                @endif

                </div>
            </div>
        </div>
    </div>
</div>
