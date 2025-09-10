@extends('index')
@section('tempat_content')

@php
    use Illuminate\Support\Str;
@endphp

<div class="row">
    <div class="col-md-12">
        {{-- Notifikasi berhasil --}}
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Notifikasi gagal --}}
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <!-- Panel Event -->
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Data Policy Brief</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div class="mb-3">
                    <button class="btn btn-primary btn-sm" onclick="tambah_data_policybrief('{{ csrf_token() }}','#modalPolicybrief')">
                        + Tambah Data
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>File</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($policyBriefs as $i => $pb)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $pb->judul }}</td>
                                <td>{{ Str::limit($pb->deskripsi, 50) }}</td>
                                <td>
                                    @if($pb->file)
                                        <a href="{{ asset('storage/'.$pb->file) }}" target="_blank" class="btn btn-sm btn-info">Lihat File</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($pb->gambar)
                                        <img src="{{ asset('storage/'.$pb->gambar) }}" width="60" class="img-thumbnail">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm" 
                                        onclick="ubah_data_policybrief('{{ csrf_token() }}', '{{ $pb->id }}','#modalPolicybrief')">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="hapus_data_policybrief('{{ csrf_token() }}', '{{ $pb->id }}')">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPolicybrief" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPolicybriefLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="modalPolicybriefIsi">
                <!-- form akan dimuat lewat ajax -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>

// Handle form submit untuk tambah dan edit
$(document).on('submit', '#formPolicybrief', function(e) {
    e.preventDefault();
    
    var formData = new FormData(this);
    var url = $(this).attr('action');
    var method = $(this).attr('method');
    
    $.ajax({
        url: url,
        type: method,
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.status === 'success') {
                $('#modalPolicybrief').modal('hide');
                Swal.fire('Berhasil!', response.message, 'success')
                    .then(() => location.reload());
            } else {
                Swal.fire('Error!', response.message, 'error');
            }
        },
        error: function(xhr) {
            Swal.fire('Error!', 'Terjadi kesalahan saat menyimpan data.', 'error');
        }
    });
});

// =============== DATA POLICYBRIEF START ===============
// Tambah Data
function tambah_data_policybrief(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Policy Brief');
    $(modal + 'Isi').html(loading);

    $.get('/admin/policybrief/create', function (data) {
        $(modal + 'Isi').html(data);
    }).fail(() => {
        $(modal + 'Isi').html('<div class="alert alert-danger">Gagal memuat form.</div>');
    });
}

// Ubah Data
function ubah_data_policybrief(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Policy Brief');
    $(modal + 'Isi').html(loading);

    $.get('/admin/policybrief/edit/' + id, function (data) {
        $(modal + 'Isi').html(data);
    }).fail(() => {
        $(modal + 'Isi').html('<div class="alert alert-danger">Gagal memuat form.</div>');
    });
}

// Hapus Data
function hapus_data_policybrief(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/policybrief/delete/' + id,   // ✅ Sesuai route
                type: 'POST',
                data: {
                    _token: token,
                    _method: 'DELETE'
                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire('Dihapus!', response.message, 'success')
                            .then(() => location.reload());
                    } else {
                        Swal.fire('Error!', response.message, 'error');
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                }
            });
        }
    });
}

// =============== DATA POLICYBRIEF END ===============
</script>
@endsection
