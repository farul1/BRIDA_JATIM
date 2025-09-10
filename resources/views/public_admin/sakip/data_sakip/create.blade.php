<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Tambah Data Sakip
                    </a>
                </li> 
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi"> 
                    <form id="formTambahMasterRS" method="POST" action="{{ route('simpan_sakip_data') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group status_lengkap row">
                                <label for="judul" class="col-lg-3 control-label" style="text-align: right;">
                                    Judul <span style="color:red"><b>*</b></span> : 
                                </label>
                                <div class="col-lg-8"> 
                                    <input required type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul">
                                </div>
                            </div> 

                            <div class="form-group status_lengkap row">
                                <label for="keterangan" class="col-lg-3 control-label" style="text-align: right;">
                                    Keterangan : 
                                </label>
                                <div class="col-lg-8"> 
                                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan keterangan (opsional)">
                                </div>
                            </div> 

                            <div class="form-group admin_bagian row">
                                <label for="id_kategori" class="col-lg-3 control-label" style="text-align: right;">
                                    Nama Kategori <span style="color:red"><b>*</b></span> : 
                                </label>
                                <div class="col-lg-8"> 
                                    <select class="form-control select22" id="id_kategori" name="id_kategori" required>
                                        <option value="" disabled selected>Pilih kategori</option>
                                        @foreach($sakip_kategori as $r)
                                            <option value="{{ $r->id }}">{{ $r->nama_kategori }}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div> 

                            <div class="form-group status_lengkap row">
                                <label for="file_upload" class="col-lg-3 control-label" style="text-align: right;">
                                    File <span style="color:red"><b>*</b></span> : 
                                </label>
                                <div class="col-lg-8"> 
                                    <input required type="file" class="form-control" name="file_upload" id="file_upload" accept=".pdf,.doc,.docx">   
                                </div>
                            </div> 

                            <div class="form-group status_lengkap row">
                                <label for="gambar_upload" class="col-lg-3 control-label" style="text-align: right;">
                                    Gambar (opsional) : 
                                </label>
                                <div class="col-lg-8"> 
                                    <input type="file" class="form-control" name="gambar_upload" id="gambar_upload" accept="image/*">
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
    $(function () {
        // Inisialisasi select2 untuk dropdown kategori
        $('.select22').select2({
            placeholder: "Pilih kategori",
            allowClear: true
        });

        // Inisialisasi CKEditor jika ada textarea dengan class summernote
        $('.summernote').each(function () {
            var toolbarGroups = [
                { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
                { name: 'paragraph', groups: ['align', 'list', 'indent', 'blocks', 'bidi', 'paragraph'] },
                { name: 'forms', groups: ['forms'] },
                { name: 'document', groups: ['document', 'mode', 'doctools'] },
                { name: 'clipboard', groups: ['clipboard', 'undo'] },
                { name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing'] },
                { name: 'links', groups: ['links'] },
                { name: 'styles', groups: ['styles'] },
                { name: 'insert', groups: ['insert'] },
                { name: 'colors', groups: ['colors'] }
            ];
            CKEDITOR.replace(this.id, {  
                uiColor: '#b2cefe',
                toolbarGroups: toolbarGroups,
                removeButtons: 'Link,Unlink,Anchor,Image,Flash,HorizontalRule,Iframe,About'
            });
        });
    });
</script>
