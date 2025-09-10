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
        @if (session('status'))
            <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                <button type="button" class="close" data-dismiss="alert">
                    <span>×</span><span class="sr-only">Close</span>
                </button>
                <span class="text-semibold">Berhasil! </span> {{ session('status') }}
            </div>
        @endif
        @if (session('statusT'))
            <div class="alert alert-warning alert-styled-left">
                <button type="button" class="close" data-dismiss="alert">
                    <span>×</span><span class="sr-only">Close</span>
                </button>
                <span class="text-semibold">Gagal!<br></span> {{ session('statusT') }}
            </div>
        @endif
    </div>

    <div class="col-lg-12">
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Data Pejabat</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div>
                    <button class="btn btn-info" onclick="tambah_data_pejabat('#ModalBiruSm')">
                        Tambah Data <i class="icon-plus3 position-right"></i>
                    </button>
                </div>
                <br>
                <table class="table table-bordered table-hover datatable-basic">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama Pejabat</th>
                            <th>Jabatan</th>
                            <th>Pangkat</th>
                            <th>NIP</th>
                            <th style="width: 50px !important">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pejabat as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->pangkat }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>
                                    <div class="btn-group btn-block btn-group-velocity">
                                        <button type="button" class="btn bg-blue btn-sm btn-block dropdown-toggle" data-toggle="dropdown">
                                            <i class="glyphicon glyphicon-th-list"></i> Aksi <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <button type="button" 
                                                    onclick="ubah_data_pejabat('{{ $item->id }}', '#ModalTealSm')" 
                                                    title="Ubah" class="btn bg-teal-400 btn-xs btn-block">
                                                    <i class="glyphicon glyphicon-edit"></i> Ubah
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" 
                                                    onclick="hapus_data_pejabat('{{ csrf_token() }}', '{{ $item->id }}')"
                                                    title="Hapus" class="btn btn-danger btn-xs btn-block">
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
</div>

<!-- Modal Biru (Tambah Data) -->
<div id="ModalBiruSm" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="ModalBiruSmLabel" class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div id="ModalBiruSmIsi" class="modal-body">
        <!-- Konten form tambah data akan dimuat di sini -->
      </div>
    </div>
  </div>
</div>

<!-- Modal Teal (Ubah Data) -->
<div id="ModalTealSm" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="ModalTealSmLabel" class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div id="ModalTealSmIsi" class="modal-body">
        <!-- Konten form ubah data akan dimuat di sini -->
      </div>
    </div>
  </div>
</div>


@endsection
