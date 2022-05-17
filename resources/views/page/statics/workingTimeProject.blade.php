@extends('layouts/contentLayoutMaster')

@section('title','static working time by project')

@section('content')
    <div style="height: 400px;width: 900px;margin: auto;">
        <canvas id="barChart"></canvas>
    </div>

    @section('page-script')
        <script>
            $(function () {
                var datas = <?php echo json_encode($workingTimes); ?>;
                var barCanvas = $("#barChart");
                var barChart = new Chart(barCanvas, {
                    type: 'bar',
                    data: {
                        labels: [
                            @foreach($projectNames as $projectName)
                                '{{$projectName}}',
                            @endforeach
                        ],
                        datasets: [
                            {
                                label: 'static working time on project by employee, 2022',
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
