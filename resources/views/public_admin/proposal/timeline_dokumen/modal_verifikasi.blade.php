@php  
$setuju = '';
if($revisi->status !== 0){
    $setuju = 'checked';
}
@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Verifikasi
                    </a>
                </li> 
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi"> 
                    <form method="post" action="{{ route('simpan_verifikasi_proposal', $id_revisi) }}" class="form-horizontal"  enctype="multipart/form-data" >
                        <div class="modal-body">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div> 
                            <input type="hidden" name="redirect_to" value="list_beli_belum_verifikasi">
                            <div class="form-group status_lengkap">
                                <label style="text-align: right;" class="col-lg-4 control-label">
                                    Setuju / Tidak Setuju : 
                                </label>
                                <div class="col-lg-7"> 
                                    <div class="onoffswitch">
                                        <input  type="checkbox" class="onoffswitch-checkbox"
                                        name="setuju" id="setuju_{{$revisi->id}}">
                                        <label class="onoffswitch-label" for="setuju_{{$revisi->id}}">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 

                            <div class="form-group status_lengkap">
                                <label style="text-align: right;" class="col-lg-4 control-label">
                                    File : 
                                </label>
                                <div class="col-lg-7"> 
                                    <input type="file" name="file_verifikasi" id="file_verifikasi" class="form-control">
                                </div>
                            </div> 
                            

                            <div class="form-group status_lengkap">
                                <label style="text-align: right;" class="col-lg-4 control-label">
                                    Keterangan : 
                                </label>
                                <div class="col-lg-7"> 
                                    <textarea required="required" name="keterangan" id="keterangan_{{$revisi->id}}" placeholder="Keterangan Tambahan" class="form-control summernote" rows="4"></textarea>
                                </div>
                            </div> 
                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
                            <button type="submit" class="btn btn-primary"><i class="icon-check"></i> Simpan</button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div> 