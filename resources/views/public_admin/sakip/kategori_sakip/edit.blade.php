<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Kategori
                    </a>
                </li> 
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi"> 
                    <form id="formEditSakipKategori" method="POST" action="{{ route('sakip.update', $sakip_kategori->id) }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="form-group status_lengkap">
                                <label for="judul" class="col-lg-3 control-label" style="text-align: right;">
                                    Judul <span style="color:red"><b>*</b></span> : 
                                </label>
                                <div class="col-lg-8"> 
                                    <input required type="text" class="form-control" name="judul" id="judul" value="{{ old('judul', $sakip_kategori->nama_kategori) }}">
                                </div>
                            </div> 

                            <div class="form-group status_lengkap">
                                <label for="link" class="col-lg-3 control-label" style="text-align: right;">
                                    Link <span style="color:red"><b>*</b></span> : 
                                </label>
                                <div class="col-lg-8"> 
                                    <input required type="text" class="form-control" name="link" id="link" value="{{ old('link', $sakip_kategori->link) }}">
                                    <span style="color:red">Contoh: https://balitbang.jatimprov.go.id/</span>
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
        // Jika pakai select2 (jika ada)
        $('.select22').select2();

        // Inisialisasi CKEditor jika ada textarea yang pakai class summernote
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
                uiColor : '#b2cefe',
                toolbarGroups: toolbarGroups,
                removeButtons: 'Link,Unlink,Anchor,Image,Flash,HorizontalRule,Iframe,About'
            });
        });
    });
</script>
