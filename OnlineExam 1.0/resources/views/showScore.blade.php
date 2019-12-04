@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        background: #f8f9fc;
    }

    .error-heading {
        font-size: 169px;
        font-weight: 600;
        line-height: 1;
    }

    .error-code {
        margin-top: 10px;
        font-weight: 600;
    }
</style>
<div class="container inner-wrapper text-center mt-5 mb-5">
    <h1 class="error-heading">{{$scores}}</h1>
    <h2 class="error-code">{{$true}} out of {{$number}}</h2>

    <a href="/" class="btn btn-primary">Back to Home</a>
</div>
@endsection