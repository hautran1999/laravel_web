@extends('layouts.appAdmin')

@section('adminContent')
<div class="grid">
    <div class="grid-header">
        <h5>Scores Manage</h5>
    </div>
    <div class="grid-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th style="width:150x;" scope="col">User</th>
                    <th style="width:200px;" scope="col">Exam</th>
                    <th style="width:200px;" scope="col">Create Date</th>
                    <th style="width:200px;" scope="col">Scores</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scores as $s)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$s->name}}</td>
                    <td>{{$s->exam_name}}</td>
                    <td>{{$s->created_at}}</td>
                    <td>{{$s->scores}}</td>
                    <td>
                        <a href="#" class="btn btn-success"><span><i class="fa fa-edit"></i></span>
                            Edit</a>
                        <a href="#" class="btn btn-danger"><span><i class="fa fa-trash-o"></i></span>
                            Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection