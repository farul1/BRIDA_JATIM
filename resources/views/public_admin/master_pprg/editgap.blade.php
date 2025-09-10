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
                <h6 class="panel-title">Ubah GAP</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>

                    </ul>
                </div>
            </div>
            <form action="{{route('simpan_ubah_gap',$gap->id)}}" method="post">
                @csrf
                <div class="panel-body">
                    <div align="center">
                        <h4>MATRIK LEMBAR KERJA</h4>
                        <h4>GENDER ANALYSIS PATHWAY (GAP)</h4>
                        <h4>BADAN PENELITIAN DAN PENGEMBANGAN PROVINSI JAWA TIMUR</h4>
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
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Kebijakan:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea rows="3" cols="5" name="kebijakan" class="form-control"><?php echo $gap->kebijakan; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Program:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea rows="3" cols="5" name="program" class="form-control"><?php echo $gap->program; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Tujuan:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea rows="3" cols="5" name="tujuan" class="form-control"><?php echo $gap->tujuan; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Sasaran:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea rows="3" cols="5" name="sasaran" class="form-control"><?php echo $gap->sasaran; ?></textarea>
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
                                            <h3 class="panel-title">Data Pembukaan Wawasan</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Data Pembukaan Wawasan:</b></label>
                                                <div class="col-lg-10">
                                                <textarea name="datawawasan" rows="3">
                                                <?php echo $gap->data_pembukaan_wawasan; ?>
                                                </textarea>
                                                <script>
                                                        CKEDITOR.replace( 'datawawasan' );
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
                                                    <textarea name="akses" rows="3">
                                                    <?php echo $gap->akses; ?>
                                                    </textarea>
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
                                                    <textarea name="partisipasi" rows="3">
                                                    <?php echo $gap->partisipasi; ?>
                                                    </textarea>
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
                                                    <textarea name="kontrol" rows="3">
                                                    <?php echo $gap->kontrol; ?>
                                                    </textarea>
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
                                                    <textarea name="manfaat" rows="3">
                                                    <?php echo $gap->manfaat; ?>
                                                    </textarea>
                                                    <script>
                                                            CKEDITOR.replace( 'manfaat' );
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
                                                <label class="col-lg-2 control-label"><b>Sebab Faktor Internal:</b></label>
                                                <div class="col-lg-10">
                                                <textarea name="faktorinternal" rows="3">
                                                <?php echo $gap->sebab_faktor_internal; ?>
                                                </textarea>
                                                <script>
                                                        CKEDITOR.replace( 'faktorinternal' );
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
                                                <label class="col-lg-2 control-label"><b>Sebab Faktor Eksternal:</b></label>
                                                <div class="col-lg-10">
                                                <textarea name="faktoreksternal" rows="3">
                                                <?php echo $gap->sebab_faktor_eksternal; ?>
                                                </textarea>
                                                <script>
                                                        CKEDITOR.replace( 'faktoreksternal' );
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
                                            <h3 class="panel-title">Reformulasi Tujuan</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Reformulasi Tujuan:</b></label>
                                                <div class="col-lg-10">
                                                <textarea name="reformulasitujuan" rows="3">
                                                <?php echo $gap->reformulasi_tujuan; ?>
                                                </textarea>
                                                <script>
                                                        CKEDITOR.replace( 'reformulasitujuan' );
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
                                            <div class="row align-content-between">
                                                <h3 class="panel-title">Rencana Aksi</h3>
                                            </div>
                                            <?php
                                            $nomer = 1;
                                            ?>
                                            <div class="heading-elements">

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body" id="rencanaaksi">
                                            <?php $nomer = 1;?>
                                            @foreach($gap->rencanaAksi as $a)
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Rencana Aksi:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea name="rencanaaksi[]" class="form-control">{{ $a->uraian }}</textarea>
                                                    <input type="hidden" name="idrencana[]" value="{{ $a->id }}">
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
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Basis Data</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Basis Data:</b></label>
                                                <div class="col-lg-10">
                                                <textarea name="basisdata" rows="3"><?php echo $gap->basis_data?></textarea>
                                                <script>
                                                        CKEDITOR.replace( 'basisdata' );
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
                                            <h3 class="panel-title">Indikator Kerja</h3>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            <fieldset class="content-group">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Indikator Output:</b></label>
                                                    <div class="col-lg-10">
                                                        <textarea rows="3" cols="5" name="indikatoroutput" class="form-control"><?php echo $gap->indikator_output?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Indikator Outcome:</b></label>
                                                    <div class="col-lg-10">
                                                        <textarea rows="3" cols="5" name="indikatoroutcome" class="form-control"><?php echo $gap->indikator_outcome?></textarea>
                                                    </div>
                                                </div>
                                            </fieldset>
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

</script>
<script>
    function hapusrencana(nomor){
        var nama = 'row'+nomor;
        $('#'+nama).remove();
    }
</script>
@endsection
