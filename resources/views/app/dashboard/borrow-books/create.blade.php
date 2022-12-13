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
                    <h5>Book Borrow</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8 col-sm-12 offset-lg-2">
                            <form method="POST" action="{{ route('borrow-books.store') }}" id="createForm" onsubmit="submittedForm()">
                                @csrf

                                <div class="row">
                                    <div class="mb-3 col-sm-6 offset-3">
                                        <select name="book" class="form-control">
                                            <label for="inputAddress5">Books</label>
                                            <option value="">-- Select a Book --</option>
                                            @foreach(App\Models\Book::getAll() as $key => $value)
                                                <option value="{{ $key }}" {{ (old('category') == $key)? 'selected' : '' }} >{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('book')
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
                <a class="btn btn-primary mx-2" href="javascript:void(0)" onclick="createData('create')">Submit</a>
                <a class="btn btn-info mx-2" href="{{ route('borrow-books.index') }}">Cancel</a>
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
                    window.location = "{{ route('borrow-books.index') }}";
                }else{
                    window.location = window.location.pathname;
                }
            }
        })
    }

    function createdSuccess(){
        
    }
</script>

@error('success')
    <script>
        Swal.fire(
            'Borrowed!',
            '{{ $message }}',
            'success'
        )
    </script>
@enderror

@endpush
@endsection