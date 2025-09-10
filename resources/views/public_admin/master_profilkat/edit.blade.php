<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Edit Profil Kategori
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formEditProfilKat" method="post" action="{{ route('simpan_profilkat_ubah', $profilkat->id) }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <!-- Nama Kategori -->
                            <div class="form-group status_lengkap">
                                <label for="nama_kategori" class="col-lg-3 control-label">
                                    Nama Kategori <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="{{ $profilkat->nama_kategori }}" required>
                                </div>
                            </div>

                            <!-- Link -->
                            <div class="form-group status_lengkap">
                                <label for="link" class="col-lg-3 control-label">
                                    Link :
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="link" id="link" value="{{ $profilkat->link }}">
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group status_lengkap">
                                <label for="status" class="col-lg-3 control-label">
                                    Status <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <select name="status" class="form-control" id="status" required>
                                        <option value="1" {{ $profilkat->status == 1 ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ $profilkat->status == 0 ? 'selected' : '' }}>Non-Aktif</option>
                                    </select>
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
