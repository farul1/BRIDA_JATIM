@extends('index')
@section('tempat_content')

<!-- Styles -->
<style>
.image-thumb > img:hover {
  width: 500px;
  height: 200px;
}
</style>

<div class="row">

    <div class="col-md-12">
        @if (session()->has('status'))
        <script type="text/javascript">
            alertKu('success', "{{ session()->get('status') }}");
        </script>
        <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
            <button type="button" class="close" data-dismiss="alert">
                <span>×</span>
                <span class="sr-only">Close</span>
            </button>
            <span class="text-semibold">Berhasil! </span> {{ session()->get('status') }}
        </div>
        @endif

        @if (session()->has('statusT'))
        <div class="alert alert-warning alert-styled-left">
            <button type="button" class="close" data-dismiss="alert">
                <span>×</span>
                <span class="sr-only">Close</span>
            </button>
            <span class="text-semibold">Gagal!<br></span> {{ session()->get('statusT') }}
        </div>
        @endif
    </div>

    <div class="col-lg-12">

        <!-- Panel Background Menu -->
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Data Background</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable-basic">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Menu</th>
                                <th>Gambar</th>
                                <th style="width: 50px !important">Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bg as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->menu }}</td>
                                <td>
                                    <img src="{{ asset('file_upload/bg/'.$item->gambar) }}" alt="{{ $item->menu }}" style="width:30%;">
                                </td>
                                <td>
                                    <button type="button" 
                                            onclick="ubah_data_bgmenu('{{ csrf_token() }}', '{{ $item->id }}', '#ModalTealSm')" 
                                            class="btn bg-teal-400 btn-xs btn-block" 
                                            title="Ubah Gambar">
                                        <i class="glyphicon glyphicon-edit"></i> Ubah Gambar
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Panel Background Menu -->

    </div>
</div>

<!-- Modal Ubah Background Menu -->
<div class="modal fade" id="ModalTealSm" tabindex="-1" role="dialog" aria-labelledby="ModalTealSmLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-teal-400">
                <h5 class="modal-title" id="ModalTealSmLabel">Ubah Background Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ModalTealSmIsi">
                <div class="text-center">Loading...</div>
            </div>
        </div>
    </div>
</div>

<!-- JS untuk AJAX modal -->
<script type="text/javascript">
function ubah_data_bgmenu(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Background Menu');
    $(modal + 'Isi').html('<div class="text-center">Loading...</div>');

    var act = '/admin/data-bgmenu/' + id + '/edit'; // pastikan route GET

    $.ajax({
        url: act,
        type: 'GET',
        headers: { 'X-CSRF-TOKEN': token },
        success: function(data) {
            $(modal + 'Isi').html(data);
        },
        error: function(xhr, status, error) {
            console.error(error);
            $(modal + 'Isi').html('<div class="text-danger text-center">Terjadi kesalahan. Silakan coba lagi.</div>');
        }
    });
}
</script>

@endsection
