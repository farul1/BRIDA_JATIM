<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Policy Brief
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formUbahMasterRS" action="{{ route('policybrief.update', $policyBrief->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Judul <span style="color:red">*</span> :</label>
                            <div class="col-lg-8">
                                <input type="text" name="judul" value="{{ $policyBrief->judul }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Deskripsi :</label>
                            <div class="col-lg-8">
                                <textarea name="deskripsi" class="form-control" rows="4">{{ $policyBrief->deskripsi }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">File (PDF) :</label>
                            <div class="col-lg-8">
                                @if($policyBrief->file)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/'.$policyBrief->file) }}" target="_blank" class="btn btn-sm btn-info">Lihat File Saat Ini</a>
                                    </div>
                                @endif
                                <input type="file" name="file" class="form-control" accept="application/pdf">
                                <span style="color:red">Kosongkan jika tidak ingin mengubah file.</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Gambar :</label>
                            <div class="col-lg-8">
                                @if($policyBrief->gambar)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/'.$policyBrief->gambar) }}" width="100" class="img-thumbnail">
                                    </div>
                                @endif
                                <input type="file" name="gambar" class="form-control" accept="image/*">
                                <span style="color:red">Kosongkan jika tidak ingin mengubah gambar.</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <a href="{{ route('policybrief.index') }}" class="btn btn-danger">
                                    <i class="icon-cross"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check"></i> Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>