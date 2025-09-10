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
                <h6 class="panel-title">Pre-Print Dokumen KAK</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>

                    </ul>
                </div>
            </div>
            <form action="{{route('cetak_final_kak')}}" method="POST">
                @csrf

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label"><b>Daftar Pejabat:</b></label>
                    </div>
                    <div class="col-md-10">
                        <select name="idpejabat" id="" class="form-control">
                            @foreach ($pejabat as $p)
                                <option value="{{$p->id}}">{{$p->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label"><b>Bulan dan Tahun Penandatanganan:</b></label>
                    </div>
                        <input type="hidden" name="idgap" value="{{$id}}">
                    <div class="col-md-10">
                        <?php $years = range(1900, strftime("%Y", time())); ?>
                        <div class="row">
                            <div class="col-md-6">
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

                            <?php $month = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'); ?>
                            <div class="col-md-6">
                                <select  class="select22" name="bulan" id="bulan" required="" style="width: 100%">
                                    <option value="">--Pilih Bulan--</option>
                                    <?php $count=1 ?>
                                    @foreach($month as $r)
                                    <option value="{{$r}}">{{$r}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row justify-content-end">
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </div>
            </div>
        </form>

        </div>
        <!-- /Panel Event -->

    </div>
</div>
<!-- /main charts -->


@endsection
