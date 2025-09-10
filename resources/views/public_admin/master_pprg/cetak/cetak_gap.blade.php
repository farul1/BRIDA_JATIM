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
        padding: 10px;
    }
    </style>

</head>
<body>
    <p>1. MATRIK LEMBAR KERJA</p>
    <p>BADAN PENELITIAN DAN PENGEMBANGAN PROVINSI JAWA TIMUR</p>
    <br>
    <table style="">
        <thead style="text-align: center;">
            <tr>
                <th width="11.1%">Langkah 1</th>
                <th width="11.1%">Langkah 2</th>
                <th width="11.1%">Langkah 3</th>
                <th width="11.1%">Langkah 4</th>
                <th width="11.1%">Langkah 5</th>
                <th width="11.1%">Langkah 6</th>
                <th width="11.1%">Langkah 7</th>
                <th width="11.1%">Langkah 8</th>
                <th width="11.1%">Langkah 9</th>
            </tr>
            <tr style="text-align: center;">
                <td rowspan="2">NAMA KEBIJAKAN / PROGRAM / KEGIATAN</td>
                <td rowspan="2">DATA PEMBUKA WAWASAN</td>
                <td colspan="3">ISU GENDER</td>
                <td colspan="2">KEBIJAKAN DAN RENCANA AKSI</td>
                <td colspan="2">PENGUKURAN HASIL</td>
            </tr>

            <tr style="text-align: center;">
                <td>FAKTOR KESENJANGAN</td>
                <td>SEBAB FAKTOR INTERNAL</td>
                <td>SEBAB FAKTOR EXTERNAL</td>
                <td>REFORMASI TUJUAN</td>
                <td>RENCANA AKSI</td>
                <td>BASIS DATA (BASE-LINE)</td>
                <td>INDIKATOR KINERJA</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <p>Kebijakan :</p>
                    <p>{{$gap->kebijakan}}</p>
                    <p>Program :</p>
                    <p>{{$gap->program}}</p>
                    <p>Tujuan :</p>
                    <p>{{$gap->tujuan}}</p>
                    <p>Sasaran :</p>
                    <p>{{$gap->sasaran}}</p>
                </td>
                <td>
                    {!! $gap->data_pembukaan_wawasan !!}
                </td>
                <td>
                    <p>Akses :</p>
                    <p>{!!$gap->akses!!}</p>
                    <p>Partisipasi :</p>
                    <p>{!!$gap->partisipasi!!}</p>
                    <p>Kontrol :</p>
                    <p>{!!$gap->kontrol!!}</p>
                    <p>Manfaat :</p>
                    <p>{!!$gap->manfaat!!}</p>
                </td>
                <td>
                    <p>{!!$gap->sebab_faktor_internal!!}</p>
                </td>
                <td>
                    <p>{!!$gap->sebab_faktor_eksternal!!}</p>
                </td>
                <td>
                    <p>{!!$gap->reformulasi_tujuan!!}</p>
                </td>
                <td>
                    @foreach ($rencana_aksi as $aksi)
                    <p>{{$loop->iteration}}. {{$aksi->uraian}}</p>
                    @endforeach
                </td>
                <td>
                    {!!$gap->basis_data!!}
                </td>
                <td>
                    <p>Indikator Output :</p>
                    {!!$gap->indikator_output!!}
                    <p>Indikator Outcome :</p>
                    {!!$gap->indikator_outcome!!}
                </td>
            </tr>
        </tbody>
    </table>
</body>

<script>
    window.print()
</script>
</html>

