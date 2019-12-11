@extends('layouts.appAdmin')

@section('adminContent')
<div class="grid">
    <div class="grid-header">
        <h5>Question Manage</h5>
    </div>
    <div class="grid-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject</th>
                    <th style="width:20%;" scope="col">Question</th>
                    <th style="width:30%;" scope="col">Answer</th>
                    <th style="width:12.5%;"scope="col">Right Answer</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quest as $q)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$q->exam_kind}}</td>
                    <td>{{$q->question}}</td>
                    <td>{!!implode('<br>',explode('***', $q->answer))!!}</td>
                    <td>{{$q->rightAnswer}}</td>
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