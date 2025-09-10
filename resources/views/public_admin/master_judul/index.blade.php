@extends('index')
@section('tempat_content')
<!-- Main charts -->
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
        <script type="text/javascript">
            alertKu('warning', "{{ session()->get('statusT') }}");
        </script>
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
        <!-- Panel Event -->
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Data Judul</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div>
                    <a class="btn btn-info" onclick="tambah_data_judul('{{csrf_token()}}', '#ModalBiru')">
                        Tambah Data <i class="icon-plus3 position-right"></i>
                    </a>
                </div>
                <br>
                <div class="">
                    <table class="table table-bordered table-hover datatable-basic">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Judul</th>
                                <th>Bidang</th>
                                <th>Sub Bidang</th>
                                <th style="width: 50px !important">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($judul as $index => $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->judul }}</td>
                                <td>{{ $r->bidang->nama_bidang ?? 'Bidang tidak tersedia' }}</td>
                                <td>{{ $r->subBidang->nama ?? 'Sub Bidang tidak tersedia' }}</td>
                                <td>
                                    <div class="btn-group btn-block btn-group-velocity">
                                        <button type="button" class="btn bg-blue btn-sm btn-block dropdown-toggle"
                                            data-toggle="dropdown">
                                            <i class="glyphicon glyphicon-th-list"></i> Aksi <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <button type="button"
                                                    onclick="ubah_data_judul('{{csrf_token()}}', '{{ $r->id }}', '#ModalTeal')"
                                                    class="btn bg-teal-400 btn-xs btn-block">
                                                    <i class="glyphicon glyphicon-edit"></i> Ubah
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button"
                                                    onclick="hapus_data_judul('{{csrf_token()}}','{{ $r->id }}')"
                                                    class="btn btn-danger btn-xs btn-block">
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
        </div>
        <!-- /Panel Event -->
    </div>
</div>
<!-- /main charts -->
@endsection
