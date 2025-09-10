<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Tambah Data Evaluasi
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formTambahMasterRS" method="post" action="{{ route('simpan_kegiatan_evaluasi') }}" class="form-horizontal" enctype="multipart/form-data" >
                        <div class="modal-body">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>
                            <div class="form-group admin_bagian">
                                <label for="admin_bagian" style="text-align: right;" class="col-lg-3 control-label">
                                    Bidang : 
                                </label>
                                <div class="col-lg-8"> 
                                    <label class="form-control">{{$program_evaluasi->bidang->nama_bidang}}</label>
                                    <input type="hidden" name="id_bidang" id="id_bidang" value="{{$program_evaluasi->bidang->id}}">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Program :
                                </label>
                                <div class="col-lg-8">
                                    <label class="form-control">{{$program_evaluasi->uraian}}</label>
                                    <input type="hidden" name="id_program" id="id_program" value="{{$program_evaluasi->id}}">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="nama" style="text-align: right;" class="col-lg-3 control-label">
                                    Kegiatan :
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="uraian" id="uraian" required>
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
</script>