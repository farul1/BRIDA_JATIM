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
                    <h6 class="panel-title">Data Timeline Dokumen </h6>
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
                            onclick="upload_perbaikan_data('{{ csrf_token() }}', '{{$id}}','#ModalBiruSm')">Upload Perbaikan Data
                            <i class="icon-plus3 position-right"></i></a>
                    </div>
                    <br>
                    <div class="">
                        <table class="table table-bordered table-hover datatable-basic">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Waktu</th>
                                    <th>Dokumen</th>
                                    <th>Jenis Dokumen</th>
                                    <th width="10%">Diupload Oleh</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">File Revisi</th>
                                    <th style="width: 50px !important">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $status = '-';
                                $style = '';
                                ?>
                                @foreach ($proposal as $r)
                                    @php
                                        $no++;
                                        $id = $r['id'];
                                        $revisi_id = $r['id_revisi'];
                                    @endphp

                                    @if ($r->status == NULL)
                                    @php  $status = 'Belum disetujui';
                                            $style = 'label bg-grey label-rounded';
                                        @endphp
                                    @elseif($r->status == 1)
                                        @php $status = 'Telah Disetjui';
                                            $style = 'label bg-success label-rounded"';
                                        @endphp
                                    @elseif($r->status == 2)
                                        @php $status = 'Direvisi';
                                            $style = 'label bg-warning label-rounded';
                                        @endphp 
                                    @elseif($r->status == 3)
                                        @php $status = 'Revisi Admin';
                                            $style = 'label bg-orange label-rounded';
                                        @endphp
                                    @endif
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $r->created_at }}</td>
                                        <td>{{$r->nama_dokumen}}</td> 
                                        <td>Proposal</td> 
                                        <td>{{$r->users->username}}</td> 
                                        <td><span class="{!! $style !!}"> {{$status}} </span></td> 
                                        <td><a href="{{asset($r->link_revisi)}}" target="_blank">Link</a></td> 
                                        <td>
                                            <div class="btn-group btn-block btn-group-velocity">
                                                <button type="button" class="btn bg-blue btn-sm btn-block dropdown-toggle"
                                                    data-toggle="dropdown"><i class="glyphicon glyphicon-th-list"></i> Act
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    @if(Auth::user()->id_role== 1 && $r->status != 3)
                                                    <li>
                                                        <button type="button"
                                                            onclick="verifikasi_proposal('{{ csrf_token() }}', '{{ $revisi_id }}', '#ModalTealSm')"
                                                            id="modal_update_proposal_data" title="Ubah"
                                                            class="btn bg-teal-400 btn-xs btn-block">
                                                            <i class="glyphicon glyphicon-edit"></i>Verifikasi</button>
                                                    </li>
                                                    @endif
                                                    <li>
                                                        <button type="button"
                                                            onclick="hapus_data_revisi_data('{{ csrf_token() }}','{{ $r->id_revisi }}')"
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
