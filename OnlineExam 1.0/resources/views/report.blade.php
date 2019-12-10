@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/createexam.css')}}">
<div class="container pt-4 mt-4 pb-4 mb-4">
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6">
            <form action="{{route('post_report',$name)}}" method="post">
                @csrf
                <div class="grid">
                    <div class="grid-header text-center">
                        <h5>Report Exam : {{$info[0]}}</h5>
                    </div>
                    <div class="grid-body text-center">
                        <label for="" class="text-left">
                            <h5>report<h5>
                        </label>
                        <textarea type="text" name='report' class="form-control color-input-white" placeholder=""></textarea>

                        <input type="submit" class="btn btn-danger mt-4 text-center" value="Report">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection