<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">Ubah Bidang</a>
                </li> 
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi"> 
                    <form id="formEditBidang" method="POST" action="{{ route('bidang.update', $bidang->id) }}" class="form-horizontal">
                    @csrf
                    @method('PUT')

                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="nama_bidang" class="col-lg-3 control-label text-right">
                                    Nama Bidang <span style="color:red">*</span> :
                                </label>
                                <div class="col-lg-8"> 
                                    <input required type="text" class="form-control" name="nama_bidang" id="nama_bidang" value="{{ old('nama_bidang', $bidang->nama_bidang) }}">
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
        // Inisialisasi CKEditor jika ada textarea dengan class summernote
        $('.summernote').each(function() { 
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
                { name: 'colors', groups: [ 'colors' ] }
            ];

            CKEDITOR.replace(this.id, {  
                uiColor: '#b2cefe',
                toolbarGroups: toolbarGroups,
                removeButtons: 'Link,Unlink,Anchor,Image,Flash,HorizontalRule,Iframe,About'
            }); 
        });
    });
</script>
