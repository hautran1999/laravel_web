@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/myexam.css')}}">
<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <!-- Contact Info -->
            <div class="col-12 col-lg-8 mt-2 mb-4">
                <div class="grid">
                    <div class="grid-body">
                        <div class="contact--info mt-50 mb-100">
                            <h4>Contact Info</h4>
                            <ul class="contact-list">
                                <li>
                                    <h6><i class="fa fa-clock-o" aria-hidden="true"></i> Business Hours</h6>
                                    <h6></h6>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone" aria-hidden="true"></i> Number</h6>
                                    <h6></h6>
                                </li>
                                <li>
                                    <h6><i class="fa fa-envelope" aria-hidden="true"></i> Email</h6>
                                    <h6></h6>
                                </li>
                                <li>
                                    <h6><i class="fa fa-map-pin" aria-hidden="true"></i> Address</h6>
                                    <h6></h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection