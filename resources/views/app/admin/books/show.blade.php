@extends('app.layouts.master')

@section('title')Admin - Books | Library
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
@component('app.components.admin_breadcrumb')
@slot('breadcrumb_title')
<h3>Edit Book</h3>
@endslot
<li class="breadcrumb-item">Books</li>
<li class="breadcrumb-item active">Edit</li>
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="d-flex justify-content-between col-xl-7 col-md-7 col-8">
                            <a href="{{ route('books.index') }}"><i data-feather="arrow-left-circle"></i></a>
                            <h5>Book Details</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8 col-sm-12 offset-lg-2">
                            <form method="POST" action="{{ route('books.update', $book->id) }}" id="createForm" onsubmit="submittedForm()">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    <div class="mb-3 col-sm-12">
                                        <label for="bookTitle">Title</label>
                                        <input class="form-control" id="bookTitle" type="text" name="title" value="{{ old('title') ?? $book->title }}">
                                        @error('title')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-sm-6">
                                        <label for="authorName">Author</label>
                                        <input class="form-control" id="authorName" type="text" name="author" value="{{ old('author') ?? $book->author}}">
                                        @error('author')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="year">Year</label>
                                        <input class="form-control" id="year" type="number" min="1600" max="2099" value="{{ old('year') ?? $book->year }}" name="year">
                                        @error('year')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="availStock">Available Stock</label>
                                        <input class="form-control" id="availStock" type="number" min="0" name="avail_stock" value="{{ old('avail_stock') ?? $book->avail_stock }}">
                                        @error('avail_stock')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="inputAddress5">Total Stock</label>
                                        <input class="form-control" id="inputAddress5" type="number" min="0" name="total_stock" value="{{ old('total_stock') ?? $book->total_stock }}">
                                        @error('total_stock')
                                            <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 col-sm-6 offset-3">
                                    <select name="category" class="form-control">
                                        <label for="inputAddress5">Book Category</label>
                                        <option value="">-- Select a Category --</option>
                                        @foreach(App\Models\BookCategory::getAll() as $key => $value)
                                            <option value="{{ $key }}" {{ (old('category') == $key || $book->category == $key)? 'selected' : '' }} >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
                                    @enderror
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