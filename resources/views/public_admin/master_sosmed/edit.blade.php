<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Sosial Media
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formEditSosmed" method="POST" action="{{ route('sosmed.update', $sosmed->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama" class="col-lg-3 control-label">Nama:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" value="{{ $sosmed->nama }}" name="nama" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="link" class="col-lg-3 control-label">Link:</label>
                                <div class="col-lg-8">
                                    <input type="url" class="form-control" value="{{ $sosmed->link }}" name="link" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="file" class="col-lg-3 control-label">Icon:</label>
                                <div class="col-lg-8">
                                    <input type="file" class="form-control" name="file">
                                    @if($sosmed->icon)
                                        <div class="mt-2">
                                            <img src="{{ asset('file_upload/icon/'.$sosmed->icon) }}" width="50" class="img-thumbnail">
                                            <p class="help-block">File saat ini: {{ $sosmed->icon }}</p>
                                        </div>
                                    @endif
                                    <p class="help-block">Format: PNG/JPG, Maksimal 1MB</p>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="icon-cross"></i> Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
// Tambahkan di bagian bawah form
<script>
document.getElementById('file').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('.img-thumbnail').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>
