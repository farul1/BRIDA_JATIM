<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Kategori BRIDA
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                <form id="formTambahMasterRS" method="POST" action="{{ route('brida_kategori.update', $bridaKategori->id) }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="form-group status_lengkap">
                                <label for="nama_kategori" style="text-align: right;" class="col-lg-3 control-label">
                                    Nama Kategori <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required type="text" class="form-control" value="{{ old('nama_kategori', $bridaKategori->nama_kategori) }}" name="nama_kategori" id="nama_kategori" >
                                    @error('nama_kategori')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group status_lengkap">
                                <label for="link" style="text-align: right;" class="col-lg-3 control-label">
                                    Link :
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" value="{{ old('link', $bridaKategori->link) }}" name="link" id="link" >
                                    <span style="color:red">Contoh : https://balitbang.jatimprov.go.id/</span>
                                    @error('link')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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
                uiColor : '#b2cefe ',
                toolbarGroups,
                removeButtons : 'Link,Unlink,Anchor,Image,Flash,HorizontalRule,Iframe,About'
            });
        });
    });
</script>
