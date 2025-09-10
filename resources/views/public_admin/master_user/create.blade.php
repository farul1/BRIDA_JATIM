<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

<form class="form-horizontal" method="POST" action="{{ route('user.store') }}">
    @csrf

    {{-- Nama --}}
    <div class="form-group row">
        <label for="nama" class="col-lg-3 col-form-label text-right">Nama <span class="text-danger">*</span> :</label>
        <div class="col-lg-8">
            <input required type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    {{-- Instansi --}}
    <div class="form-group row">
        <label for="instansi" class="col-lg-3 col-form-label text-right">Instansi <span class="text-danger">*</span> :</label>
        <div class="col-lg-8">
            <input required type="text" class="form-control" id="instansi" name="instansi" placeholder="Masukkan Instansi" value="{{ old('instansi') }}">
            @error('instansi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    {{-- Jabatan --}}
    <div class="form-group row">
        <label for="jabatan" class="col-lg-3 col-form-label text-right">Jabatan <span class="text-danger">*</span> :</label>
        <div class="col-lg-8">
            <input required type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" value="{{ old('jabatan') }}">
            @error('jabatan')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    {{-- No. Telepon --}}
    <div class="form-group row">
        <label for="telephone" class="col-lg-3 col-form-label text-right">No. Telepon <span class="text-danger">*</span> :</label>
        <div class="col-lg-8">
            <input required type="text" class="form-control" id="telephone" name="telephone" placeholder="Masukkan Nomor Telepon" value="{{ old('telephone') }}">
            @error('telephone')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    {{-- Kepakaran --}}
    <div class="form-group row">
        <label for="kepakaran" class="col-lg-3 col-form-label text-right">Kepakaran <span class="text-danger">*</span> :</label>
        <div class="col-lg-8">
            <input required type="text" class="form-control" id="kepakaran" name="kepakaran" placeholder="Masukkan Kepakaran" value="{{ old('kepakaran') }}">
            @error('kepakaran')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    {{-- Username --}}
    <div class="form-group row">
        <label for="username" class="col-lg-3 col-form-label text-right">Username <span class="text-danger">*</span> :</label>
        <div class="col-lg-8">
            <input required type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="{{ old('username') }}">
            @error('username')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    {{-- Email --}}
    <div class="form-group row">
        <label for="email" class="col-lg-3 col-form-label text-right">Email <span class="text-danger">*</span> :</label>
        <div class="col-lg-8">
            <input required type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    {{-- Role --}}
    <div class="form-group row">
        <label for="id_role" class="col-lg-3 col-form-label text-right">Role <span class="text-danger">*</span> :</label>
        <div class="col-lg-8">
            <select required class="form-control" id="id_role" name="id_role">
                <option value="">-- Pilih Role --</option>
                <option value="1" {{ old('id_role') == 1 ? 'selected' : '' }}>Admin Bagian</option>
            </select>
            @error('id_role')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    {{-- Admin Bagian (Bidang) --}}
    <div class="form-group row admin_bagian" style="display: none;">
        <label for="id_bidang" class="col-lg-3 col-form-label text-right">Admin Bagian <span class="text-danger">*</span> :</label>
        <div class="col-lg-8">
            <select class="form-control" id="id_bidang" name="id_bidang">
                <option value="">-- Pilih Bidang --</option>
                @foreach($bidang as $r)
                    <option value="{{ $r->id }}" {{ old('id_bidang') == $r->id ? 'selected' : '' }}>
                        {{ $r->nama_bidang }}
                    </option>
                @endforeach
            </select>
            @error('id_bidang')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    {{-- Password --}}
    <div class="form-group row">
        <label for="password" class="col-lg-3 col-form-label text-right">Password <span class="text-danger">*</span> :</label>
        <div class="col-lg-8 input-group">
            <input required type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
                    <i class="fa fa-eye"></i>
                </button>
            </div>
        </div>
        @error('password')
            <small class="text-danger ml-3">{{ $message }}</small>
        @enderror
    </div>

    {{-- Ulangi Password --}}
    <div class="form-group row">
        <label for="password_confirmation" class="col-lg-3 col-form-label text-right">Ulangi Password <span class="text-danger">*</span> :</label>
        <div class="col-lg-8 input-group">
            <input required type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi Password">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password_confirmation">
                    <i class="fa fa-eye"></i>
                </button>
            </div>
        </div>
    </div>

    {{-- Tombol Submit --}}
    <div class="form-group row">
        <div class="col-lg-8 offset-lg-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url('master_user') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</form>

<!-- jQuery (pastikan ada sebelum script toggle password) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Validasi input nomor telepon hanya angka
    const phoneInput = document.getElementById('telephone');

    phoneInput.addEventListener('input', function() {
        const originalValue = this.value;
        const numericValue = originalValue.replace(/[^0-9]/g, '');

        if (originalValue !== numericValue) {
            this.value = numericValue;

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
</script>

<script>
    // Toggle tombol show/hide password
    $(document).ready(function () {
        $('.toggle-password').on('click', function() {
            const targetId = $(this).data('target');
            const input = $('#' + targetId);
            const icon = $(this).find('i');

            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                input.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });

        // Toggle tampilan admin bagian berdasarkan role
        function toggleAdminBagian() {
            if ($('#id_role').val() == '1') {
                $('.admin_bagian').show();
                $('#id_bidang').prop('required', true);
            } else {
                $('.admin_bagian').hide();
                $('#id_bidang').prop('required', false).val('');
            }
        }

        toggleAdminBagian();
        $('#id_role').change(toggleAdminBagian);
    });
</script>
