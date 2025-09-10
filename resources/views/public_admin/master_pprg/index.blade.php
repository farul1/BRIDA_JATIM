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
        {{-- Notifikasi sukses --}}
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

        {{-- Notifikasi gagal --}}
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
                <h6 class="panel-title">Data PPRG</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div>
                    <a class="btn btn-info" href="{{ route('tambahgap') }}">
                        Tambah Data <i class="icon-plus3 position-right"></i>
                    </a>
                </div>
                <br>

                <div>
                    <table class="table table-bordered table-hover datatable-basic">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Program</th>
                                <th>Status Akhir</th>
                                <th>Cetak Dokumen</th>
                                <th style="width: 50px !important">Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp

                            @forelse ($gap as $r)
                                @php
                                    $no++;
                                @endphp
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $r->program }}</td>
                                    <td>
                                        @if ($r->status == 1)
                                            <span class="label label-primary">GAP</span>
                                        @elseif ($r->status == 2)
                                            <span class="label label-warning">PAG</span>
                                        @else
                                            <span class="label label-success">KAK</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{ route('cetak_gap', $r->id) }}" class="btn btn-primary">
                                            <i class="glyphicon glyphicon-print"></i> Cetak GAP
                                        </a>

                                        @if ($r->status >= 2)
                                            <a target="_blank" href="{{ route('cetak_pag', $r->id) }}" class="btn btn-warning">
                                                <i class="glyphicon glyphicon-print"></i> Cetak PAG
                                            </a>
                                        @endif

                                        @if ($r->status >= 3)
                                            <a target="_blank" href="{{ route('cetak_kak', $r->id) }}" class="btn btn-success">
                                                <i class="glyphicon glyphicon-print"></i> Cetak KAK
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-block btn-group-velocity">
                                            <button type="button" class="btn bg-blue btn-sm btn-block dropdown-toggle"
                                                data-toggle="dropdown">
                                                <i class="glyphicon glyphicon-th-list"></i> Act <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{ route('ubah_gap', $r->id) }}">
                                                        <button type="button" title="Ubah" class="btn bg-teal-400 btn-xs btn-block">
                                                            <i class="glyphicon glyphicon-edit"></i>Ubah
                                                        </button>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a>
                                                        <button type="button"
                                                            onclick="hapus_pprg('{{ csrf_token() }}','{{ $r->id }}')"
                                                            data-toggle="modal" title="Hapus"
                                                            class="btn btn-danger btn-xs btn-block">
                                                            <i class="glyphicon glyphicon-remove"></i>Hapus
                                                        </button>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data</td>
                                </tr>
                            @endforelse
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
