@if(Auth::check() && Auth::user()->isAsn())
    <div class="modal fade" id="akunModal" tabindex="-1" role="dialog" aria-labelledby="akunModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-body">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="akunModalLabel">Pengaturan Akun: Ubah Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form id="form-password" action="#" method="post" class="mb-0">
                        @csrf
                        <div class="modal-body">
                            <div class="row form-group has-feedback">
                                <div class="col">
                                    <label for="nip">NIP:</label>
                                    <input id="nip" type="text" class="form-control"
                                           value="{{Auth::user()->username}}" readonly>
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="top:32px"></span>
                                </div>
                            </div>

                            <div id="error_curr_pass" class="row form-group has-feedback">
                                <div class="col">
                                    <label for="check_password">Password Lama:</label>
                                    <input placeholder="Masukkan password lama Anda"
                                           id="check_password" type="password" class="form-control"
                                           name="password" minlength="6" required autofocus>
                                    <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                          style="pointer-events: all;cursor: pointer;top:32px"></span>
                                    <span class="invalid-feedback">
                                            <strong class="aj_pass" style="text-transform: none"></strong>
                                        </span>
                                </div>
                            </div>

                            <div id="error_new_pass" class="row has-feedback mb-2">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="password">Password Baru:</label>
                                    <input placeholder="Masukkan password baru Anda"
                                           id="password" type="password" class="form-control"
                                           name="new_password" minlength="6" required>
                                    <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                          style="pointer-events: all;cursor: pointer;top:32px"></span>
                                    @if($errors->has('new_password'))
                                        <span class="invalid-feedback">
                                                <strong>{{ $errors->first('new_password') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="password-confirm">Konfirmasi Password:</label>
                                    <input placeholder="Ketik ulang password baru Anda"
                                           id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" minlength="6" required
                                           onkeyup="return checkPassword()">
                                    <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                          style="pointer-events: all;cursor: pointer;top:32px"></span>
                                    <span class="invalid-feedback">
                                            <strong class="aj_new_pass"
                                                    style="text-transform: none"></strong>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer p-0">
                            <button type="submit" class="btn btn-primary btn-block ls2 m-0"
                                    style="border-radius: 0 0 2px 2px">SIMPAN PERUBAHAN
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="modal fade" id="downloadModal" tabindex="-1" role="dialog" aria-labelledby="downloadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="downloadModalLabel">Form Unduh File</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form id="form-download" class="mb-0" action="#">
                    @csrf
                    <div class="modal-body">
                        <div class="row form-group has-feedback">
                            <div class="col">
                                <label for="nama_file_d">Nama File:</label>
                                <input id="nama_file_d" name="nama_file" type="text" class="form-control" readonly>
                                <span class="icon-file form-control-feedback"
                                      style="top:32px"></span>
                            </div>
                        </div>
                        <div class="row form-group has-feedback">
                            <div class="col">
                                <label for="nama_d">Nama Lengkap:</label>
                                <input id="nama_d" name="nama" type="text" class="form-control" required
                                       placeholder="Nama lengkap" value="{{Auth::check() ? Auth::user()->name : null}}">
                                <span class="icon-user form-control-feedback" style="top:32px"></span>
                            </div>
                            <div class="col">
                                <label for="email_d">Email:</label>
                                <input id="email_d" name="email" type="email" class="form-control" placeholder="Email"
                                       value="{{Auth::check() ? Auth::user()->email : null}}" required>
                                <span class="icon-envelope form-control-feedback" style="top:32px"></span>
                            </div>
                        </div>
                        <div class="row form-group has-feedback">
                            <div class="col">
                                <label for="telp_d">Nomor Telepon:</label>
                                <input id="telp_d" name="telp" type="text" class="form-control" required
                                       placeholder="Nomor telepon" onkeypress="return numberOnly(event, false)">
                                <span class="icon-phone form-control-feedback" style="top:32px"></span>
                            </div>
                            <div class="col">
                                <label for="intansi_d">Nama Instansi:</label>
                                <input id="intansi_d" name="instansi" type="text" class="form-control"
                                       placeholder="Nama Instansi" required>
                                <span class="icon-building form-control-feedback" style="top:32px"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-0">
                        <button type="submit" class="btn btn-primary btn-block ls2 m-0"
                                style="border-radius: 0 0 2px 2px">UNDUH SEKARANG
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
