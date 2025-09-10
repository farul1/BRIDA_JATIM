<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Data Judul
                    </a>
                </li> 
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi"> 
                    <form id="frmEditJudul" method="post" action="{{ route('simpan_judul_ubah',$judul->id) }}" class="form-horizontal" enctype="multipart/form-data" data-id-subbidang="{{ $judul->id_subbidang }}">

                        <div class="modal-body">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>  
                            <div class="form-group status_lengkap">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Judul <span style="color:red"><b>*</b></span> : 
                                </label>
                                <div class="col-lg-8"> 
                                    <input required="required" type="text" class="form-control" value="{{$judul->judul}}" name="judul" id="judul" >  
                                </div>
                            </div> 
                            <div class="form-group admin_bagian">
                                <label for="admin_bagian" style="text-align: right;" class="col-lg-3 control-label">
                                    Kategori Bidang <span style="color:red"><b>*</b></span> : 
                                </label>
                                <div class="col-lg-8"> 
                                    <select class="form-control" onchange="div_subbidang('{{csrf_token()}}','#id_bidang','#frmEditJudul')"  id="id_bidang" name="id_bidang">
                                        @foreach($bidang as $r)
                                            @if($r->id == $judul->id_bidang)
                                                <option selected="" value="{{$r->id}}">{{$r->nama_bidang}}</option>
                                            @else
                                                <option value="{{$r->id}}">{{$r->nama_bidang}}</option>
                                            @endif 
                                        @endforeach
                                    <select> 
                                </div>
                            </div> 
                            
                            <div class="form-group admin_bagian">
                                <label for="admin_bagian" style="text-align: right;" class="col-lg-3 control-label">
                                    Kategori Sub Bidang <span style="color:red"><b>*</b></span> : 
                                </label>
                                <div class="col-lg-8"> 
                                    <select name="sub_bidang_id" disabled id="sub_bidang_id" data-placeholder="Jenis Ciptaan" class="form-control select"> 
                                        <option value="0">-- PILIH SUB JENIS  --</option> 
                                    </select>
                                </div>
                            </div> 
                            
                            <div class="form-group status_lengkap">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Uraian <span style="color:red"><b>*</b></span> : 
                                </label>
                                <div class="col-lg-8"> 
                                    <textarea required="required" type="text" class="form-control summernote" value="" name="uraian" id="textarea" > {!! $judul->uraian !!} </textarea>  
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