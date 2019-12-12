@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/createexam.css')}}">
<script src="{{asset('js/Chart.js')}}"></script>
<div class="container">
    <div class="text-center header-text mt-4">
        <h1>{{$info['exam_name']}}</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="grid">
                <div class="grid-header">
                    <h5>Exam infomation</h5>
                </div>
                <div class="grid-body">
                    <div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Exam Name : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p>{{$info['exam_name']}}</p>
                            </div>
                        </div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Exam Subject : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p>{{$info['exam_kind']}}</p>
                            </div>
                        </div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Exam Describe : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p>{{$info['exam_describe']}}</p>
                            </div>
                        </div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Exam Created At : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p>{{$info['created_at']}}</p>
                            </div>
                        </div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Exam Time : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p>{{$info['exam_time']}}p</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="grid">
                <div class="grid-header">
                    <h5>Infomation of list user</h5>
                </div>
                <div class="grid-body">
                    <div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Number User : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p></p>
                            </div>
                        </div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Max Score : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p></p>
                            </div>
                        </div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Min Score : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p></p>
                            </div>
                        </div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Medium Score : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="grid">
                <div class="grid-header">
                    <h5>Chart</h5>
                </div>
                <div class="grid-body">
                    <canvas style="height:300px" id="graph">

                    </canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="grid">
                <div class="grid-header">
                    <h5>List scores</h5>
                </div>
                <div class="grid-body">
                    <div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Score</th>
                                    <th scope="col">Create Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $list)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->scores}}</td>
                                    <td>{{$list->created_at}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function drawChart() {
        var number = @json($number);
        console.log(number);
        var type = [];
        for (var i = 0; i <= number; i++) {
            var score = Math.round(((i * 10) / number) * 100) / 100;
            type.push(score);
        }
        //console.log(type);
        var data = @json($scores);
        var numberOfType = [];
        for (var i = 0; i < type.length; i++) {
            numberOfType[i] = 0;
            for (var j = 0; j < data.length; j++) {
                if (type[i] == data[j]['scores']) {
                    numberOfType[i]++;
                }
            }
        }
        console.log(numberOfType);
        new Chart(document.getElementById("graph"), {
            type: "bar",
            data: {
                labels: type,
                datasets: [{
                
                data: numberOfType,
                }]
            },
            options: {
            legend: { display: false },
            }
        });
        
    }
    document.addEventListener('DOMContentLoaded', function() {
        drawChart()
    });
</script>

@endsection