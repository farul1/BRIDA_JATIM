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
            {{session()->forget('status')}}
        </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-warning alert-styled-left">
            <button type="button" class="close" data-dismiss="alert">
                <span>×</span>
                <span class="sr-only">Close</span>
            </button>
            <span class="text-semibold">Gagal!<br></span> {{ session()->get('error') }}
            {{session()->forget('error')}}
        </div>
        @endif
    </div>

    <div class="col-lg-12">

        <!-- Panel Event -->
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Tambah PAG</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>

                    </ul>
                </div>
            </div>
            <form action="{{route('simpan_pag')}}" method="post" id="pagForm">
                @csrf
                <input type="hidden" name="gap_id" value="{{$gap->id}}">
                <div class="panel-body">
                    <div align="center">
                        <h4>PERNYATAAN ANGGARAN GENDER (PAG) / GENDER BUDGET STATEMENT (GBS)</h4>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row justify-content-md-between">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="">
                                        <?php $years = range(1900, strftime("%Y", time())); ?>
                                        <label align="right" style="text-align: right" for="tahun" class="control-label col-sm-3">
                                            Tahun <span style="color:red"><b>*</b></span> :
                                        </label>
                                        <div class="col-sm-9">
                                            <select  class="select22" name="tahun" id="tahun" required="" style="width: 100%">
                                                <option value="">--Pilih Tahun--</option>
                                                @foreach($years as $r)
                                                <?php
                                                $strSel = '';
                                                if ($r == intval(date('Y'))) {
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
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Nama Kebijakan/Program/Kegiatan</h3>
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
                                                    <label class="col-lg-2 control-label"><b>Kebijakan:</b></label>
                                                    <label class="col-lg-10 control-label">{{$gap->kebijakan}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Program:</b></label>
                                                    <label class="col-lg-10 control-label">{{$gap->program}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Tujuan:</b></label>
                                                    <label class="col-lg-10 control-label">{{$gap->tujuan}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Sasaran:</b></label>
                                                    <label class="col-lg-10 control-label">{{$gap->sasaran}}</label>
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
                            <div class="row justify-content-md-between">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="">
                                        <label align="right" style="text-align: right" for="tahun" class="control-label col-sm-5">
                                            <b>Kode Program :</b>
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="kode_program" value="{{ old('kode_program') }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Analisis Situasi</h3>
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
                                                    <label class="col-lg-3 control-label"><b>Data pembukaan Wawasan :</b></label>
                                                    <label class="col-lg-9 control-label"><?=$gap->data_pembukaan_wawasan?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-lg-12 control-label"><b><u>Faktor Kesenjangan</u> :</b></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label"><b>Akses :</b></label>
                                                    <label class="col-lg-9 control-label"><?=$gap->akses?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label"><b>Akses :</b></label>
                                                    <label class="col-lg-9 control-label"><?=$gap->akses?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label"><b>Partisipasi :</b></label>
                                                    <label class="col-lg-9 control-label"><?=$gap->partisipasi?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label"><b>Kontrol :</b></label>
                                                    <label class="col-lg-9 control-label"><?=$gap->kontrol?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label"><b>Manfaat :</b></label>
                                                    <label class="col-lg-9 control-label"><?=$gap->manfaat?></label>
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
                                            <h3 class="panel-title">Sebab Faktor Internal</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label"><b>Sebab Faktor Internal:</b></label>
                                                <label class="col-lg-9 control-label"><?=$gap->sebab_faktor_internal?></label>
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
                                            <h3 class="panel-title">Sebab Faktor Eksternal</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label"><b>Sebab Faktor Eksternal:</b></label>
                                                <label class="col-lg-9 control-label"><?=$gap->sebab_faktor_eksternal?></label>
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
                                            <h3 class="panel-title">Capaian Program</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-10 col-md-offset-1">
                                                            <div class="panel panel-flat">
                                                                <div class="panel-heading">
                                                                    <h3 class="panel-title">Tolak Ukur : Tujuan Program yang Telah Direformulasikan</h3>
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
                                                                            <label class="col-lg-3 control-label"><b>Tujuan Awal :</b></label>
                                                                            <label class="col-lg-9 control-label"><?=$gap->tujuan?></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group">
                                                                            <label class="col-lg-3 control-label"><b>Tujuan Program yang Telah Direformulasi :</b></label>
                                                                            <label class="col-lg-9 control-label"><?=$gap->reformulasi_tujuan?></label>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
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
                            <div class="row justify-content-md-between">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="">
                                        <label align="right" style="text-align: right" for="tahun" class="control-label col-sm-5">
                                           <b>Jumlah Anggaran :</b>
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="jumlah_anggaran_display" id="dengan-rupiah" value="{{ old('jumlah_anggaran_display') }}" required>
                                            <input type="hidden" name="jumlah_anggaran" id="jumlah-raw">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <div class="row align-content-between">
                                                <h3 class="panel-title">Rencana Aksi</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body" id="rencanaaksi">
                                            @foreach($gap->rencanaAksi as $index => $a)
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $a->uraian }}</h3>
                        </div>
                        <hr>
                        <input type="hidden" name="aksiid[]" value="{{ $a->id }}">
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label"><b>Input :</b></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="input[]" value="{{ old('input.'.$index) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label"><b>Output :</b></label>
                                    <div class="col-lg-10">
                                        <textarea name="output[]" class="form-control" rows="3">{{ old('output.'.$index) }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label"><b>Outcome :</b></label>
                                    <div class="col-lg-10">
                                        <textarea name="outcome[]" class="form-control" rows="3">{{ old('outcome.'.$index) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
        '<div class="form-group" id="row'+no+'">'+
        '<label class="col-lg-2 control-label"><b>Rencana Aksi:</b></label>'+
        '<div class="col-lg-10">' +
            '<div class="input-group">' +
                '<textarea name="rencanaaksi[]" class="form-control" rows="3" required></textarea>' +
                '<span class="input-group-btn">' +
                    '<button type="button" onclick="hapusrencana('+no+')" class="btn btn-danger">X</button>' +
                '</span>' +
            '</div>' +
        '</div>');

    }
    function hapusrencana(nomor){
        var nama = 'row'+nomor;
        $('#'+nama).remove();
    }
</script>
<script type="text/javascript">
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    var jumlah_raw = document.getElementById('jumlah-raw');
    
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        var value = this.value.replace(/[^\d]/g, '');
        dengan_rupiah.value = formatRupiah(value, 'Rp. ');
        jumlah_raw.value = value;
    });

    // Format nilai awal jika ada old value
    @if(old('jumlah_anggaran'))
    dengan_rupiah.value = formatRupiah('{{ old('jumlah_anggaran') }}', 'Rp. ');
    jumlah_raw.value = '{{ old('jumlah_anggaran') }}';
    @endif

    /* Fungsi format rupiah */
    function formatRupiah(angka, prefix)
    {
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
    document.getElementById('pagForm').addEventListener('submit', function(e) {
        dengan_rupiah.value = jumlah_raw.value;
    });
</script>

@endsection