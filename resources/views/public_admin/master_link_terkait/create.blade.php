<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Tambah Link Terkait
                    </a>
                </li>
            </ul>

            

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">

                    {{-- FORM TAMBAH LINK TERKAIT --}}
                    <form id="formTambahMasterRS" method="post" action="{{ route('simpan_linkterkait') }}"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-body">

                            {{-- 🔴 Tampilkan semua error validasi jika ada --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Oops!</strong> Ada kesalahan pada input Anda:<br>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- 🔵 Input: Nama --}}
                            <div class="form-group">
                                <label for="nama" class="col-lg-3 control-label">Nama :</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" value="{{ old('nama') }}" required>

                                    @error('nama')
                                        <span class="text-danger small mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- 🔵 Input: Link --}}
                            <div class="form-group">
                                <label for="link" class="col-lg-3 control-label">Link :</label>
                                <div class="col-lg-8">
                                    <input type="url" class="form-control @error('link') is-invalid @enderror"
                                        name="link" value="{{ old('link') }}" required>

                                    @error('link')
                                        <span class="text-danger small mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- 🔵 Input: Gambar Logo --}}
                            <div class="form-group">
                                <label for="gambar_logo" class="col-lg-3 control-label">Gambar Logo :</label>
                                <div class="col-lg-8">
                                    <input type="file" class="form-control @error('gambar_logo') is-invalid @enderror"
                                        name="gambar_logo" accept=".jpg,.jpeg,.png,.svg">

                                    @error('gambar_logo')
                                        <span class="text-danger small mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        {{-- 🔘 Tombol Aksi --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="icon-cross"></i> Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check"></i> Simpan
                            </button>
                        </div>
                    </form>
                    {{-- END FORM --}}
                </div>
            </div>
        </div>
    </div>
</div>
