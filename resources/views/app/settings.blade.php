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
        @if (auth()->user()->is_admin != 1)
            <div class="col-sm-6 col-xl-6 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-danger b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="dollar-sign"></i></div>
                            <div class="media-body">
                                <span class="m-0">Current Balance Fee</span>
                                <h4 class="mb-0 counter">{{ $setting->balance ?? '0' }}</h4>
                                <i class="icon-bg" data-feather="dollar-sign"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="d-flex justify-content-between col-xl-7 col-md-7 col-8">
                            <h5>Change Password</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @error('success')
                        <div class="alert alert-success dark text-center" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="row">
                        <div class="col-xl-8 col-sm-12 offset-lg-2">
                            <form method="POST" action="{{ route('settings.update', auth()->id()) }}" id="updateForm">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="icon-lock"></i></span>
                                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="*********" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm New Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="icon-lock"></i></span>
                                            <input class="form-control" type="password" name="password_confirmation" placeholder="*********" />
                                        </div>
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