@extends('layouts/contentLayoutMaster')

@section('title','static total time by member')

@section('content')
    <div style="height: 400px;width: 900px;margin: auto;">
        <canvas id="barChart"></canvas>
    </div>
    @section('page-script')
        <script>
            $(function () {
                var datas = <?php echo json_encode($totalTime); ?>;
                var barCanvas = $("#barChart");
                var barChart = new Chart(barCanvas, {
                    type: 'bar',
                    data: {
                        labels: [
                            @foreach($users as $user)
                                '{{$user->name}}',
                            @endforeach
                        ],
                        datasets: [
                            {
                                label: 'static total time on project by member, 2022',
                                data: datas,
                                backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet', 'purple', 'pink', 'silver', 'gold', 'brown'],
                            }
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            })
        </script>
    @endsection
@endsection
