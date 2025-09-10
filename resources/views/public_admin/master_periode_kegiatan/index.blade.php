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
                    <span>×</span><span class="sr-only">Close</span>
                </button>
                <span class="text-semibold">Berhasil! </span> {{ session()->get('status') }}
                {{ session()->forget('status') }}
            </div>
        @endif

        @if (session()->has('statusT'))
            <div class="alert alert-warning alert-styled-left">
                <button type="button" class="close" data-dismiss="alert">
                    <span>×</span><span class="sr-only">Close</span>
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
                <h6 class="panel-title">Periode Kegiatan</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div class="form-group">
                    <label>Masukkan Tanggal Aktif Halaman Pendaftaran Proposal:</label>

                    <form action="{{ route('simpan_periodekegiatan') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                            <input type="text" name="periode" class="form-control daterange-single"
                                placeholder="Pilih tanggal"
                                value="{{ old('periode', $periodekegiatan->periode_akhir ?? '') }}">
                        </div>

                        @error('periode')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror

                        <br>
                        <button type="submit" class="btn btn-primary"><i class="icon-check"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Panel Event -->
    </div>
</div>
<!-- /main charts -->
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('template/assets/css/daterangepicker.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('template/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/daterangepicker.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.daterange-single').daterangepicker({
                singleDatePicker: true,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
        });
    </script>
@endpush

