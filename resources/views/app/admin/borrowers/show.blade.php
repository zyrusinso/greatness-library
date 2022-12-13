@extends('app.layouts.master')

@section('title')Admin - Books | Library
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
@component('app.components.admin_breadcrumb')
@slot('breadcrumb_title')
<h3>Edit Borrower</h3>
@endslot
<li class="breadcrumb-item">Borrowers</li>
<li class="breadcrumb-item active">Edit</li>
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="d-flex justify-content-between col-xl-7 col-md-7 col-8">
                            <a href="{{ route('borrowers.index') }}"><i data-feather="arrow-left-circle"></i></a>
                            <h5>Borrower</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8 col-sm-12 offset-lg-2">
                            <form method="POST" action="{{ route('borrowers.update', $borrower->id) }}" id="createForm" onsubmit="submittedForm()">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{ $borrower->user_id }}">
                                    <div class="mb-3 col-6 offset-3">
                                        <label for="contact">Student</label>
                                        <input class="form-control" id="contact" type="text" name="student" value="{{ old('student') ?? App\Models\User::getUser($borrower->user_id)->fname.' '.App\Models\User::getUser($borrower->user_id)->lname }}" readonly>
                                        @error('student')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-sm-12">
                                        <label for="contact">Contact Number</label>
                                        <input class="form-control" id="contact" type="text" name="contact" value="{{ old('contact') ?? $borrower->contact }}">
                                        @error('contact')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-sm-6">
                                        <label for="address">Home Address</label>
                                        <input class="form-control" id="address" type="text" name="address" value="{{ old('address') ?? $borrower->address }}">
                                        @error('address')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="date_of_birth">Date of Birth</label>
                                        <input class="form-control" id="date_of_birth" type="date" value="{{ old('date_of_birth') ?? $borrower->date_of_birth }}" name="date_of_birth">
                                        @error('date_of_birth')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="course">Course</label>
                                        <input class="form-control" id="course" type="text" name="course" value="{{ old('course') ?? $borrower->course }}">
                                        @error('course')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-primary mx-2" href="javascript:void(0)" onclick="createData('create')">Submit</a>
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
                    window.location = "{{ route('borrowers.index') }}";
                }else{
                    window.location = window.location.pathname;
                }
            }
        })
    }

</script>
@endpush
@endsection