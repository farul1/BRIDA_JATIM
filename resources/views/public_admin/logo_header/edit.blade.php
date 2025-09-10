<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Logo Header
                    </a>
                </li> 
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi"> 
<form id="frmEditLogo" method="POST" action="{{ route('simpan_logo_header_ubah', $logo->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="form-group row">
            <label for="file_upload" class="col-lg-3 col-form-label text-right">
                File <span class="text-danger">*</span>:
            </label>
            <div class="col-lg-8">
                <input type="file" name="file_upload" id="file_upload" class="form-control" 
                       accept=".jpg,.jpeg,.png,.svg" required>
                <small class="form-text text-muted">
                    Maksimal ukuran file: 50 MB. Format: jpg, jpeg, png, svg.
                </small>
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
        //CKEditor
        // CKEDITOR.replace('ckeditors');
        // CKEDITOR.config.height = 300;  
        $('.summernote').each(function(e){ 
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
                uiColor : '#b2cefe ',
                toolbarGroups,
                removeButtons : 'Link,Unlink,Anchor,Image,Flash,HorizontalRule,Iframe,About'  

            }); 
        }); 
    });
</script>