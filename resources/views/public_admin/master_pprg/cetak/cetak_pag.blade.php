<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak GAP</title>
    <style>
        table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
        padding: 5px;

    }
    </style>

</head>
<body>
    <table style="width: 100%;">
        <thead style="text-align: center;">
            <tr>
                <th width="100%" colspan="4">PERNYATAAN ANGGARAN GENDER (PAG) /
                    GENDER BUDGET STATEMENT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>SKPD</td>
                <td colspan="3">Badan Penelitian dan Pengembangan Provinsi Jawa Timur</td>
            </tr>
            <tr>
                <td>TAHUN ANGGARAN</td>
                <td colspan="3">Tahun Anggaran {{$pag->tahun}}</td>
            </tr>
            <tr>
                <td>PROGRAM / KEGIATAN / TUJUAN</td>
                <td colspan="3">
                    <p><b>Kebijakan:</b></p>
                    <p>{!!$gap->kebijakan!!}</p>
                    <p><b>Program:</b></p>
                    <p>{!!$gap->program!!}</p>
                    <p><b>Tujuan:</b></p>
                    <p>{!!$gap->tujuan!!}</p>
                </td>
            </tr>
            <tr>
                <td>KODE PROGRAM</td>
                <td colspan="3">
                    {!!$pag->kode_program!!}
                </td>
            </tr>
            <tr>
                <td>ANALISIS SITUASI</td>
                <td colspan="3">
                    <p><b>A. Data Pembuka Wawasan</b></p>
                    {!! $gap->data_pembukaan_wawasan !!}
                    <p><b>B. Isu Kesenjangan Gender</b></p>
                    <p><b>Faktor Kesenjangan</b></p>
                    <p><b>Akses:</b></p>
                    <p>{!!$gap->akses!!}</p>
                    <p><b>Partisipasi :</b></p>
                    <p>{!!$gap->partisipasi!!}</p>
                    <p><b>Kontrol :</b></p>
                    <p>{!!$gap->kontrol!!}</p>
                    <p><b>Manfaat :</b></p>
                    <p>{!!$gap->manfaat!!}</p>
                    <p><b>Penyebab Kesenjangan Internal :</b></p>
                    <p>{!!$gap->sebab_faktor_internal!!}</p>
                    <p><b>Penyebab Kesenjangan Eksternal :</b></p>
                    <p>{!!$gap->sebab_faktor_eksternal!!}</p>

                </td>
            </tr>
            <tr>
                <td rowspan="2">Capaian Program</td>
                <td colspan="3">
                    <p><b>1. Tolak Ukur: Tujuan Program yang telah direformulasi</b></p>
                    <p><b>Tujuan Awal:</b></p>
                    <p>{!!$gap->tujuan!!}</p>
                    <p><b>Tujuan Program yang telah direformulasi:</b></p>
                    <p>{!!$gap->reformulasi_tujuan!!}</p>

                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <p><b>1. Indikator dan Target Kinerja</b></p>
                    <p><b>Indikator outcome</b></p>
                    <p>Pada tahun {{$pag->tahun}}, {!!$gap->indikator_outcome!!}</p>
                </td>
            </tr>
            <tr>
                <td>JUMLAH ANGGARAN PROGRAM / KEGIATAN</td>
                <td colspan="3">Total anggaran program/kegiatan sesuaikan dengan DPA Rp. <?php echo number_format($pag->jumlah_anggaran,2,',','.');?></td>
            </tr>
            <tr>
                <td rowspan="{{$rencana_aksi->count() * 4 +1}}">RENCANA AKSI</td>
            </tr>
            @foreach ($rencana_aksi as $aksi)
                <tr>
                    <td rowspan="4">Kegiatan {{$loop->iteration}}</td>
                    <td colspan="3">{{$aksi->uraian}}</td>
                </tr>
                <tr>
                    <td>Masukan/Input</td>
                    <td>{{$aksi->input}}</td>
                </tr>
                <tr>
                    <td>Keluaran/Output</td>
                    <td>{{$aksi->output}}</td>
                </tr>
                <tr>
                    <td>Hasil Outcome</td>
                    <td>{{$aksi->outcome}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Surabaya,&nbsp &nbsp&nbsp {{$bulan}} -{{$tahun}}</p>
    <br>
    {{$pejabat->jabatan}}
    <br>
    Provinsi Jawa Timur
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    {{$pejabat->nama}}
    <br>
    {{$pejabat->pangkat}}
    <br>
    NIP.{{$pejabat->nip}}
</body>

<script>
    window.print()
</script>
</html>

