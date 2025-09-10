@extends('index')

@section('tempat_content')
<style>
.image-thumb > img:hover {
  width: 500px;
  height: 200px;
}    
</style>

<div class="row">

    <div class="col-md-12">
        {{-- Alert Success --}}
        @if (session('status'))
            <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                <span class="text-semibold">Berhasil! </span> {{ session('status') }}
            </div>
        @endif

        {{-- Alert Warning --}}
        @if (session('statusT'))
            <div class="alert alert-warning alert-styled-left">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">Gagal!<br></span> {{ session('statusT') }}
            </div>
        @endif
    </div>

    <div class="col-lg-12">

        <!-- Panel Bidang -->
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Data Bidang</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div>
                    <button class="btn btn-info" onclick="tambah_data_bidang('#ModalBiruSm')">
                        Tambah Data <i class="icon-plus3 position-right"></i>
                    </button>
                </div>
                <br>

                <table class="table table-bordered table-hover datatable-basic">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama Bidang</th>
                            <th style="width: 120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bidang as $index => $r)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $r->nama_bidang }}</td>
                            <td>
                                <div class="btn-group btn-block btn-group-velocity">
                                    <button type="button" class="btn bg-blue btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <i class="glyphicon glyphicon-th-list"></i> Aksi <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button type="button" onclick="ubah_data_bidang('{{ $r->id }}', '#ModalTealSm')" class="btn bg-teal-400 btn-xs btn-block">
                                                <i class="glyphicon glyphicon-edit"></i> Ubah
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" onclick="hapus_data_bidang('{{ $r->id }}')" class="btn btn-danger btn-xs btn-block">
                                                <i class="glyphicon glyphicon-remove"></i> Hapus
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /Panel Bidang -->

    </div>
</div>
<!-- /main charts -->

{{-- Modal Tambah --}}
<div id="ModalBiruSm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalBiruSmLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalBiruSmLabel"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="ModalBiruSmIsi"></div>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div id="ModalTealSm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalTealSmLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTealSmLabel"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="ModalTealSmIsi"></div>
        </div>
    </div>
</div>

<script>

    // --- Tambah Data Bidang ---
    function tambah_data_bidang(modal) {
        $(modal).modal('show');
        $(modal + 'Label').html('Tambah Data Bidang');
        $(modal + 'Isi').html(loading);
        $.get('{{ route("bidang.create") }}', function(data) {
            $(modal + 'Isi').html(data);
        });
    }

    // --- Ubah Data Bidang ---

function ubah_data_bidang(id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Bidang');
    $(modal + 'Isi').html(loading);

    $.get("{{ route('bidang.edit', ':id') }}".replace(':id', id), function(data) {
        $(modal + 'Isi').html(data);
    }).fail(function() {
        $(modal + 'Isi').html('<div class="text-center text-danger">Gagal memuat data!</div>');
    });
}


    // --- Hapus Data Bidang ---
   function hapus_data_bidang(id) {
    Swal.fire({
        title: "Yakin Ingin Menghapus Data?",
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF5722",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Tidak!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ route('bidang.destroy', ':id') }}".replace(':id', id),
                type: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function(response) {
                    Swal.fire("Dihapus!", response.message || "Data berhasil dihapus.", "success")
                        .then(() => location.reload());
                },
                error: function(xhr) {
                    Swal.fire("Gagal!", xhr.responseJSON?.message || "Terjadi kesalahan saat menghapus data.", "error");
                }
            });
        }
    });
}


</script>
@endsection
