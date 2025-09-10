<form id="formEditUser" method="POST" action="{{ route('user.update', $user->id) }}" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    @method('PUT')  {{-- Method PUT untuk update --}}

    <div class="modal-body">
        {{-- Nama --}}
        <div class="form-group">
            <label class="col-lg-3 control-label text-right">Nama <span style="color:red">*</span>:</label>
            <div class="col-lg-8">
                <input required type="text" class="form-control" name="nama_user" value="{{ old('nama_user', $user->name) }}">
            </div>
        </div>

        {{-- Email --}}
        <div class="form-group">
            <label class="col-lg-3 control-label text-right">Email <span style="color:red">*</span>:</label>
            <div class="col-lg-8">
                <input required type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
            </div>
        </div>

        {{-- Role --}}
        <div class="form-group">
            <label class="col-lg-3 control-label text-right">Role <span style="color:red">*</span>:</label>
            <div class="col-lg-8">
                <select class="form-control" name="id_role" id="id_role" required>
                    <option value="1" {{ old('id_role', $user->id_role) == 1 ? 'selected' : '' }}>Admin Bagian</option>
                </select>
            </div>
        </div>

        {{-- Admin Bagian (Bidang) --}}
        <div class="form-group admin_bagian" style="{{ old('id_role', $user->id_role) == 1 ? '' : 'display:none' }}">
            <label class="col-lg-3 control-label text-right">Admin Bagian <span style="color:red">*</span>:</label>
            <div class="col-lg-8">
                <select class="form-control" name="id_bidang" id="id_bidang" {{ old('id_role', $user->id_role) == 1 ? 'required' : '' }}>
                    <option value="">-- Pilih Bidang --</option>
                    @foreach($bidang as $r)
                        <option value="{{ $r->id }}" {{ old('id_bidang', $user->id_bidang) == $r->id ? 'selected' : '' }}>
                            {{ $r->nama_bidang }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Username --}}
        <div class="form-group">
            <label class="col-lg-3 control-label text-right">Username <span style="color:red">*</span>:</label>
            <div class="col-lg-8">
                <input required type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}">
            </div>
        </div>

        {{-- Password --}}
        <div class="form-group">
            <label class="col-lg-3 control-label text-right">Password:</label>
            <div class="col-lg-8 input-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Kosongkan jika tidak diubah">
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Konfirmasi Password --}}
        <div class="form-group">
            <label class="col-lg-3 control-label text-right">Konfirmasi Password:</label>
            <div class="col-lg-8 input-group">
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Ulangi password jika mengubah">
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password_confirmation">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Instansi --}}
        <div class="form-group">
            <label class="col-lg-3 control-label text-right">Instansi <span style="color:red">*</span>:</label>
            <div class="col-lg-8">
                <input required type="text" class="form-control" name="instansi" value="{{ old('instansi', $user->instansi ?? '') }}">
            </div>
        </div>

        {{-- Jabatan --}}
        <div class="form-group">
            <label class="col-lg-3 control-label text-right">Jabatan:</label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="jabatan" value="{{ old('jabatan', $user->jabatan ?? '') }}">
            </div>
        </div>

        {{-- Telepon --}}
        <div class="form-group">
            <label class="col-lg-3 control-label text-right">Telepon:</label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="telephone" value="{{ old('telephone', $user->telephone ?? '') }}">
            </div>
        </div>

        {{-- Kepakaran --}}
        <div class="form-group">
            <label class="col-lg-3 control-label text-right">Kepakaran:</label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="kepakaran" value="{{ old('kepakaran', $user->kepakaran ?? '') }}">
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross"></i> Batal</button>
        <button type="submit" class="btn btn-primary"><i class="icon-check"></i> Simpan</button>
    </div>
</form>


<script>
    $(function() {
        // Validasi no telepon hanya angka
        const phoneInput = $('input[name="telephone"]');

        phoneInput.on('input', function() {
            const originalValue = $(this).val();
            const numericValue = originalValue.replace(/[^0-9]/g, '');

            if (originalValue !== numericValue) {
                $(this).val(numericValue);

                Swal.fire({
                    icon: 'warning',
                    title: 'Oops!',
                    text: 'No. Telepon hanya boleh berisi angka.',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                });
            }
        });

        // Toggle tampil/ sembunyikan admin bagian
        function toggleAdminBagian() {
            if ($("#id_role").val() === '1') {
                $(".admin_bagian").show();
                $("#id_bidang").prop('required', true);
            } else {
                $(".admin_bagian").hide();
                $("#id_bidang").prop('required', false).val('');
            }
        }
        toggleAdminBagian();
        $("#id_role").change(toggleAdminBagian);

        // Toggle show/hide password
        $('.toggle-password').click(function() {
            const target = $(this).data('target');
            const input = $('#' + target);
            const icon = $(this).find('i');

            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                input.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
</script>
