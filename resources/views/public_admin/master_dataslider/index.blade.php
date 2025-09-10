@extends('index')
@section('tempat_content')
<!-- Main charts -->

<style>
.image-thumb > img:hover {
  width: 500px;
  height: 200px;
}

.table-responsive .dropdown-menu button {
  width: 100%;
  text-align: left;
}

.alert {
  margin-top: 10px;
}
</style>

<div class="row">

    <div class="col-md-12">
        {{-- Status Alert --}}
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

        <!-- Panel Slider -->
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Data Slider</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                {{-- Disclaimer --}}
                <div class="alert alert-info alert-styled-left alert-arrow-left mb-3">
                    <strong>Catatan:</strong> 
                    Jika Anda memilih file video, hanya **1 video** yang akan tampil di slider, 
                    dan gambar dengan format foto tidak akan ditampilkan. 
                    Slider foto akan muncul hanya jika tidak ada video yang dipilih.
                </div>

                <div class="mb-3">
                    <a class="btn btn-info" onclick="tambah_data_slider('{{csrf_token()}}', '#ModalBiruSm')">
                        Tambah Data <i class="icon-plus3 position-right"></i>
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable-basic">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama</th>
                                <th>File</th>
                                <th style="width: 120px !important">Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($slider as $r)
                                @php
                                    $ext = strtolower(pathinfo($r->gambar, PATHINFO_EXTENSION));
                                @endphp
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $r->nama }}</td>
                                    <td>
                                        @if(in_array($ext, ['mp4','webm','mov']))
                                            <video width="200" autoplay muted loop playsinline>
                                                <source src="{{ asset('file_upload/slider/'.$r->gambar) }}" type="video/mp4">
                                                Browser Anda tidak mendukung video.
                                            </video>
                                        @else
                                            <img src="{{ asset('file_upload/slider/'.$r->gambar) }}" style="width:30%;">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-blue btn-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="glyphicon glyphicon-th-list"></i> Act
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right" style="min-width: 130px;">
                                                <li>
                                                    <button type="button" 
                                                            onclick="ubah_data_slider('{{ $r->id }}', '#ModalTealSm')" 
                                                            class="btn bg-teal-400 btn-xs btn-block text-left">
                                                        <i class="glyphicon glyphicon-edit"></i> Ubah
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button"
                                                            onclick="hapus_data_slider('{{csrf_token()}}','{{ $r->id }}')"
                                                            class="btn btn-danger btn-xs btn-block text-left">
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
        <!-- /Panel Slider -->

    </div>
</div>
<!-- /main charts -->

@endsection
