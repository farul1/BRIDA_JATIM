<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Sosial Media
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formTambahMasterRS" method="post" action="{{ route('simpan_program_evaluasi_ubah',$id) }}" class="form-horizontal" enctype="multipart/form-data" >
                    <div class="modal-body">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>
                            <div class="form-group admin_bagian">
                                <label for="admin_bagian" style="text-align: right;" class="col-lg-3 control-label">
                                    Bidang <span style="color:red"><b>*</b></span> : 
                                </label>
                                <div class="col-lg-8"> 
                                    <select class="form-control" id="id_bidang" name="id_bidang">
                                        @foreach($bidang as $r)
                                            @if($r->id == $program_evaluasi->id_bidang)
                                                <option selected="" value="{{$r->id}}">{{$r->nama_bidang}}</option>
                                            @else
                                                <option value="{{$r->id}}">{{$r->nama_bidang}}</option>
                                            @endif 
                                        @endforeach
                                    <select> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Program :
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" value="{{$program_evaluasi->uraian}}" name="uraian" id="uraian" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Indikator :
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="indikator" id="indikator" value="{{$program_evaluasi->indikator}}" required>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Target :
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" value="{{$program_evaluasi->target}}" name="target" id="target" required>
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


