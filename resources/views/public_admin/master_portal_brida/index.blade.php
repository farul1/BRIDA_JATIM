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
        {{-- Alert jika berhasil --}}
        @if (session('status'))
            <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                <span class="text-semibold">Berhasil!</span> {{ session('status') }}
            </div>
        @endif

        {{-- Alert jika gagal --}}
        @if (session('statusT'))
            <div class="alert alert-warning alert-styled-left">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                <span class="text-semibold">Gagal!<br></span> {{ session('statusT') }}
            </div>
        @endif
    </div>
</div>

    <div class="col-lg-12">

        <!-- Panel Event -->
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Data Portal BRIDA </h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>

                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div>
                    <a class="btn btn-info" onclick="tambah_data_portal_brida('{{csrf_token()}}', '#ModalBiruSm')">Tambah Data
                        <i class="icon-plus3 position-right"></i></a>
                </div>
                <br>
                <div class="">
                    <table class="table table-bordered table-hover datatable-basic">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama</th>
                                <th>Link</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th style="width: 50px !important">Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$no = 0;
							$status='-';
							?>
                            @foreach ($portalBrida as $r)
                            @php
                            $no ++;
                            $id = $r['id'];

                            @endphp

                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$r->nama}}</td>
                                <td><a href="{{$r->link}}" target="_blank">{{$r->link}}</a></td>
                                <td>{{$r->deskripsi}}</td>
                                <td><a href="{{asset($r->logo)}}" target="_blank">Link</a></td>
                                <td>
                                    <div class="btn-group btn-block btn-group-velocity">
                                        <button type="button" class="btn bg-blue btn-sm btn-block dropdown-toggle"
                                            data-toggle="dropdown"><i class="glyphicon glyphicon-th-list"></i> Act <span
                                                class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <button type="button" onclick="ubah_data_portal_brida('{{csrf_token()}}', '{{ $id }}', '#ModalTealSm')
									" id="modal_update_profilkat" title="Ubah" class="btn bg-teal-400 btn-xs btn-block">
                                                    <i class="glyphicon glyphicon-edit"></i>Ubah</button>
                                            </li>
                                            <li>
                                                <button type="button"
                                                    onclick="hapus_data_portal_brida('{{csrf_token()}}','{{ $r->id }}')"
                                                    data-toggle="modal" title="Hapus"
                                                    class="btn btn-danger btn-xs btn-block">
                                                    <i class="glyphicon glyphicon-remove"></i>Hapus</button>
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
