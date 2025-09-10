@extends('index')
@section('tempat_content')
@include('include.function')
    <!-- Main charts -->
    <style>
        .image-thumb>img:hover {
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
                    <h6 class="panel-title">Data Profil BRIDA</h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>

                        </ul>
                    </div>
                </div>

                <div class="panel-body">

                    <div class="row">
                        <form id="frmInfoWebsite" method="post" action="{{ route('simpan_data_profile') }}" class="form-horizontal" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="row">
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Info Website</h3>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <li><a data-action="collapse"></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Profil:</b></label>
                                                    <div class="col-lg-10">
                                                        <textarea name="profil" rows="3">{{$info_web->profil}}</textarea>
                                                        <script>
                                                                CKEDITOR.replace( 'profil' );
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value="{{$info_web->id}}">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Tugas Pokok:</b></label>
                                                    <div class="col-lg-10">
                                                        <textarea name="tugas_pokok" rows="3">{{$info_web->tugas_pokok}}</textarea>
                                                        <script>
                                                                CKEDITOR.replace( 'tugas_pokok' );
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Tentang Kami:</b></label>
                                                    <div class="col-lg-10">
                                                        <textarea name="tentang_kami" rows="3">{{$info_web->tentang_kami}}</textarea>
                                                        <script>
                                                                CKEDITOR.replace( 'tentang_kami' );
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Tujuan dan Sasaran:</b></label>
                                                    <div class="col-lg-10">
                                                        <textarea name="tujuan" rows="3">{{$info_web->tujuan}}</textarea>
                                                        <script>
                                                                CKEDITOR.replace( 'tujuan' );
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Struktur Organisasi:</b></label>
                                                    <div class="col-lg-10">
                                                        <textarea name="struktur_organisasi" rows="3">{{$info_web->struktur_organisasi}}</textarea>
                                                        <script>
                                                            CKEDITOR.replace('struktur_organisasi');
                                                        </script>
                                                        <small class="text-muted">
                                                            Jika ingin menambahkan gambar struktur organisasi, silakan unggah file atau link gambar terlebih dahulu di web ini.  
                                                            Biarkan kosong jika belum ada gambar baru, karena secara otomatis akan menampilkan gambar default lokal.
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button style="text-align: right" type="submit" class="btn btn-primary">
                                                        <i class="icon-check"></i> Simpan
                                                    </button>
                                                </div>
                                            </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Panel Event -->

        </div>
    </div>
    <!-- /main charts -->

@endsection
