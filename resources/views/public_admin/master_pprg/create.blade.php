@extends('index')
@section('tempat_content')
<!-- Main charts -->
<style>
.image-thumb > img:hover {
  width: 500px;
  height: 200px;
}
.ck-editor__editable {
    min-height: 200px;
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
        
        <!-- Tampilkan error validasi -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="col-lg-12">

        <!-- Panel Event -->
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Tambah GAP</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>
            <form action="{{route('simpan_gap')}}" method="post" id="gapForm">
                @csrf
                <div class="panel-body">
                    <div align="center">
                        <h4>MATRIK LEMBAR KERJA</h4>
                        <h4>GENDER ANALYSIS PATHWAY (GAP)</h4>
                        <h4>BADAN PENELITIAN DAN PENGEMBANGAN PROVINSI JAWA TIMUR</h4>
                    </div>
                    <br>
                    
                    <!-- Nama Kebijakan/Program/Kegiatan -->
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
                                                    <textarea rows="3" cols="5" name="kebijakan" class="form-control" required>{{ old('kebijakan') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Program:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea rows="3" cols="5" name="program" class="form-control" required>{{ old('program') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Tujuan:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea rows="3" cols="5" name="tujuan" class="form-control" required>{{ old('tujuan') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Sasaran:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea rows="3" cols="5" name="sasaran" class="form-control" required>{{ old('sasaran') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Data Pembukaan Wawasan -->
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
                                                    <textarea id="datawawasan" name="datawawasan" rows="3" class="form-control">{{ old('datawawasan') }}</textarea>
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
                                                    <textarea id="akses" name="akses" rows="3">{{ old('akses') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Partisipasi:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea id="partisipasi" name="partisipasi" rows="3">{{ old('partisipasi') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Kontrol:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea id="kontrol" name="kontrol" rows="3">{{ old('kontrol') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"><b>Manfaat:</b></label>
                                                <div class="col-lg-10">
                                                    <textarea id="manfaat" name="manfaat" rows="3">{{ old('manfaat') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sebab Faktor Internal -->
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
                                                    <textarea id="faktorinternal" name="faktorinternal" rows="3">{{ old('faktorinternal') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sebab Faktor Eksternal -->
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
                                                    <textarea id="faktoreksternal" name="faktoreksternal" rows="3">{{ old('faktoreksternal') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Reformulasi Tujuan -->
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
                                                    <textarea id="reformulasitujuan" name="reformulasitujuan" rows="3">{{ old('reformulasitujuan') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Rencana Aksi -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <div class="row align-content-between">
                                                <h3 class="panel-title">Rencana Aksi</h3>
                                            </div>
                                            <div class="heading-elements">
                                                <div class="btn-group">
                                                    <button type="button" onclick="tambahfieldrencana()" class="btn btn-success">+ Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="panel-body" id="rencanaaksi">
                                            @if(old('rencanaaksi'))
                                                @foreach(old('rencanaaksi') as $index => $rencana)
                                                <div class="form-group" id="row{{ $index + 1 }}">
                                                    <label class="col-lg-2 control-label"><b>Rencana Aksi:</b></label>
                                                    <div class="col-lg-10">
                                                        <div class="input-group">
                                                            <textarea name="rencanaaksi[]" class="form-control" rows="3" required>{{ $rencana }}</textarea>
                                                            <span class="input-group-btn">
                                                                <button type="button" onclick="hapusrencana({{ $index + 1 }})" class="btn btn-danger">X</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Basis Data -->
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
                                                    <textarea id="basisdata" name="basisdata" rows="3">{{ old('basisdata') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Indikator Kerja -->
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
                                                        <textarea rows="3" cols="5" name="indikatoroutput" class="form-control" required>{{ old('indikatoroutput') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"><b>Indikator Outcome:</b></label>
                                                    <div class="col-lg-10">
                                                        <textarea rows="3" cols="5" name="indikatoroutcome" class="form-control" required>{{ old('indikatoroutcome') }}</textarea>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tombol Submit -->
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

<!-- Script untuk CKEditor dan Form Handling -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    // Inisialisasi CKEditor untuk semua textarea yang diperlukan
    var editorIds = [
        'datawawasan', 'akses', 'partisipasi', 'kontrol', 'manfaat',
        'faktorinternal', 'faktoreksternal', 'reformulasitujuan', 'basisdata'
    ];
    
    var editors = {};
    
    editorIds.forEach(function(id) {
        editors[id] = CKEDITOR.replace(id, {
            height: 200,
            removeButtons: 'Source,Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,Outdent,Indent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Unlink,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Maximize,ShowBlocks,About'
        });
    });

    // Variabel untuk rencana aksi
    var no = {{ old('rencanaaksi') ? count(old('rencanaaksi')) + 1 : 1 }};
    
    function tambahfieldrencana(){
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
        no++;
    }
    
    function hapusrencana(nomor){
        var nama = 'row'+nomor;
        $('#'+nama).remove();
    }

    // Pastikan CKEditor diupdate sebelum form disubmit
    document.getElementById('gapForm').addEventListener('submit', function(e) {
        // Update semua instance CKEditor
        for (var id in editors) {
            if (editors.hasOwnProperty(id)) {
                editors[id].updateElement();
            }
        }
        
        // Validasi minimal satu rencana aksi
        var rencanaAksi = document.querySelectorAll('textarea[name="rencanaaksi[]"]');
        if (rencanaAksi.length === 0) {
            e.preventDefault();
            alert('Minimal harus ada 1 rencana aksi');
            return false;
        }
        
        // Validasi field required
        var requiredFields = document.querySelectorAll('[required]');
        var isValid = true;
        
        requiredFields.forEach(function(field) {
            if (!field.value.trim()) {
                isValid = false;
                field.style.borderColor = 'red';
            } else {
                field.style.borderColor = '';
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            alert('Harap isi semua field yang wajib diisi');
            return false;
        }
    });

    // Tambahkan field rencana aksi otomatis jika belum ada
    $(document).ready(function() {
        var rencanaAksi = document.querySelectorAll('textarea[name="rencanaaksi[]"]');
        if (rencanaAksi.length === 0) {
            tambahfieldrencana();
        }
    });
</script>
@endsection