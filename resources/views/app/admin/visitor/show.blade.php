@extends('app.layouts.master')

@section('title')Admin - Visitor Logs | Library
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
@component('app.components.admin_breadcrumb')
@slot('breadcrumb_title')
<h3>View Visitor</h3>
@endslot
<li class="breadcrumb-item">Visitor Logs</li>
<li class="breadcrumb-item active">View</li>
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="d-flex justify-content-between col-xl-7 col-md-7 col-8">
                            <a href="{{ route('visitor-logs.index') }}"><i data-feather="arrow-left-circle"></i></a>
                            <h5>Visitor Details</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8 col-sm-12 offset-lg-2">
                            <form method="POST" action="{{ route('visitor-logs.update', $visitor->id) }}" id="updateForm">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    <div class="mb-3 col-sm-6">
                                        <label for="inputEmail4">First Name</label>
                                        <input class="form-control" id="inputEmail4" type="text" name="fname" value="{{ old('fname') ?? $visitor->fname }}">
                                        @error('fname')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="inputPassword4">Last Name</label>
                                        <input class="form-control" id="inputPassword4" type="text" name="lname" value="{{ old('lname') ?? $visitor->lname }}">
                                        @error('lname')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="inputEmail5">Phone</label>
                                        <input class="form-control" id="inputEmail5" type="text" name="phone" value="{{ old('phone') ?? $visitor->phone }}">
                                        @error('phone')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="inputPassword7">Email Address</label>
                                        <input class="form-control" id="inputPassword7" type="email" name="email" value="{{ old('email') ?? $visitor->email }}">
                                        @error('email')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="inputAddress5">Address</label>
                                        <input class="form-control" id="inputAddress5" type="text" name="address" value="{{ old('address') ?? $visitor->address }}">
                                        @error('address')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="inputAddress6">Postal Code</label>
                                        <input class="form-control" id="inputAddress6" type="number" name="postal" value="{{ old('postal') ?? $visitor->postal }}">
                                        @error('postal')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="inputAddress6">Teacher/Student ID</label>
                                        <input class="form-control" id="inputAddress6" type="text" name="stud_id" value="{{ old('stud_id') ?? $visitor->stud_id }}">
                                        @error('stud_id')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="inputAddress6">Course</label>
                                        <input class="form-control" id="inputAddress6" type="text" name="course" value="{{ old('course') ?? $visitor->course }}">
                                        @error('course')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-primary mx-2" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('updateForm').submit();">Update</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script src="{{asset('assets/js/sweet-alert2/sweetalert.all.min.js')}}"></script>

<script>
    var submitTypes = '';

    function createData(el){
        var form = document.getElementById('createForm');
        submitTypes = el;
        if(el == 'another'){
            var input = document.createElement('input');
            input.name = 'another';
            input.type = 'hidden';
            form.appendChild(input);
        }
        form.submit();
    }

    function submittedForm(){
        Swal.fire(
            'Created!',
            'Your data has been successfully created.',
            'success'
        ).then((result) => {
            if(result.isConfirmed){
                if(submitTypes == 'create'){
                    window.location = "{{ route('books.index') }}";
                }else{
                    window.location = window.location.pathname;
                }
            }
        })
    }

</script>
@endpush
@endsection