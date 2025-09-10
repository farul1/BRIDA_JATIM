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
                    <h6 class="panel-title">Data Proposal </h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>

                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div>
                        <a class="btn btn-info"
                            onclick="tambah_data_proposal_data('{{ csrf_token() }}', '#ModalBiruSm')">Tambah Data
                            <i class="icon-plus3 position-right"></i></a>
                    </div>
                    <br>
                    <div class="">
                        <table class="table table-bordered table-hover datatable-basic">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th width="10%">Timeline</th>
                                    <th style="width: 50px !important">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $style = '';
                                ?>
                                @foreach ($proposal as $r)
                                    @php
                                $status = '-';
                                        $no++;
                                        $id = $r['id'];
                                    @endphp

                                    @if ($r->status == NULL)
                                    @php  $status = 'Belum Dibaca';
                                            $style = 'label bg-grey label-rounded';
                                        @endphp
                                    @elseif($r->status == 1)
                                        @php $status = 'Telah Dibaca';
                                            $style = 'label bg-info label-rounded"';
                                        @endphp
                                    @elseif($r->status == 2)
                                        @php $status = 'Disetujui';
                                            $style = 'label bg-success label-rounded';
                                        @endphp
                                    @endif
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $r->judul_proposal }}</td>
                                        <td><span class="{!! $style !!}"> {{$status}} </span></td> 
                                        <td align="center"> 
                                            <?php
                                            $key = saleh_encrypt($r->id . $r->created_at . '##' . $r->id . '##' .$r->created_at, 'progstylysbysaleh');
                                            ?>
                                            <a href="{{ route('timeline_dokumen',$key) }}" target="_blank" title="Set Aksi"
                                               class="btn btn-xs bg-green-800 ">
                                                <i class="icon-archive"></i>  Timeline Dokumen
                                            </a> 
                                        </td> 
                                        <td>
                                            <div class="btn-group btn-block btn-group-velocity">
                                                <button type="button" class="btn bg-blue btn-sm btn-block dropdown-toggle"
                                                    data-toggle="dropdown"><i class="glyphicon glyphicon-th-list"></i> Act
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <button type="button"
                                                            onclick="ubah_data_proposal_data('{{ csrf_token() }}', '{{ $id }}', '#ModalTealSm')"
                                                            id="modal_update_proposal_data" title="Ubah"
                                                            class="btn bg-teal-400 btn-xs btn-block">
                                                            <i class="glyphicon glyphicon-eye"></i>Detail</button>
                                                    </li>
                                                    <li>
                                                        <button type="button"
                                                            onclick="hapus_data_proposal_data('{{ csrf_token() }}','{{ $r->id }}')"
                                                            data-toggle="modal" title="Hapus"
                                                            class="btn btn-danger btn-xs btn-block">
                                                            <i class="glyphicon glyphicon-remove"></i>Hapus</button>
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
            <!-- /Panel Event -->

        </div>
    </div>
    <!-- /main charts -->

@endsection
