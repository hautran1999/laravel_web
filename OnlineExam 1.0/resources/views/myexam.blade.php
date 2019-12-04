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
                    <div class="card mb-4 shadow-sm container your-create">
                        <div class="row">
                            <div class="col-sm-6 card-content">
                                <h1>{{count($exam)}}</h1>
                                <h3>Created</h3>
                            </div>
                            <div class="col-sm-6 card-content"><i class="fa fa-edit icon-size"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm container your-running">
                        <div class="row">
                            <div class="col-sm-6 card-content">
                                <h1>0</h1>
                                <h3>Running</h3>
                            </div>
                            <div class="col-sm-6 card-content"><i class="fa fa-rocket icon-size"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm container your-join">
                        <div class="row">
                            <div class="col-sm-6 card-content">
                                <h1>0</h1>
                                <h3>Join</h3>
                            </div>
                            <div class="col-sm-6 card-content"><i class="fa fa-mortar-board icon-size"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <th style="width:200px;" scope="col">Exam</th>
                        <th style="width:200px;" scope="col">Describe</th>
                        <th scope="col">Create Date</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exam as $ex)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>
                            <span>{{$ex->exam_name}}</span><br>
                            <small>{{$ex->name}}</small>
                        </td>
                        <td>{{$ex->exam_describe}}</td>
                        <td>{{$ex->created_at}}</td>
                        <td>
                            <a href="{{route('exam',$ex->exam_name.'&&'.$ex->exam_id)}}"
                                class="btn btn-success"><span><i class="fa fa-graduation-cap"></i></span>
                                Test</a>
                            <a href="{{route('info',$ex->exam_name.'&&'.$ex->exam_id)}}" class="btn btn-info"><span><i
                                        class="fa fa-bar-chart"></i></span>
                                Info</a>
                            <a href="{{route('edit',$ex->exam_name.'&&'.$ex->exam_id)}}"
                                class="btn btn-primary"><span><i class="fa fa-edit"></i></span>
                                Edit</a>
                            <a href="{{route('deleteexam',$ex->exam_id)}}" class="btn btn-danger"><span><i
                                        class="fa fa-trash-o"></i></span>
                                Delete</a>
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
            <form action="{{route('postmyexam')}}" method="POST">
                @csrf
                <div class="animate container container-modal bg-light">
                    <span onclick="document.getElementById('create').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <div class="container">
                        <h2 class="pt-2 pb-4">Create exam</h2>

                        <label style="float: left;">
                            <h6>Name Exam :</h6>
                        </label>
                        <input type="text" name="exam_name" class="form-control" required>
                        <label style="float: left;">
                            <h6>Describe Exam:</h6>
                        </label>
                        <textarea class="form-control" name="exam_describe"></textarea>
                        <button type="submit" class="btn clever-btn mt-4 mb-4 bg-dark text-white">Create Exam</button>
                    </div>
            </form>
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
</script>
@endsection