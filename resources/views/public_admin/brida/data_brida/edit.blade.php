<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Bidang
                    </a>
                </li>

            </ul>

            <div class="tab-content">
                                    <div class="alert alert-warning">
                    <strong>Disclaimer:</strong>
                    Silakan isi <b>Judul</b> dan <b>Keterangan</b> sesuai data yang benar.
                    Untuk kolom lain yang tidak ditampilkan pada sistem, cukup diisi dengan tanda <b>-</b>.
                </div>

                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formTambahMasterRS" method="POST" action="{{ route('brida_data.update', $brida->id) }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="form-group admin_bagian">
                                <label for="id_kategori" class="col-lg-3 control-label text-right">
                                    Nama Kategori <span class="text-danger">*</span> :
                                </label>
                                <div class="col-lg-8">
                                    <select class="form-control" id="id_kategori" name="id_kategori" required>
                                        @foreach($bridaKategori as $kategori)
                                            <option value="{{ $kategori->id }}" {{ ($kategori->id == old('id_kategori', $brida->id_kategori)) ? 'selected' : '' }}>
                                                {{ $kategori->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_kategori')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group status_lengkap">
                                <label for="judul" class="col-lg-3 control-label text-right">
                                    Judul <span class="text-danger">*</span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required type="text" class="form-control" name="judul" id="judul" value="{{ old('judul', $brida->judul) }}">
                                    @error('judul')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group status_lengkap">
                                <label for="nama" class="col-lg-3 control-label text-right">
                                    Nama <span class="text-danger">*</span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $brida->nama) }}">
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group status_lengkap">
                                <label for="keterangan" class="col-lg-3 control-label text-right">
                                    Keterangan <span class="text-danger">*</span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required type="text" class="form-control" name="keterangan" id="keterangan" value="{{ old('keterangan', $brida->keterangan) }}">
                                    @error('keterangan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group status_lengkap">
                                <label for="description" class="col-lg-3 control-label text-right">
                                    Deskripsi <span class="text-danger">*</span> :
                                </label>
                                <div class="col-lg-8">
                                    <textarea required class="form-control summernote" name="description" id="description">{{ old('description', $brida->description) }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group status_lengkap">
                                <label for="file_upload" class="col-lg-3 control-label text-right">
                                    File <span class="text-danger">*</span> :
                                </label>
                                <div class="col-lg-8">
                                    <input type="file" class="form-control" name="file_upload" id="file_upload" accept=".xls,.xlsx,.doc,.docx,.pdf" />
                                    @if($brida->file)
                                        <small>File saat ini: <a href="{{ url($brida->file) }}" target="_blank">Lihat File</a></small>
                                    @endif
                                    @error('file_upload')
                                        <br><small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group status_lengkap">
                                <label for="file_upload_gambar" class="col-lg-3 control-label text-right">
                                    Gambar <span class="text-danger">*</span> :
                                </label>
                                <div class="col-lg-8">
                                    <input type="file" class="form-control" name="file_upload_gambar" id="file_upload_gambar" accept=".jpg,.png,.jpeg" />
                                    @if($brida->gambar)
                                        <small>Gambar saat ini: <a href="{{ url($brida->gambar) }}" target="_blank">Lihat Gambar</a></small>
                                    @endif
                                    @error('file_upload_gambar')
                                        <br><small class="text-danger">{{ $message }}</small>
                                    @enderror
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

<script type="text/javascript">
    $('.select22').select2();
    $(function () {
        $('.summernote').each(function(){
            var toolbarGroups = [
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'align', 'list', 'indent', 'blocks', 'bidi', 'paragraph' ] },
                { name: 'forms', groups: [ 'forms' ] },
                { name: 'document', groups: [ 'document', 'mode', 'doctools' ] },
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'insert', groups: [ 'insert' ] },
                { name: 'colors', groups: [ 'colors' ] },
            ];
            CKEDITOR.replace(this.id,{
                uiColor : '#b2cefe',
                toolbarGroups,
                removeButtons : 'Link,Unlink,Anchor,Image,Flash,HorizontalRule,Iframe,About'
            });
        });
    });
</script>
