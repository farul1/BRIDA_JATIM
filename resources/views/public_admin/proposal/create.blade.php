<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Tambah Proposal
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="frmTambahProposal" method="post" action="{{ route('simpan_proposal_data') }}" class="form-horizontal" enctype="multipart/form-data" >
                        <div class="modal-body">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>
                            <div class="form-group status_lengkap">
                                <label for="judul" style="text-align: right;" class="col-lg-3 control-label">
                                    Judul Proposal <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required="required" type="text" class="form-control" value="" name="judul_proposal" placeholder="Judul Proposal" id="judul_proposal" >
                                </div>
                            </div>
                            <div class="form-group status_lengkap">
                                <label for="kategori" style="text-align: right;" class="col-lg-3 control-label">
                                    Bidang <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <select required="required" onchange="div_judul('{{csrf_token()}}','#id_subbidang','#frmTambahProposal')" class="form-control" name="id_subbidang" id="id_subbidang">
                                        <option value="0">-- TAMPILKAN SEMUA --</option>
                                        @foreach($subbidang as $p)
                                        <option value="{{$p->id}}">{{$p->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group admin_bagian">
                                <label for="admin_bagian" style="text-align: right;" class="col-lg-3 control-label">
                                    Judul <span style="color:red"><b>*</b></span> : 
                                </label>
                                <div class="col-lg-8"> 
                                    <select name="judul_id" id="judul_id" data-placeholder="Judul" class="form-control select"> 
                                        <option value="0">-- PILIH JUDUL  --</option> 
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group status_lengkap">
                                <label for="kategori" style="text-align: right;" class="col-lg-3 control-label">
                                    Pilih Proposal <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                   <input type="file" required name="file_upload" id="file_upload" >
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


