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
        {{-- Notif sukses --}}
        @if (session('status'))
        <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            <strong>Berhasil!</strong> {{ session('status') }}
        </div>
        @endif

        {{-- Notif gagal custom (misal statusT) --}}
        @if (session('statusT'))
            <div class="alert alert-warning alert-styled-left">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <strong>Gagal!</strong><br> {{ session('statusT') }}
            </div>
        @endif

        {{-- Validasi error --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-styled-left">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>



    </div>

    <div class="col-lg-12">

        <!-- Panel Event -->
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Data User </h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div>
                    <a class="btn btn-info" onclick="tambah_data_user('#ModalBiruSm')">Tambah Data
                        <i class="icon-plus3 position-right"></i>
                    </a>
                </div>
                <br>
                <div class="">
                    <table class="table table-bordered table-hover datatable-basic">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th style="width: 50px !important">Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 0; @endphp
                            @foreach ($user as $r)
                                @php
                                    $no++;
                                    $id = $r->id;

                                    if($r->id_role == 99){
                                        $role = 'Super Admin';
                                        $style = 'label bg-danger label-rounded';
                                    } elseif($r->id_role == 1) {
                                        $role = 'Admin Bagian';
                                        $style = 'label bg-success label-rounded';
                                    } elseif($r->id_role == 2) {
                                        $role = 'User';
                                        $style = 'label bg-info label-rounded';
                                    } else {
                                        $role = '-';
                                        $style = '';
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $r->name }}</td>
                                    <td>{{ $r->email }}</td>
                                    <td><span class="{{ $style }}">{{ $role }}</span></td>
                                    <td>
                                        <div class="btn-group btn-block btn-group-velocity">
                                            <button type="button" class="btn bg-blue btn-sm btn-block dropdown-toggle"
                                                data-toggle="dropdown"><i class="glyphicon glyphicon-th-list"></i> Act <span
                                                    class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <button type="button" onclick="ubah_data_user({{ $id }}, '#ModalTealSm')" id="modal_update_user" title="Ubah" class="btn bg-teal-400 btn-xs btn-block">
                                                        <i class="glyphicon glyphicon-edit"></i> Ubah
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" onclick="hapus_data_user('{{ csrf_token() }}', {{ $id }})" data-toggle="modal" title="Hapus" class="btn btn-danger btn-xs btn-block">
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

<!-- Modal Tambah -->
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

<!-- Modal Edit -->
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

@endsection
