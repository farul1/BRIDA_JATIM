<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">
                        Ubah Link Terkait
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form method="post" action="{{ route('simpan_linkterkait_ubah', $link->id) }}"
                          class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                                @method('PUT')

                        <div class="modal-body">

                            {{-- NAMA --}}
                            <div class="form-group">
                                <label for="nama" class="col-lg-3 control-label">Nama :</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                           name="nama" id="nama" value="{{ old('nama', $link->name) }}">
                                    @error('nama')
                                        <span class="text-danger small mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- LINK --}}
                            <div class="form-group">
                                <label for="link" class="col-lg-3 control-label">Link :</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control @error('link') is-invalid @enderror"
                                           name="link" id="link" value="{{ old('link', $link->link) }}">
                                    @error('link')
                                        <span class="text-danger small mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- GAMBAR LOGO --}}
                            <div class="form-group">
                                <label for="gambar_logo" class="col-lg-3 control-label">Gambar Logo :</label>
                                <div class="col-lg-8">
                                    <input type="file" class="form-control @error('gambar_logo') is-invalid @enderror"
                                           name="gambar_logo" id="gambar_logo">
                                    @error('gambar_logo')
                                        <span class="text-danger small mt-1">{{ $message }}</span>
                                    @enderror

                                    {{-- Tampilkan gambar sebelumnya --}}
                                    @if ($link->gambar_logo)
                                        <div class="mt-2">
                                            <img src="{{ asset('file_upload/link_terkait/' . $link->gambar_logo) }}"
                                                 alt="Logo Sebelumnya" style="max-height: 60px;">
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="icon-cross"></i> Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
