@extends('index')
@section('tempat_content')

<div class="row">
    <div class="col-md-12">
        {{-- Alert jika berhasil --}}
        @if (session('status'))
            <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                <span class="text-semibold">Berhasil!</span> {{ session('status') }}
            </div>
        @endif

        {{-- Alert jika gagal --}}
        @if (session('statusT'))
            <div class="alert alert-warning alert-styled-left">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                <span class="text-semibold">Gagal!<br></span> {{ session('statusT') }}
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-indigo">
            <div class="panel-heading">
                <h6 class="panel-title">Data Link Terkait</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                {{-- Tombol Tambah --}}
                <a class="btn btn-info" onclick="tambah_data_linkterkait('{{ csrf_token() }}', '#ModalBiru')">
                    Tambah Data <i class="icon-plus3 position-right"></i>
                </a>
                <br><br>

                {{-- Tabel Data --}}
                <table class="table table-bordered table-hover datatable-basic">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Link</th>
                            <th width="15%">Logo</th>
                            <th class="text-center" style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($link as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->name }}</td>
                                <td>{{ $r->link }}</td>

                                {{-- Gambar Logo --}}
                                <td>
                                    @if ($r->gambar_logo)
                                        <img src="{{ asset('file_upload/link_terkait/' . $r->gambar_logo) }}"
                                             alt="Logo {{ $r->name }}" class="img-fluid" style="max-height: 40px;">
                                    @else
                                        <span class="text-muted">Tidak ada logo</span>
                                    @endif
                                </td>

                                {{-- Tombol Aksi --}}
                                <td class="text-center">
                                    <div class="btn-group btn-block btn-group-velocity">
                                        <button type="button" class="btn bg-blue btn-sm btn-block dropdown-toggle"
                                                data-toggle="dropdown">
                                            <i class="glyphicon glyphicon-th-list"></i> Aksi <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <button type="button"
                                                        onclick="ubah_data_linkterkait('{{ csrf_token() }}', '{{ $r->id }}', '#ModalTeal')"
                                                        title="Ubah"
                                                        class="btn bg-teal-400 btn-xs btn-block">
                                                    <i class="glyphicon glyphicon-edit"></i> Ubah
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button"
                                                        onclick="hapus_data_linkterkait('{{ csrf_token() }}','{{ $r->id }}')"
                                                        title="Hapus"
                                                        class="btn btn-danger btn-xs btn-block">
                                                    <i class="glyphicon glyphicon-remove"></i> Hapus
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data Link Terkait.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
