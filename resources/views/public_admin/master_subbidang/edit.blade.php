<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Sub Bidang
                    </a>
                </li> 
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi"> 
                    <form id="formUbahSubbidang" method="POST" action="{{ route('simpan_subbidang_ubah', $subbidang->id) }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <!-- Nama Sub Bidang -->
                            <div class="form-group status_lengkap">
                                <label for="nama" class="col-lg-3 control-label" style="text-align: right;">
                                    Nama <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8"> 
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $subbidang->nama }}" required>
                                </div>
                            </div> 

                            <!-- Pilih Bidang -->
                            <div class="form-group admin_bagian">
                                <label for="id_bidang" class="col-lg-3 control-label" style="text-align: right;">
                                    Bidang <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8"> 
                                    <select class="form-control" id="id_bidang" name="id_bidang" required>
                                        @foreach($bidang as $r)
                                            <option value="{{ $r->id }}" {{ $r->id == $subbidang->id_bidang ? 'selected' : '' }}>
                                                {{ $r->nama_bidang }}
                                            </option>
                                        @endforeach
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
    $(document).ready(function() {
        $('.select22').select2();

        // CKEditor / Summernote
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
            CKEDITOR.replace(this.id, {  
                uiColor : '#b2cefe',
                toolbarGroups: toolbarGroups,
                removeButtons : 'Link,Unlink,Anchor,Image,Flash,HorizontalRule,Iframe,About'  
            }); 
        }); 
    });
</script>
