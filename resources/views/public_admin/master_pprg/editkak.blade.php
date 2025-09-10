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
            {{session()->forget('status')}}
        </div>
        @endif
        @if (session()->has('statusT'))
        <div class="alert alert-warning alert-styled-left">
            <button type="button" class="close" data-dismiss="alert">
                <span>×</span>
                <span class="sr-only">Close</span>
            </button>
            <span class="text-semibold">Gagal!<br></span> {{ session()->get('statusT') }}
            {{session()->forget('statusT')}}
        </div>
        @endif
    </div>

    <div class="col-lg-12">

        <!-- Panel Event -->
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Ubah KAK</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>

                    </ul>
                </div>
            </div>
            <form action="{{route('simpan_ubah_kak',$kak->id)}}" method="post">
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
                                                    <p>{{$gap->tujuan}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Kegiatan:</b></label>
                                                    <div class="col-lg-9" style="padding-left: 0px;padding-right: 0px;">
                                                        @foreach($r_aksi as $aksi)
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
                                                    <textarea name="dasar_hukum" rows="3"><?php echo $kak->dasar_hukum;?></textarea>
                                                    <script>
                                                            CKEDITOR.replace( 'dasar_hukum' );
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Gambaran Umum:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="gambaran_umum" rows="3"><?php echo $kak->gambaran_umum;?></textarea>
                                                    <script>
                                                            CKEDITOR.replace( 'gambaran_umum' );
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Data Pembukaan Wawasan:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="pembukaan_wawasan" rows="3"><?php echo $kak->data_pembukaan_wawasan;?></textarea>
                                                    <script>
                                                            CKEDITOR.replace( 'pembukaan_wawasan' );
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                    <textarea name="akses" rows="3"><?php echo $kak->akses;?></textarea>
                                                    <script>
                                                            CKEDITOR.replace( 'akses' );
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Partisipasi:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="partisipasi" rows="3"><?php echo $kak->partisipasi;?></textarea>
                                                    <script>
                                                            CKEDITOR.replace( 'partisipasi' );
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Kontrol:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="kontrol" rows="3"><?php echo $kak->kontrol;?></textarea>
                                                    <script>
                                                            CKEDITOR.replace( 'kontrol' );
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Manfaat:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="manfaat" rows="3"><?php echo $kak->manfaat;?></textarea>
                                                    <script>
                                                            CKEDITOR.replace( 'manfaat' );
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Penyebab Kesenjangan Internal:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="kesenjangan_internal" rows="3"><?php echo $kak->internal;?></textarea>
                                                    <script>
                                                            CKEDITOR.replace( 'kesenjangan_internal' );
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Penyebab Kesenjangan Eksternal:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="kesenjangan_eksternal" rows="3"><?php echo $kak->eksternal;?></textarea>
                                                    <script>
                                                            CKEDITOR.replace( 'kesenjangan_eksternal' );
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                    <textarea name="tujuan_kegiatan" class="form-control" rows="3"><?php echo $kak->tujuan_kegiatan;?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Penerima Manfaat:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="penerima_manfaat" class="form-control" rows="3"><?php echo $kak->penerima_manfaat;?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Tempat Pelaksanaan:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="tempat_pelaksanaan" class="form-control" rows="3"><?php echo $kak->tempat;?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Waktu Pelaksanaan:</b></label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label align="right" style="text-align: right" for="tahun" class="control-label col-sm-3">
                                                            <b>Waktu Mulai</b></span> :
                                                            </label>
                                                            <?php $req_year = explode('-',$kak->waktu_mulai);?>
                                                            <?php $years = range(1900, strftime("%Y", time())); ?>
                                                            <!-- <label align="right" style="text-align: right" for="tahun" class="control-label col-sm-3">
                                                                Tahun & Bulan<span style="color:red"><b>*</b></span> : -->
                                                            </label>
                                                            <div class="col-sm-3">
                                                                <select  class="select22" name="tahun_mulai" id="tahun" required="" style="width: 100%">
                                                                    <option value="">--Pilih Tahun--</option>
                                                                    @foreach($years as $r)
                                                                    <?php

                                                                    $tahun_mulai = $req_year[1];
                                                                    $strSel = '';
                                                                    if ($r == $tahun_mulai) {
                                                                        $strSel = ' selected="selected"';
                                                                    }
                                                                    ?>
                                                                    <option value="{{$r}}"<?php echo $strSel; ?>>{{$r}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <?php $month = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'); ?>
                                                            <div class="col-sm-3">
                                                                <select  class="select22" name="bulan_mulai" id="bulan" required="" style="width: 100%">
                                                                    <option value="">--Pilih Bulan--</option>
                                                                    <?php $count=1;
                                                                    $bulan_mulai = $req_year[0];?>
                                                                    @foreach($month as $r)
                                                                    <?php
                                                                    $strSel = '';
                                                                    if ($r == $bulan_mulai) {
                                                                        $strSel = ' selected="selected"';
                                                                    }
                                                                    ?>
                                                                    <option value="{{$r}}"<?php echo $strSel; ?>>{{$r}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label align="right" style="text-align: right" for="tahun" class="control-label col-sm-3">
                                                            <b>Waktu Selesai</b></span> :
                                                            </label>
                                                            <?php $req_year = explode('-',$kak->waktu_selesai);?>
                                                            <?php $years = range(1900, strftime("%Y", time())); ?>
                                                            <!-- <label align="right" style="text-align: right" for="tahun" class="control-label col-sm-3">
                                                                Tahun & Bulan<span style="color:red"><b>*</b></span> : -->
                                                            </label>
                                                            <div class="col-sm-3">
                                                                <select  class="select22" name="tahun_selesai" id="tahun" required="" style="width: 100%">
                                                                    <option value="">--Pilih Tahun--</option>
                                                                    @foreach($years as $r)
                                                                    <?php
                                                                    $tahun_mulai = $req_year[1];
                                                                    $strSel = '';
                                                                    if ($r == $tahun_mulai) {
                                                                        $strSel = ' selected="selected"';
                                                                    }
                                                                    ?>
                                                                    <option value="{{$r}}"<?php echo $strSel; ?>>{{$r}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <?php $month = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'); ?>
                                                            <div class="col-sm-3">
                                                                <select  class="select22" name="bulan_selesai" id="bulan" required="" style="width: 100%">
                                                                    <option value="">--Pilih Bulan--</option>
                                                                    <?php $count=1;
                                                                    $bulan_mulai = $req_year[0]; ?>
                                                                    @foreach($month as $r)
                                                                    <?php
                                                                     $strSel = '';
                                                                     if ($r == $bulan_mulai) {
                                                                         $strSel = ' selected="selected"';
                                                                     }
                                                                    ?>
                                                                    <option value="{{$r}}"<?php echo $strSel; ?>>{{$r}}</option>
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
                                                    <textarea name="penjelasan1" rows="3"><?php echo $kak->subkegiatan; ?></textarea>
                                                    <script>
                                                            CKEDITOR.replace( 'penjelasan1' );
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <label class="col-lg-9 control-label"><?=$gap->indikator_outcome?></label>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label"><b>Indicator Output:</b></label>
                                                <label class="col-lg-9 control-label"><?=$gap->indikator_output?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <?php
                                                $batasan = $kak->batasan_kegiatan;
                                                $keg = explode(';',$batasan);
                                                ?>
                                                <select class="col-lg-9 form-control select2" name="batasan[]" multiple="multiple" style="width: 100%;">
                                                    <?php
                                                    $arrkuasa = array('Dikuasakan','Swakelola Murni');
                                                    ?>
                                                    @foreach($keg as $ar)
                                                    <?php
                                                    $strSel = '';
                                                    if (in_array($ar, $arrkuasa)) {
                                                        $strSel = ' selected';
                                                    }
                                                    ?>
                                                    <option value="{{$ar}}"<?php echo $strSel;?>>{{$ar}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <div class="row align-content-between">
                                                <h3 class="panel-title">Pelaksanaan Kegiatan</h3>
                                            </div>
                                            <?php
                                            $nomer = 1;
                                            ?>
                                            <div class="heading-elements">
                                                <div class="btn-group">
                                                    <!-- <button type="button" onclick="tambahfieldrencana()" class="btn btn-success">+ Tambah</button> -->
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body" id="rencanaaksi">
                                            @foreach($pel as $aksi)
                                            <div class="col-md-12" id="row`+no+`">
                                                <div class="panel panel-warning">
                                                    <div class="panel-heading">
                                                        <h6 class="panel-title">Tambah Kegiatan</h6>
                                                        <div class="heading-elements">
                                                            <ul class="icons-list">
                                                                <!-- <li><a onclick="hapusrencana(`+no+`)" data-action="close"></a></li> -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-lg-12 control-label"><b>Label:</b></label>
                                                    <div class="col-lg-12">
                                                        <div class="input-group">
                                                            <textarea name="label[]" class="form-control" rows="3">{{$aksi->label}}</textarea>
                                                            <span class="input-group-btn">
                                                                <!-- <button type="button" onclick="hapusrencana('+no+')" class="btn btn-danger">X</button>' + -->
                                                            </span>
                                                        </div>
                                                </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <label class="col-lg-12 control-label"><b>Uraian:</b></label>
                                                    <div class="col-lg-12">
                                                        <div class="input-group">
                                                            <textarea name="uraian[]" class="form-control" rows="3">{{$aksi->uraian}}</textarea>
                                                            <span class="input-group-btn">
                                                            <!-- <button type="button" class="btn btn-danger">X</button>' + -->
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            <hr>
                                            <input type="hidden" name="idkegiatan[]" value="{{$aksi->id}}">
                                            @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                    <input type="number" class="form-control" name="durasi" value="{{$kak->durasi}}">
                                                </div>
                                                <label class="col-lg-1 control-label"><b>Bulan</b></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                    <textarea name="pelaksana" class="form-control" rows="3">{{$kak->pelaksana}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Penanggung Jawab:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="penanggung_jawab" class="form-control" rows="3">{{$kak->penanggung_jawab}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="">
                                        <label for="tahun" class="control-label col-sm-2">
                                           <b>Biaya :</b>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="biaya" id="dengan-rupiah" value="{{$kak->biaya}}">
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
        <!-- /Panel Event -->

    </div>
</div>
<!-- /main charts -->

<script>
    var no = 1;
    function tambahfieldrencana(){
        no++
        $('#rencanaaksi').append('<br>'+
        `<div class="col-md-12" id="row`+no+`">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h6 class="panel-title">Tambah Kegiatan</h6>
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
                    '<div class="input-group">' +
                        '<textarea name="label[]" class="form-control" rows="3"></textarea>' +
                        '<span class="input-group-btn">' +
                            // '<button type="button" onclick="hapusrencana('+no+')" class="btn btn-danger">X</button>' +
                        '</span>' +
                    '</div>' +
                '</div>'+
            '</div>'+
            '<br>'+
            '<div class="row">'+
                '<label class="col-lg-12 control-label"><b>Uraian:</b></label>'+
                '<div class="col-lg-12">' +
                    '<div class="input-group">' +
                        '<textarea name="uraian[]" class="form-control" rows="3"></textarea>' +
                        '<span class="input-group-btn">' +
                            // '<button type="button" class="btn btn-danger">X</button>' +
                        '</span>' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '<hr>'+
        '</div>');

    }
    function hapusrencana(nomor){
        var nama = 'row'+nomor;
        $('#'+nama).remove();
    }
</script>
<script type="text/javascript">
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
<script>
$("#datepicker").datepicker( {
    format: "mm-yyyy",
    startView: "months",
    // minViewMode: "months"
});

</script>
<script>
        $('.select2').select2({
            data: ["Swakelola Murni", "Dikuasakan"],
            tags: true,
            maximumSelectionLength: 10,
            tokenSeparators: [',', ' '],
            placeholder: "Select or type keywords",
            //minimumInputLength: 1,
            //ajax: {
           //   url: "you url to data",
           //   dataType: 'json',
            //  quietMillis: 250,
            //  data: function (term, page) {
            //     return {
            //         q: term, // search term
            //    };
           //  },
           //  results: function (data, page) {
           //  return { results: data.items };
          //   },
          //   cache: true
           // }
        });
    </script>

@endsection
