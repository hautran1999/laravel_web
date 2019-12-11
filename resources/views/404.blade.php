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

    /* .error-message {
        max-width: 500px;
        margin-top: 5px;
        text-align: center;
    } */
</style>
<div class="container inner-wrapper text-center mt-5 mb-5">
    <h1 class="error-heading">404</h1>
    <h2 class="error-code">Page Not Found</h2>
    {{-- <p class="error-message">The page you are looking for might have been removed had its name changed or is temporarily
        unavailable.</p> --}}
    <a href="/" class="btn btn-primary">Back to Home</a>
</div>
@endsection