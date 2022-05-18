@extends('layouts/contentLayoutMaster')

@section('title','static working time by month')

@section('content')

    <div class="container" style="margin-bottom: 30px">
        <form class="form-inline my-2 my-lg-0">
            <label>From:</label>
            <input name="fromDate" type="date">
            <label>To:</label>
            <input name="toDate" type="date">
            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">search</button>
        </form>
    </div>

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
