<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Tambah Galeri Foto
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formTambahMasterRS" method="post" action="{{ route('simpan_foto') }}" class="form-horizontal" enctype="multipart/form-data" >
                        <div class="modal-body">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>
                            <div class="form-group">
                                <label for="galeri" style="text-align: right;" class="col-lg-3 control-label">
                                    Kategori <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <select required="required" class="form-control" name="galeri" id="galeri">
                                        @foreach($galeri as $p)
                                        <option value="{{$p->id}}">{{$p->judul}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="judul" style="text-align: right;" class="col-lg-3 control-label">
                                    Judul <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required="required" type="text" class="form-control" value="" name="judul" id="judul" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="link" style="text-align: right;" class="col-lg-3 control-label">
                                    Deskripsi <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <textarea name="deskripsi"></textarea>
                                    <script>
                                            CKEDITOR.replace( 'deskripsi' );
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file" style="text-align: right;" class="col-lg-3 control-label">
                                    Gambar <span style="color:red"><b>*</b></span> :
                                </label>
                                <div class="col-lg-8">
                                    <input required="required" type="file" accept=".jpeg, .jpg, .png" class="form-control" value="" name="file" id="file" >
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


