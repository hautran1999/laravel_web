@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/createexam.css')}}">
<div class="container pt-4 mt-4 pb-4 mb-4">
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4">
            <div class="grid">
                <div class="grid-header text-center">
                    <h5>Continue</h5>
                </div>
                <div class="grid-body text-center">
                    
                    <p>{{$messenger}}</p>

                    <a href={{url()->previous()}} class="btn clever-btn">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection