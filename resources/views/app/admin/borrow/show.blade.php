@extends('app.layouts.master')

@section('title')Admin - Visitor Logs | Library
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
@component('app.components.admin_breadcrumb')
@slot('breadcrumb_title')
<h3>View Material</h3>
@endslot
<li class="breadcrumb-item">Material Monitoring</li>
<li class="breadcrumb-item active">View</li>
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="d-flex justify-content-between col-xl-7 col-md-7 col-8">
                            <a href="{{ route('monitor.index') }}"><i data-feather="arrow-left-circle"></i></a>
                            <h5>Material Details</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8 col-sm-12 offset-lg-2">
                            <form method="POST" action="{{ route('monitor.update', $monitor->id) }}" id="updateForm">
                                @csrf
                                @method('PATCH')

                                <div class="row d-flex justify-content-center">
                                    <div class="mb-3 col-sm-6">
                                        <label for="inputEmail4">Full Name</label>
                                        <input class="form-control" id="inputEmail4" type="text" name="name" value="{{ old('name') ?? $monitor->name }}">
                                        @error('fname')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="inputEmail5">Title</label>
                                        <input class="form-control" id="inputEmail5" type="text" name="title" value="{{ old('title') ?? $monitor->title }}" readonly>
                                        @error('title')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="inputPassword7">Status</label>
                                        <input class="form-control" id="inputPassword7" type="text" name="status" value="{{ old('status') ?? ($monitor->status == 'Lended')? $monitor->status : 'Returned: '.\Carbon\Carbon::parse($monitor->updated_at)->format('M j Y') }}" readonly>
                                        @error('status')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-primary mx-2" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('updateForm').submit();">Update</a>
                                @if ($monitor->status == 'Lended')
                                <a href="javascript:void(0)" class="btn btn-info" onclick="event.preventDefault(); document.getElementById('markupdateForm').submit();">Mark as Returned</a>
                                @endif
                            </div>

                            <form id="markupdateForm" action="{{ route('monitor.mark-update', $monitor->id) }}" method="POST" class="d-none">
                                @csrf
                            </form>
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