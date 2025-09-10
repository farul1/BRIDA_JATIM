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
                {{ session()->forget('status') }}
            </div>
        @endif

        @if (session()->has('statusT'))
            <div class="alert alert-warning alert-styled-left">
                <button type="button" class="close" data-dismiss="alert">
                    <span>×</span>
                    <span class="sr-only">Close</span>
                </button>
                <span class="text-semibold">Gagal!<br></span> {{ session()->get('statusT') }}
                {{ session()->forget('statusT') }}
            </div>
        @endif
    </div>

    <div class="col-lg-12">

        <!-- Panel Event -->
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Data Sakip</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div>
                    <a class="btn btn-info" onclick="tambah_data_sakip_data('{{ csrf_token() }}', '#ModalBiruSm')">
                        Tambah Data <i class="icon-plus3 position-right"></i>
                    </a>
                </div>
                <br>
                <div>
                    <table class="table table-bordered table-hover datatable-basic">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Judul</th>
                                <th>Keterangan</th> <!-- Tambahan kolom Keterangan -->
                                <th>Nama Kategori</th>
                                <th>File</th>
                                <th>Gambar</th> <!-- Tambahan kolom gambar -->
                                <th style="width: 50px !important">Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 0; @endphp
                            @foreach ($sakip as $r)
                                @php
                                    $no++;
                                    $fileLink = 'File Kosong';
                                    if (!empty($r->file)) {
                                        $fileLink = '<a href="/' . $r->file . '" target="_blank">File</a>';
                                    }
                                    $gambarUrl = $r->gambar ? asset($r->gambar) : null;
                                @endphp
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $r->judul }}</td>
                                    <td>{{ $r->keterangan ?? '-' }}</td> <!-- Tampilkan keterangan -->
                                    <td>{{ $r->kategori?->nama_kategori ?? '-' }}</td>
                                    <td>{!! $fileLink !!}</td>
                                    <td>
                                        @if ($gambarUrl)
                                            <img src="{{ $gambarUrl }}" alt="Gambar" style="width: 100px; height: auto;">
                                        @else
                                            Tidak ada gambar
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-block btn-group-velocity">
                                            <button type="button" class="btn bg-blue btn-sm btn-block dropdown-toggle"
                                                data-toggle="dropdown"><i class="glyphicon glyphicon-th-list"></i> Act <span
                                                    class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <button type="button"
                                                        onclick="ubah_data_sakip_data('{{ csrf_token() }}', '{{ $r->id }}', '#ModalTealSm')"
                                                        id="modal_update_sakip_data" title="Ubah"
                                                        class="btn bg-teal-400 btn-xs btn-block">
                                                        <i class="glyphicon glyphicon-edit"></i> Ubah
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button"
                                                        onclick="hapus_data_sakip_data('{{ $r->id }}')"
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
