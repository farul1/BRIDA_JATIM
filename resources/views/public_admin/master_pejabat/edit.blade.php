<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Data Pejabat
                    </a>
                </li> 
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi"> 
                   <form id="formEditMasterRS" method="POST" action="{{ route('pejabat.update', $pejabat->id) }}" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group status_lengkap">
                                <label for="nama" class="col-lg-3 control-label text-right">
                                    Nama <span class="text-danger">*</span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $pejabat->nama) }}">
                                </div>
                            </div>
                            <div class="form-group status_lengkap">
                                <label for="jabatan" class="col-lg-3 control-label text-right">
                                    Jabatan <span class="text-danger">*</span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required type="text" class="form-control" name="jabatan" id="jabatan" value="{{ old('jabatan', $pejabat->jabatan) }}">
                                </div>
                            </div>
                            <div class="form-group status_lengkap">
                                <label for="pangkat" class="col-lg-3 control-label text-right">
                                    Pangkat <span class="text-danger">*</span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required type="text" class="form-control" name="pangkat" id="pangkat" value="{{ old('pangkat', $pejabat->pangkat) }}">
                                </div>
                            </div>
                            <div class="form-group status_lengkap">
                                <label for="nip" class="col-lg-3 control-label text-right">
                                    NIP <span class="text-danger">*</span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required type="text" class="form-control" name="nip" id="nip" value="{{ old('nip', $pejabat->nip) }}" placeholder="Masukkan NIP (angka saja)">
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

<!-- Tambahkan ini di bawah form -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const nipInput = document.getElementById('nip');

    nipInput.addEventListener('input', function(e) {
        const originalValue = this.value;
        const numericValue = originalValue.replace(/[^0-9]/g, '');

        if (originalValue !== numericValue) {
            this.value = numericValue;

            Swal.fire({
                icon: 'warning',
                title: 'Oops!',
                text: 'NIP hanya boleh berisi angka.',
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false,
            });
        }
    });
</script>