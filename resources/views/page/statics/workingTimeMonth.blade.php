@extends('layouts/contentLayoutMaster')

@section('title','static working time by month')

@section('content')

    <div style="height: 400px;width: 900px;margin: auto;">
        <canvas id="barChart"></canvas>
    </div>
    @section('page-script')
    <script>
        $(function(){
            var datas = <?php echo json_encode($workingTimes); ?>;
            var barCanvas = $("#barChart");
            var barChart = new Chart(barCanvas,{
                type:'bar',
                data:{
                    labels:['offSite','Remote','onSite','off'],
                    datasets:[
                        {
                            label:'static working time on month by employee, 2022',
                            data:datas,
                            backgroundColor:['red','orange','yellow','green','blue','indigo','violet','purple','pink','silver','gold','brown'],
                        }
                    ]
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        })
    </script>
    @endsection
@endsection
