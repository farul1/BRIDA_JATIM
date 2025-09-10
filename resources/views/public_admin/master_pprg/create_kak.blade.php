@extends('index')
@section('tempat_content')
<!-- Main charts -->
<style>
.image-thumb > img:hover {
  width: 500px;
  height: 200px;
}
</style>
<script type="text/javascript">
  $(function() {
    $( "#date" ).datepicker({dateFormat: 'yy'});
  });
</script>
<div class="row">

    <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
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
        @if (session()->has('error'))
        <div class="alert alert-warning alert-styled-left">
            <button type="button" class="close" data-dismiss="alert">
                <span>×</span>
                <span class="sr-only">Close</span>
            </button>
            <span class="text-semibold">Gagal!<br></span> {{ session()->get('error') }}
        </div>
        @endif
    </div>

    <div class="col-lg-12">
        <!-- Panel Event -->
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Tambah KAK</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>
            <form action="{{route('simpan_kak')}}" method="post" id="kakForm">
                @csrf
                <div class="panel-body">
                    <div align="center">
                        <h4>KERANGKA ACUAN KEGIATAN (KAK)</h4>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Tambah Baru Kerangka Acuan Kegiatan</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Nama SKPD:</b></label>
                                                    <p>Badan Penelitian dan Pengembangan Provinsi Jawa Timur</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Tahun:</b></label>
                                                    <p>{{$pag->tahun}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Tujuan / Sasaran Program:</b></label>
                                                    <p>{{$pag->gap->tujuan}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Kegiatan:</b></label>
                                                    <div class="col-lg-9" style="padding-left: 0px;padding-right: 0px;">
                                                        @foreach($pag->gap->rencanaAksi as $aksi)
                                                        <p>{{$aksi->uraian}}</p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Latar Belakang -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Latar Belakang</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Dasar Hukum:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="dasar_hukum" rows="3" required>{{ old('dasar_hukum') }}</textarea>
                                                    <script>CKEDITOR.replace('dasar_hukum');</script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Gambaran Umum:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="gambaran_umum" rows="3" required>{{ old('gambaran_umum') }}</textarea>
                                                    <script>CKEDITOR.replace('gambaran_umum');</script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Data Pembukaan Wawasan:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="pembukaan_wawasan" rows="3">{{ old('pembukaan_wawasan') }}</textarea>
                                                    <script>CKEDITOR.replace('pembukaan_wawasan');</script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Faktor Kesenjangan -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Faktor Kesenjangan</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Akses:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="akses" rows="3">{{ old('akses') }}</textarea>
                                                    <script>CKEDITOR.replace('akses');</script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Partisipasi:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="partisipasi" rows="3">{{ old('partisipasi') }}</textarea>
                                                    <script>CKEDITOR.replace('partisipasi');</script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Kontrol:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="kontrol" rows="3">{{ old('kontrol') }}</textarea>
                                                    <script>CKEDITOR.replace('kontrol');</script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Manfaat:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="manfaat" rows="3">{{ old('manfaat') }}</textarea>
                                                    <script>CKEDITOR.replace('manfaat');</script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Penyebab Kesenjangan Internal:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="kesenjangan_internal" rows="3">{{ old('kesenjangan_internal') }}</textarea>
                                                    <script>CKEDITOR.replace('kesenjangan_internal');</script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Penyebab Kesenjangan Eksternal:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="kesenjangan_eksternal" rows="3">{{ old('kesenjangan_eksternal') }}</textarea>
                                                    <script>CKEDITOR.replace('kesenjangan_eksternal');</script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Uraian -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Uraian</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Tujuan Kegiatan:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="tujuan_kegiatan" class="form-control" rows="3" required>{{ old('tujuan_kegiatan') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Penerima Manfaat:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="penerima_manfaat" class="form-control" rows="3" required>{{ old('penerima_manfaat') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Tempat Pelaksanaan:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="tempat_pelaksanaan" class="form-control" rows="3" required>{{ old('tempat_pelaksanaan') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Waktu Pelaksanaan:</b></label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label class="control-label col-sm-3"><b>Waktu Mulai</b>:</label>
                                                            <div class="col-sm-4">
                                                                <select class="select22" name="tahun_mulai" required style="width: 100%">
                                                                    <option value="">--Pilih Tahun--</option>
                                                                    @for($i = date('Y'); $i <= date('Y') + 5; $i++)
                                                                    <option value="{{$i}}" {{ old('tahun_mulai') == $i ? 'selected' : '' }}>{{$i}}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <select class="select22" name="bulan_mulai" required style="width: 100%">
                                                                    <option value="">--Pilih Bulan--</option>
                                                                    @foreach([1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'] as $num => $name)
                                                                    <option value="{{$num}}" {{ old('bulan_mulai') == $num ? 'selected' : '' }}>{{$name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top: 10px;">
                                                        <div class="col-6">
                                                            <label class="control-label col-sm-3"><b>Waktu Selesai</b>:</label>
                                                            <div class="col-sm-4">
                                                                <select class="select22" name="tahun_selesai" required style="width: 100%">
                                                                    <option value="">--Pilih Tahun--</option>
                                                                    @for($i = date('Y'); $i <= date('Y') + 5; $i++)
                                                                    <option value="{{$i}}" {{ old('tahun_selesai') == $i ? 'selected' : '' }}>{{$i}}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <select class="select22" name="bulan_selesai" required style="width: 100%">
                                                                    <option value="">--Pilih Bulan--</option>
                                                                    @foreach([1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'] as $num => $name)
                                                                    <option value="{{$num}}" {{ old('bulan_selesai') == $num ? 'selected' : '' }}>{{$name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Kegiatan ini selanjutnya dituangkan dalam sub kegiatan sebagai berikut:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="penjelasan1" rows="3" required>{{ old('penjelasan1') }}</textarea>
                                                    <script>CKEDITOR.replace('penjelasan1');</script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Indikator Kinerja -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Indikator Kinerja</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label"><b>Indicator Outcome:</b></label>
                                                <label class="col-lg-9 control-label">{{$pag->gap->indikator_outcome ?? '-'}}</label>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label"><b>Indicator Output:</b></label>
                                                <label class="col-lg-9 control-label">{{$pag->gap->indikator_output ?? '-'}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Batasan Kegiatan -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Batasan Kegiatan</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label"><b>Swakelola Murni / dikuasakan:</b></label>
                                                <div class="col-lg-9">
                                                    <select class="form-control select2" name="batasan[]" multiple="multiple" required style="width: 100%;">
                                                        <option value="Swakelola Murni" {{ in_array('Swakelola Murni', old('batasan', [])) ? 'selected' : '' }}>Swakelola Murni</option>
                                                        <option value="Dikuasakan" {{ in_array('Dikuasakan', old('batasan', [])) ? 'selected' : '' }}>Dikuasakan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pelaksanaan Kegiatan -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <div class="row align-content-between">
                                                <h3 class="panel-title">Pelaksanaan Kegiatan</h3>
                                            </div>
                                            <div class="heading-elements">
                                                <div class="btn-group">
                                                    <button type="button" onclick="tambahfieldrencana()" class="btn btn-success">+ Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body" id="rencanaaksi">
                                            @if(old('label'))
                                                @foreach(old('label') as $index => $label)
                                                <div class="col-md-12" id="row{{ $index+1 }}">
                                                    <div class="panel panel-warning">
                                                        <div class="panel-heading">
                                                            <h6 class="panel-title">Kegiatan {{ $index+1 }}</h6>
                                                            <div class="heading-elements">
                                                                <ul class="icons-list">
                                                                    <li><a onclick="hapusrencana({{ $index+1 }})" data-action="close"></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-lg-12 control-label"><b>Label:</b></label>
                                                                    <div class="col-lg-12">
                                                                        <input type="text" name="label[]" class="form-control" value="{{ $label }}" required>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <label class="col-lg-12 control-label"><b>Uraian:</b></label>
                                                                    <div class="col-lg-12">
                                                                        <textarea name="uraian[]" class="form-control" rows="3" required>{{ old('uraian.'.$index) }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                @endforeach
                                            @else
                                                <div class="col-md-12" id="row1">
                                                    <div class="panel panel-warning">
                                                        <div class="panel-heading">
                                                            <h6 class="panel-title">Kegiatan 1</h6>
                                                            <div class="heading-elements">
                                                                <ul class="icons-list">
                                                                    <li><a onclick="hapusrencana(1)" data-action="close"></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-lg-12 control-label"><b>Label:</b></label>
                                                                    <div class="col-lg-12">
                                                                        <input type="text" name="label[]" class="form-control" value="{{ old('label.0') }}" required>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <label class="col-lg-12 control-label"><b>Uraian:</b></label>
                                                                    <div class="col-lg-12">
                                                                        <textarea name="uraian[]" class="form-control" rows="3" required>{{ old('uraian.0') }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Waktu Pelaksanaan -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Waktu Pelaksanaan</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Durasi:</b></label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="durasi" value="{{ old('durasi') }}" required>
                                                </div>
                                                <label class="col-lg-1 control-label"><b>Bulan</b></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pelaksana dan Penanggung Jawab -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Pelaksana dan Penanggung Jawab Kegiatan</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Pelaksana:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="pelaksana" class="form-control" rows="3" required>{{ old('pelaksana') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Penanggung Jawab:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="penanggung_jawab" class="form-control" rows="3" required>{{ old('penanggung_jawab') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Biaya -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="">
                                        <label for="biaya" class="control-label col-sm-2">
                                           <b>Biaya :</b>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="biaya_display" id="dengan-rupiah" value="{{ old('biaya_display') }}" required>
                                            <input type="hidden" name="biaya" id="biaya-raw">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    
                    <input type="hidden" name="idpag" value="{{$pag->id}}">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row justify-content-md-between">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="">
                                        <button type="submit" name="button" value="simpan" class="btn btn-primary">Simpan<i class="glyphicon glyphicon-ok position-right"></i></button>
                                        <a href="{{route('pprg')}}" class="btn btn-danger"> Batal <i class="glyphicon glyphicon-remove position-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="text-right">
                                        <button type="submit" value="simpanlanjut" name="button" class="btn btn-primary">Simpan & Lanjutkan <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var no = {{ old('label') ? count(old('label')) + 1 : 2 }};
    
    function tambahfieldrencana(){
        $('#rencanaaksi').append('<br>'+
        `<div class="col-md-12" id="row`+no+`">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h6 class="panel-title">Kegiatan `+no+`</h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a onclick="hapusrencana(`+no+`)" data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">`+
                '<div class="form-group">'+
                    '<div class="row">'+
                        '<label class="col-lg-12 control-label"><b>Label:</b></label>'+
                        '<div class="col-lg-12">' +
                            '<input type="text" name="label[]" class="form-control" required>' +
                        '</div>'+
                    '</div>'+
                    '<br>'+
                    '<div class="row">'+
                        '<label class="col-lg-12 control-label"><b>Uraian:</b></label>'+
                        '<div class="col-lg-12">' +
                            '<textarea name="uraian[]" class="form-control" rows="3" required></textarea>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
                '</div>' +
            '</div>' +
            '<hr>'+
        '</div>');
        no++;
    }
    
    function hapusrencana(nomor){
        var nama = 'row'+nomor;
        $('#'+nama).remove();
    }
</script>

<script type="text/javascript">
    // Format Rupiah untuk biaya
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    var biaya_raw = document.getElementById('biaya-raw');
    
    dengan_rupiah.addEventListener('keyup', function(e) {
        var value = this.value.replace(/[^\d]/g, '');
        dengan_rupiah.value = formatRupiah(value, 'Rp. ');
        biaya_raw.value = value;
    });

    // Format nilai awal jika ada old value
    @if(old('biaya'))
    dengan_rupiah.value = formatRupiah('{{ old('biaya') }}', 'Rp. ');
    biaya_raw.value = '{{ old('biaya') }}';
    @endif

    /* Fungsi format rupiah */
    function formatRupiah(angka, prefix) {
        if (!angka) return '';
        
        var number_string = angka.toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
    }

    // Pastikan nilai numeric yang dikirim saat submit
    document.getElementById('kakForm').addEventListener('submit', function(e) {
        dengan_rupiah.value = biaya_raw.value;
    });
</script>

<script>
    $('.select2').select2({
        tags: true,
        maximumSelectionLength: 10,
        tokenSeparators: [',', ' '],
        placeholder: "Pilih atau ketik batasan kegiatan"
    });
</script>

@endsection