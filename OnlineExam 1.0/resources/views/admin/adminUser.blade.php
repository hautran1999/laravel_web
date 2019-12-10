@extends('layouts.appAdmin')

@section('adminContent')
<div class="grid">
    <div class="grid-header">
        <h5>User Manage</h5>
    </div>
    <div class="grid-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Create Date</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->created_at}}</td>
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