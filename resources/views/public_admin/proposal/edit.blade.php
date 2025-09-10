<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Detail Proposal
                    </a>
                </li> 
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi"> 
                    <form id="formEditProposal" method="post" action="{{ route('simpan_proposal_data_ubah',$id) }}" class="form-horizontal" enctype="multipart/form-data" >
                        <div class="modal-body">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>

                            <div class="form-group status_lengkap">
                                <label for="judul" style="text-align: right;" class="col-lg-3 control-label">
                                </label>
                                <div class="col-lg-8">
                                    
                                    <table width="100%">
                                        <tr>
                                            <td style="font-weight:bold;">Judul</td> 
                                            <td> :</td>
                                            <td> {{$proposal->judul_proposal}} </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Bidang yg diajukan</td> 
                                            <td> :</td>
                                            <td> {{$proposal->subbidang->nama}} </td>
                                        </tr> 
                                        <tr>
                                            <td style="font-weight:bold">User Pengupload</td> 
                                            <td> : </td>
                                            <td> {{$proposal->users->name}} </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Judul dalam bidang</td>
                                            <td> :</td>
                                            <td> {{$proposal->judul->judul}} </td>
                                        </tr> 
                                    <table> 
                                </div>
                            </div>
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