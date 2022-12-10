@extends('app.layouts.master')

@section('title')Admin - Books | Library
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
@component('app.components.admin_breadcrumb')
@slot('breadcrumb_title')
<h3>Add Book</h3>
@endslot
<li class="breadcrumb-item">Books</li>
<li class="breadcrumb-item active">Add</li>
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Book Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8 col-sm-12 offset-lg-2">
                            <form method="POST" action="{{ route('books.store') }}" id="createForm" onsubmit="submittedForm()">
                                @csrf

                                <div class="row">
                                    <div class="mb-3 col-sm-12">
                                        <label for="bookTitle">Title</label>
                                        <input class="form-control" id="bookTitle" type="text" name="title" value="{{ old('title') }}">
                                        @error('title')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-sm-6">
                                        <label for="authorName">Author</label>
                                        <input class="form-control" id="authorName" type="text" name="author" value="{{ old('author') }}">
                                        @error('author')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="year">Year</label>
                                        <input class="form-control" id="year" type="number" min="1600" max="2099" value="{{ old('year') ?? '2000' }}" name="year">
                                        @error('year')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="availStock">Available Stock</label>
                                        <input class="form-control" id="availStock" type="number" min="0" name="avail_stock" value="{{ old('avail_stock') }}">
                                        @error('avail_stock')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="inputAddress5">Total Stock</label>
                                        <input class="form-control" id="inputAddress5" type="number" min="0" name="total_stock" value="{{ old('total_stock') }}">
                                        @error('total_stock')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="order-place d-flex justify-content-center">
                <a class="btn btn-primary mx-2" href="javascript:void(0)" onclick="createData('create')">Create</a>
                <a class="btn btn-info mx-2" href="javascript:void(0)" onclick="createData('another')">Create & create another</a>
                <a class="btn btn-info mx-2" href="{{ route('books.index') }}">Cancel</a>
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