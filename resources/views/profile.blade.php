@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/createexam.css')}}">
<div class="container pt-4 mt-4 pb-4 mb-4">
    <div class="row">
        <div class="col-5">
            <div class="grid">
                <div class="grid-header text-center">
                    <h5>Account Profile</h5>
                </div>
                <div class="grid-body">
                    <div class="mt-2">
                    <input type="text" class="form-control" placeholder="{{\Auth::user()->name}}">
                    </div>
                    <div class="mt-2">
                        <input type="text" class="form-control" placeholder="{{\Auth::user()->email}}">
                    </div>
                    <button type="submit" class="btn btn-success mt-4">Update Profile</button>
                </div>
            </div>
        </div>
        <div class="col-2 text-center">
            <h3 class="mt-4">OR</h3>
        </div>
        <div class="col-5">
            <div class="grid">
                <div class="grid-header text-center">
                    <h5>Update New Password</h5>
                </div>
                <div class="grid-body">
                    <div class="mt-2">
                        <input type="password" class="form-control" placeholder="Old Password">
                    </div>
                    <div class="mt-2">
                        <input type="password" class="form-control" placeholder="New Password">
                    </div>
                    <div class="mt-2">
                        <input type="password" class="form-control" placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-success mt-4">Update Password</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection