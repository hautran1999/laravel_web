@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/myexam.css')}}">

<div class="container mb-4">
    <div class="text-center header-text">
        <h1>Dashboard</h1>
    </div>
    <div class="grid">
        <div class="grid-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm container your-create" style="cursor:pointer"
                        onclick="showCreate()">
                        <div class="row">
                            <div class="col-sm-6 card-content">
                                <h1>{{count($exam_created)}}</h1>
                                <h3>Created</h3>
                            </div>
                            <div class="col-sm-6 card-content"><i class="fa fa-edit icon-size"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm container your-running" style="cursor:pointer"
                        onclick="showRunning()">
                        <div class="row">
                            <div class="col-sm-6 card-content">
                                <h1>{{count($exam_running)}}</h1>
                                <h3>Running</h3>
                            </div>
                            <div class="col-sm-6 card-content"><i class="fa fa-rocket icon-size"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm container your-join" style="cursor:pointer" onclick="showJoin()">
                        <div class="row">
                            <div class="col-sm-6 card-content">
                                <h1>{{count($exam_join)}}</h1>
                                <h3>Join</h3>
                            </div>
                            <div class="col-sm-6 card-content"><i class="fa fa-mortar-board icon-size"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="created">
        <div class="grid">
            <div class="grid-body">
                <div>
                    <h3 class="d-inline">My exam created</h3>
                    <form class="form-inline my-2 my-lg-0 search-form">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="grid">
            <div class="grid-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th style="width:150px;" scope="col">Exam</th>
                            <th scope="col">Subject</th>
                            <th style="width:250px;" scope="col">Describe</th>
                            <th scope="col">Create Date</th>
                            <th style="width:400px;" scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exam_created as $ex)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>
                                <span>{{$ex->exam_name}}</span><br>
                                <small>{{$ex->name}}</small>
                            </td>
                            <td>{{$ex->exam_kind}}</td>
                            <td>{{$ex->exam_describe}}</td>
                            <td>{{$ex->created_at}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-2 text-center">
                                        <a href="{{route('pass_exam',$ex->exam_name.'&&'.$ex->exam_id)}}"><button
                                                type="button" class="btn btn-success"><i
                                                    class="fa fa-graduation-cap"></i></button><br>
                                            <p class="text-center">Test</p>
                                        </a>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <a href="{{route('info',$ex->exam_name.'&&'.$ex->exam_id)}}"><button
                                                type="button" class="btn btn-info"><i
                                                    class="fa fa-bar-chart"></i></button><br>
                                            <p class="text-center">Info</p>
                                        </a>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <a href="{{route('edit',$ex->exam_name.'&&'.$ex->exam_id)}}"><button
                                                type="button" class="btn btn-primary"><i
                                                    class="fa fa-edit"></i></button><br>
                                            <p class="text-center">EditExam</p>
                                        </a>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <a href="{{route('edit_info',$ex->exam_name.'&&'.$ex->exam_id)}}"><button
                                                type="button" class="btn btn-warning"><i
                                                    class="fa fa-pencil"></i></button><br>
                                            <p class="text-center">EditInfo</p>
                                        </a>
                                    </div>
                                    @if($ex->running==0)
                                    <div class="col-sm-2 text-center">
                                        <a href="{{route('run_exam',$ex->exam_id)}}"><button type="button"
                                                class="btn btn-secondary"><i class="fa fa-play"></i></button><br>
                                            <p class="text-center">Run</p>
                                        </a>
                                    </div>
                                    @else
                                    <div class="col-sm-2 text-center">
                                        <a href="{{route('stop_exam',$ex->exam_id)}}"><button type="button"
                                                class="btn btn-secondary"><i class="fa fa-play"></i></button><br>
                                            <p class="text-center">Stop</p>
                                        </a>
                                    </div>
                                    @endif
                                    <div class="col-sm-2 text-center">
                                        <a href="{{route('delete_exam',$ex->exam_id)}}"><button type="button"
                                                class="btn btn-danger"><i class="fa fa-trash-o"></i></button><br>
                                            <p class="text-center">Delete</p>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="hero-content text-center">
            <button type="button" onclick="document.getElementById('create').style.display='block'"
                class="btn clever-btn">Create
                exam</button>
            <div id="create" class="modal">
                <form action="{{route('post_myexam')}}" method="POST">
                    @csrf
                    <div class="animate container container-modal bg-light">
                        <span onclick="document.getElementById('create').style.display='none'" class="close"
                            title="Close Modal">&times;</span>
                        <div class="container">
                            <h2 class="pt-2 pb-2">Create exam</h2>

                            <label style="float: left;">
                                <h6>Name Exam :</h6>
                            </label>
                            <input type="text" name="exam_name" class="form-control" required>
                            <label style="float: left;">
                                <h6>Password Exam :</h6>
                            </label>
                            <input type="text" name="exam_password" class="form-control">
                            <label style="float: left;">
                                <h6>Describe Exam:</h6>
                            </label>
                            <textarea class="form-control" name="exam_describe"></textarea>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label style="float: left;">
                                        <h6>Exam Time :</h6>
                                    </label>
                                    <input type="text" name="exam_time" class="form-control" required>
                                </div>
                                <div class="col-sm-6">
                                    <label style="float: left;">
                                        <h6>Subjects :</h6>
                                    </label>
                                    <select name="exam_kind" class="form-control">
                                        <option>Math</option>
                                        <option>Physical</option>
                                        <option>Chemistry</option>
                                        <option>Biological</option>
                                        <option>History</option>
                                        <option>Geography</option>
                                        <option>Literary</option>
                                        <option>Different</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn clever-btn mt-4 mb-4 bg-dark text-white">Create
                                Exam</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="running">
        <div class="grid">
            <div class="grid-body">
                <div>
                    <h3 class="d-inline">My exam Running</h3>
                    <form class="form-inline my-2 my-lg-0 search-form">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="grid">
            <div class="grid-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th style="width:150px;" scope="col">Exam</th>
                            <th scope="col">Subject</th>
                            <th style="width:250px;" scope="col">Describe</th>
                            <th scope="col">Create Date</th>
                            <th style="width:400px;" scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exam_running as $ex)
                        <tr>
                            <th scope="row">{{$run++}}</th>
                            <td>
                                <span>{{$ex->exam_name}}</span><br>
                                <small>{{$ex->name}}</small>
                            </td>
                            <td>{{$ex->exam_kind}}</td>
                            <td>{{$ex->exam_describe}}</td>
                            <td>{{$ex->created_at}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-2 text-center">
                                        <a href="{{route('pass_exam',$ex->exam_name.'&&'.$ex->exam_id)}}"><button
                                                type="button" class="btn btn-success"><i
                                                    class="fa fa-graduation-cap"></i></button><br>
                                            <p class="text-center">Test</p>
                                        </a>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <a href="{{route('info',$ex->exam_name.'&&'.$ex->exam_id)}}"><button
                                                type="button" class="btn btn-info"><i
                                                    class="fa fa-bar-chart"></i></button><br>
                                            <p class="text-center">Info</p>
                                        </a>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <a href="{{route('edit',$ex->exam_name.'&&'.$ex->exam_id)}}"><button
                                                type="button" class="btn btn-primary"><i
                                                    class="fa fa-edit"></i></button><br>
                                            <p class="text-center">EditExam</p>
                                        </a>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <a href="{{route('edit_info',$ex->exam_name.'&&'.$ex->exam_id)}}"><button
                                                type="button" class="btn btn-warning"><i
                                                    class="fa fa-pencil"></i></button><br>
                                            <p class="text-center">EditInfo</p>
                                        </a>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <a href="{{route('stop_exam',$ex->exam_id)}}"><button type="button"
                                                class="btn btn-secondary"><i class="fa fa-play"></i></button><br>
                                            <p class="text-center">Stop</p>
                                        </a>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <a href="{{route('delete_exam',$ex->exam_id)}}"><button type="button"
                                                class="btn btn-danger"><i class="fa fa-trash-o"></i></button><br>
                                            <p class="text-center">Delete</p>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="join">
        <div class="grid">
            <div class="grid-body">
                <div>
                    <h3 class="d-inline">Exam join</h3>
                    <form class="form-inline my-2 my-lg-0 search-form">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="grid">
            <div class="grid-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th style="width:200px;" scope="col">Exam</th>
                            <th scope="col">Subject</th>
                            <th style="width:300px;" scope="col">Describe</th>
                            <th scope="col">Create Date</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exam_join as $ex)
                        <tr>
                            <th scope="row">{{$j++}}</th>
                            <td>
                                <span>{{$ex->exam_name}}</span><br>
                                {{-- <small>{{$ex->name}}</small> --}}
                            </td>
                            <td>{{$ex->exam_kind}}</td>
                            <td>{{$ex->exam_describe}}</td>
                            <td>{{$ex->created_at}}</td>

                            <td>
                                <div class="row">
                                    <div class="col-sm-4 text-center">
                                        <a href="{{route('pass_exam',$ex->exam_name.'&&'.$ex->exam_id)}}"><button
                                                type="button" class="btn btn-success"><i
                                                    class="fa fa-graduation-cap"></i></button><br>
                                            <p class="text-center">Test</p>
                                        </a>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <a href="{{route('info_exam',$ex->exam_name.'&&'.$ex->exam_id)}}"><button
                                                type="button" class="btn btn-info"><i
                                                    class="fa fa-bar-chart"></i></button><br>
                                            <p class="text-center">Info</p>
                                        </a>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <a href="{{route('report',$ex->exam_name.'&&'.$ex->exam_id)}}"><button
                                                type="button" class="btn btn-danger"><i
                                                    class="fa fa-exclamation-circle"></i></button><br>
                                            <p class="text-center">Report</p>
                                        </a>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var modal = document.getElementById('create');
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    function showJoin(){
        $('#running').hide();
        $('#created').hide();
        $('#join').show();
        //$('#created').hide();
    }
    function showCreate(){
        $('#running').hide();
        $('#join').hide();
        $('#created').show();
        
    }
    function showRunning(){
        $('#join').hide();
        $('#created').hide();
        $('#running').show();
    }
    document.addEventListener('DOMContentLoaded', function() {
        showCreate();
    });
</script>
@endsection