@extends('index')
@section('tempat_content')

<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="panel panel-body bg-danger-400 has-bg-image">
                    <div class="media no-margin">
                        <div class="media-body">
                            <h3 class="no-margin">{{ $count_pengunjung_hari_ini }}</h3>
                            <span class="text-uppercase text-size-mini">Jumlah Pengunjung Hari ini</span>
                        </div>

                        <div class="media-right media-middle">
                            <i class="icon-bag icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-3">
                <div class="panel panel-body bg-indigo-400 has-bg-image">
                    <div class="media no-margin">
                        <div class="media-left media-middle">
                            <i class="icon-enter6 icon-3x opacity-75"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="no-margin">{{ $count_pengunjung_kemarin }}</h3>
                            <span class="text-uppercase text-size-mini">Jumlah Pengunjung Kemarin</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-3">
                <div class="panel panel-body bg-success-400 has-bg-image">
                    <div class="media no-margin">
                        <div class="media-left media-middle">
                            <i class="icon-pointer icon-3x opacity-75"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="no-margin">{{$count_total_pengunjung}}</h3>
                            <span class="text-uppercase text-size-mini">Jumlah Pengunjung Total</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-3">
                <div class="panel panel-body bg-primary-400 has-bg-image">
                    <div class="media no-margin">
                        <div class="media-left media-middle">
                            <i class="icon-stairs-up icon-3x opacity-75"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="no-margin"><?php echo number_format((float)$rata_rating, 2, '.', '');
                                ?></h3>
                            <span class="text-uppercase text-size-mini">Jumlah Rata-Rata Pooling</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <h2>Rekap Visitor per Tanggal</h2>
                <div id="myfirstchart" style="height: 300px;"></div>
            </div>
            <div class="col-6">
                <h2>Jumlah Data PPRG</h2>
                <div id="chartgap" style="height: 380px;"></div>
            </div>
        </div>
    </div>
</div>
<div class="panel-body">
</div>
@endsection

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [
            @foreach($arr_tanggal_visit as $a)
            { y: '{{$a->visit_date}}', a: {{$a->total}} },
            @endforeach
        ],
        // The name of the data record attribute that contains x-values.
        xkey: 'y',
        ykeys: 'a',
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Jumlah']
        });


    });
    document.addEventListener("DOMContentLoaded", function(event) {
        new Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'chartgap',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [
            @foreach($arr_count_pprg as $a)
            { y: '@if($a->status==1)GAP @elseif($a->status==2)PAG @else KAK @endif', a: {{$a->total}} },
            @endforeach
        ],
        // barColors:['#1E2227'],
        // The name of the data record attribute that contains x-values.
        xkey: 'y',
        ykeys: 'a',
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Jumlah']
        });


    });

</script>
