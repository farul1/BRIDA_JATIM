<div class="row">
    <div class="col-lg-12">
        <form id="formTambahMasterRS" method="post" action="{{ route('brida_data.store') }}" class="form-horizontal" enctype="multipart/form-data" >
            <div class="modal-body">
                <div class="form-group">
                    {{ csrf_field() }}
                    <div class="alert alert-warning">
                    <strong>Disclaimer:</strong>
                    Silakan isi <b>Judul</b> dan <b>Keterangan</b> sesuai data yang benar.
                    Untuk kolom lain yang tidak ditampilkan pada sistem, cukup diisi dengan tanda <b>-</b>.
                </div>

                </div>
                <div class="form-group admin_bagian">
                    <label for="admin_bagian" style="text-align: right;" class="col-lg-3 control-label">
                        Nama Kategori <span style="color:red"><b>*</b></span> :
                    </label>
                    <div class="col-lg-8">
                    <select class="form-control" id="id_kategori" name="id_kategori">
                        @foreach($bridaKategori as $r)
                            <option value="{{$r->id}}">{{$r->nama_kategori}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group status_lengkap">
                    <label for="judul" style="text-align: right;" class="col-lg-3 control-label">
                        Judul <span style="color:red"><b>*</b></span> :
                    </label>
                    <div class="col-lg-8">
                        <input required="required" type="text" class="form-control" value="" name="judul" id="judul" >
                    </div>
                </div>
                <div class="form-group status_lengkap">
                    <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                        Nama <span style="color:red"><b>*</b></span> :
                    </label>
                    <div class="col-lg-8">
                        <input required="required" type="text" class="form-control" value="" name="nama" id="nama" >
                    </div>
                </div>
                <div class="form-group status_lengkap">
                    <label for="keterangan" style="text-align: right;" class="col-lg-3 control-label">
                        Keterangan <span style="color:red"><b>*</b></span> :
                    </label>
                    <div class="col-lg-8">
                        <input required="required" type="text" class="form-control" value="" name="keterangan" id="keterangan" >
                    </div>
                </div>
                <div class="form-group status_lengkap">
                    <label for="description" style="text-align: right;" class="col-lg-3 control-label">
                        Deskripsi <span style="color:red"><b>*</b></span> :
                    </label>
                    <div class="col-lg-8">
                        <textarea required="required" type="text" class="form-control summernote" value="" name="description" id="description" ></textarea>
                    </div>
                </div>
                <div class="form-group status_lengkap">
                    <label for="file_upload" style="text-align: right;" class="col-lg-3 control-label">
                        File <span style="color:red"><b>*</b></span> :
                    </label>
                    <div class="col-lg-8">
                        <input type="file" class="form-control" value="" name="file_upload" id="file_upload" accept=".xls,.xlsx,.doc,.docx,.pdf" >
                    </div>
                </div>
                <div class="form-group status_lengkap">
                    <label for="file_upload_gambar" style="text-align: right;" class="col-lg-3 control-label">
                        Gambar <span style="color:red"><b>*</b></span> :
                    </label>
                    <div class="col-lg-8">
                        <input type="file" accept=".jpg,.png,.jpeg" class="form-control" value="" name="file_upload_gambar" id="file_upload_gambar" >
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
