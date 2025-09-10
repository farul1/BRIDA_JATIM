<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak KAK</title>
    <style>
        table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
        padding: 5px;

    }
    </style>

</head>
<body>
    <h3 style="text-align: center;">KERANGKA ACUAN KEGIATAN</h3>
    <p><b>Nama SKPD : Penelitian Ekonomi, Sumber daya alam dan lingkungan hidup</b></p>
    <p><b>Tahun : {{$pag->tahun}}</b></p>
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td>Program</td>
                <td>{{$gap->program}}</td>
            </tr>
            <tr>
                <td>Tujuan / Sasaran Program</td>
                <td>{{$gap->tujuan}}</td>
            </tr>
            <tr>
                <td>Kegiatan</td>
                <td>
                    @foreach ($rencana_aksi as $aksi)
                        <p>{{$loop->iteration}}. {{$aksi->uraian}}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Latar Belakang <br> 1. Dasar Hukum</td>
                <td>
                    {!!$kak->dasar_hukum!!}
                </td>
            </tr>
            <tr>
                <td>Gambaran Umum</td>
                <td>
                    {!!$kak->dasar_hukum!!}
                    <br>
                    <p><b>A. Data Pembuka Wawasan</b></p>
                    {!! $gap->data_pembukaan_wawasan !!}
                    <p><b>B. Isu Kesenjangan Gender</b></p>
                    <p><b>Faktor Kesenjangan</b></p>
                    <p><b>Akses:</b></p>
                    <p>{!!$kak->akses!!}</p>
                    <p><b>Partisipasi :</b></p>
                    <p>{!!$kak->partisipasi!!}</p>
                    <p><b>Kontrol :</b></p>
                    <p>{!!$kak->kontrol!!}</p>
                    <p><b>Manfaat :</b></p>
                    <p>{!!$kak->manfaat!!}</p>
                    <p><b>Penyebab Kesenjangan Internal :</b></p>
                    <p>{!!$kak->sebab_faktor_internal!!}</p>
                    <p><b>Penyebab Kesenjangan Eksternal :</b></p>
                    <p>{!!$kak->sebab_faktor_eksternal!!}</p>
                </td>
            </tr>
            <tr>
                <td>Uraian</td>
                <td>
                    <p><b>Tujuan Kegiatan :</b></p>
                    <p>{!!$kak->tujuan_kegiatan!!}</p>
                    <p><b>Penerima Manfaat :</b></p>
                    <p>{!!$kak->penerima_manfaat!!}</p>
                    <p><b>Tempat dan Waktu Pelaksanaan :</b></p>
                    <p>{!!$kak->waktu_mulai!!} sampai {!!$kak->waktu_selesai!!}</p>
                    <p><b>Kegiatan ini selanjutnya dituangkan dalam lima sub kegiatan yaitu :</b></p>
                    <p>{!!$kak->subkegiatan!!}</p>
                </td>
            </tr>
            <tr>
                <td>Indikator Kinerja</td>
                <td>
                    <p><b>Indikator Outcome :</b></p>
                    <p>{!!$gap->indikator_outcome!!}</p>
                    <p><b>Indikator Output :</b></p>
                    <p>{!!$gap->indikator_output!!}</p>
                </td>
            </tr>
            <tr>
                <td>Batasan Kegiatan</td>
                <td>
                    <p>{{$kak->batasan_kegiatan}}</p>
                </td>
            </tr>
            <tr>
                <td>Cara Pelaksanaan Kegiatan</td>
                <td>
                    <p>Tahapan:</p>
                    @foreach ($pelaksanaan as $p)
                        <p>{{$loop->iteration}}. {{$p->label}}</p>
                        <p>{{$p->uraian}}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Waktu pelaksanaan kegiatan</td>
                <td>Durasi : {{$kak->durasi}} Bulan</td>
            </tr>
            <tr>
                <td>Pelaksana dan Penanggungjawab Kegiatan</td>
                <td>
                    <p><b>Pelaksana :</b></p>
                    <p>{!!$kak->pelaksana!!}</p>
                    <p><b>Penanggung Jawab :</b></p>
                    <p>{!!$kak->penanggung_jawab!!}</p>
                </td>
            </tr>
            <tr>
                <td>Biaya</td>
                <td>
                    Alokasi Biaya yang dibutuhkan untuk Kegiatan
                    @foreach ($rencana_aksi as $aksi)
                        {{$aksi->uraian}} ,
                    @endforeach
                    adalah sebesar Rp. <?php echo number_format($kak->biaya,2,',','.');?>
                </td>
            </tr>
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

