<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Aksi
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formTambahMasterRS" method="post" action="{{ route('simpan_aksi_evaluasi_ubah',$id) }}" class="form-horizontal" enctype="multipart/form-data" >
                        <div class="modal-body">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>
                            <div class="form-group admin_bagian">
                                <label for="admin_bagian" style="text-align: right;" class="col-lg-3 control-label">
                                    Bidang : 
                                </label>
                                <div class="col-lg-8"> 
                                    <label class="form-control">{{$indikator_evaluasi->kegiatan_evaluasi->program->bidang->nama_bidang}}</label>
                                    <input type="hidden" name="id_bidang" id="id_bidang" value="{{$indikator_evaluasi->kegiatan_evaluasi->program->bidang->id}}">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Program :
                                </label>
                                <div class="col-lg-8">
                                    <label class="form-control">{{$indikator_evaluasi->kegiatan_evaluasi->program->uraian}}</label>
                                    <input type="hidden" name="id_program" id="id_program" value="{{$indikator_evaluasi->kegiatan_evaluasi->program->id}}">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Kegiatan :
                                </label>
                                <div class="col-lg-8">
                                    <label class="form-control">{{$indikator_evaluasi->kegiatan_evaluasi->uraian}}</label>
                                    <input type="hidden" name="id_kegiatan" id="id_kegiatan" value="{{$indikator_evaluasi->kegiatan_evaluasi->id}}">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Indikator :
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" readonly value="{{$indikator_evaluasi->id}}" name="id_indikator" id="id_indikator" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Target :
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" readonly value="{{$indikator_evaluasi->target}}" name="target" id="target" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Aksi :
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" value="{{$aksi_evaluasi->uraian}}" name="aksi" id="aksi" required>
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


