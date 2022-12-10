@extends('app.layouts.master')

@section('title')
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owlcarousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/whether-icon.css')}}">
@endpush
@section('content')
@component('app.components.breadcrumb')
@slot('breadcrumb_title')
<h3>Welcome</h3>
@endslot
<li class="breadcrumb-item active">Welcome</li>
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 box-col-12 des-xl-50 profile-greeting-width">
            <div class="card profile-greeting">
                <div class="card-header">
                    <div class="header-top">

                    </div>
                </div>
                <div class="card-body text-center p-t-0">
                    <h3 class="font-light">Welcome to Library!!</h3>
                    <p>Welcome to the Quezon City University Library! we are glad that you are visite the library. we will be happy to
                        help you on what is your purpose in visiting library.</p>
                        <a href="#" class="btn btn-light">Borrow Book</a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
<script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
<script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
<script src="{{asset('assets/js/general-widget.js')}}"></script>
<script src="{{asset('assets/js/height-equal.js')}}"></script>
<script src="{{asset('assets/js/tooltip-init.js')}}"></script>
@endpush
@endsection