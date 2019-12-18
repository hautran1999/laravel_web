@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/createexam.css')}}">
<div class="container pt-4 mt-4 pb-4 mb-4">
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4">
            <form action="{{route('continue',$exam_name.'&&'.$exam_id)}}" method="post" id="form">
                @csrf
                <div class="grid">
                    <div class="grid-header text-center">
                        <h5>Continue</h5>
                    </div>
                    <div class="grid-body text-center">
                        <p>You not finish exam : {{$exam_name}}</p>
                        <p>Do you want to continue</p>
                        
                        <input type="submit" id="no" onclick="check(this.id)" class="btn btn-danger" value="No">
                        <input type="submit" id="yes" onclick="check(this.id)" class="btn btn-danger" value="Yes">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function check(id){
        $('#form').append(`<input type="hidden" name="check" value="${id}">`)
    }
</script>
@endsection