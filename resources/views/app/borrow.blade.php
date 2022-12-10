@extends('app.layouts.master')

@section('title')Welcome | Library
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
<h3>Borrow Books</h3>
@endslot
<li class="breadcrumb-item active">Borrow Books</li>
@endcomponent

<div class="container-fluid">
    <div class="row" @if(auth()->user()) style="display: none" @endif>
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
                        <a href="{{ route('index') }}" class="btn btn-light">Visitors</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <h5>Borrower Details</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-8 col-sm-12 offset-lg-2">
                    <form method="POST" action="{{ route('borrow.store') }}" id="borrowForm">
                        @csrf

                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label for="inputEmail4">First Name</label>
                                <input class="form-control" id="inputEmail4" type="text" name="fname" value="{{ old('fname') }}">
                                @error('fname')
                                    <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="inputPassword4">Last Name</label>
                                <input class="form-control" id="inputPassword4" type="text" name="lname" value="{{ old('lname') }}">
                                @error('lname')
                                    <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="inputEmail5">Phone</label>
                                <input class="form-control" id="inputEmail5" type="text" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="inputPassword7">Email Address</label>
                                <input class="form-control" id="inputPassword7" type="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="inputAddress5">Address</label>
                                <input class="form-control" id="inputAddress5" type="text" name="address" value="{{ old('address') }}">
                                @error('address')
                                    <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="inputAddress6">Postal Code</label>
                                <input class="form-control" id="inputAddress6" type="number" name="postal" value="{{ old('postal') }}">
                                @error('postal')
                                    <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="inputAddress6">Student ID</label>
                                <input class="form-control" id="inputAddress6" type="text" name="stud_id" value="{{ old('stud_id') }}">
                                @error('stud_id')
                                    <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="inputAddress6">Course</label>
                                <input class="form-control" id="inputAddress6" type="text" name="course" value="{{ old('course') }}">
                                @error('course')
                                    <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="selectBook">Select Books</label>
                                <select class="form-select digits" id="selectBook" name="book_id">
                                    <option value=""> -- Select Book -- </option>
                                    @foreach ($books as $item)
                                        <option value="{{ $item->id }}" 
                                            @if ($item->id == old('book'))
                                                selected
                                            @endif
                                        >{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                @error('book_id')
                                    <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6">
                                <div>
                                    <label class="form-label" for="remarksArea">Remarks</label>
                                    <textarea class="form-control" id="remarksArea" rows="3" name="remarks">{{ old('remarks') }}</textarea>
                                    @error('remarks')
                                        <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-sm-12 d-flex justify-content-center">
                                <div class="form-check">
                                    <input class="form-check-input" id="gridCheck" type="checkbox" name="terms">
                                    <label class="form-check-label" for="gridCheck">Agree to the <a href="#">terms and conditions</a></label>
                                    @error('terms')
                                        <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="order-place d-flex justify-content-center">
                            <button class="btn btn-primary" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('borrowForm').submit()">Submit</button>
                        </div>
                    </form>
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