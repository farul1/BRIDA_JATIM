<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Background Menu
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <!-- Form Edit Background Menu -->
<form id="formUbahBgMenu" method="POST" action="{{ route('simpan_bgmenu_ubah', $bg->id) }}" 
      class="form-horizontal" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label class="col-lg-3 control-label">Menu :</label>
            <div class="col-lg-8">
                <input type="text" class="form-control" value="{{ $bg->menu }}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">File :</label>
            <div class="col-lg-8">
                <input type="file" class="form-control" name="file" accept=".jpeg,.jpg,.png">
                @if($bg->gambar)
                <img src="{{ asset('file_upload/bg/'.$bg->gambar) }}" alt="Preview Gambar" 
                     style="width:30%; margin-top:10px;">
                @endif
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

<!-- Optional: Inisialisasi CKEditor / Summernote jika ada -->
<script type="text/javascript">
$(function () {
    $('.summernote').each(function(){
        CKEDITOR.replace(this.id, {
            uiColor: '#b2cefe',
            removeButtons: 'Link,Unlink,Anchor,Image,Flash,HorizontalRule,Iframe,About'
        });
    });

    // Jika menggunakan Select2
    $('.select22').select2();
});
</script>

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
