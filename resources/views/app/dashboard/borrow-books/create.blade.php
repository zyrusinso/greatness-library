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
                <div class="card-header d-flex justify-content-between">
                    <h5>Borrow Books</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Year</th>
                                    <th>Isbn</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->author }}</td>
                                        <td>{{ \App\Models\BookCategory::getCategoryTitle($item->category) }}</td>
                                        <td>{{ $item->year }}</td>
                                        <td>{{ $item->isbn }}</td>
                                        
                                        <td width="20%">
                                            <a href="javascript:void(0)" class="btn btn-primary borrowBtn" data-id="{{ $item->id }}" onclick="document.getElementById('borrowForm{{ $item->id }}').submit()">Borrow</a>
                                        </td>
                                        <form id="borrowForm{{ $item->id }}" action="{{ route('borrow-books.store', $item->id) }}" method="POST" class="d-none" onsubmit="event.preventDefault();">
                                            @csrf
                                            <input type="hidden" name="book" value="{{ $item->id }}">
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script src="{{asset('assets/js/sweet-alert2/sweetalert.all.min.js')}}"></script>
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>

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


</script>

<script>
    $('#myTable').DataTable({
        "paging":   true,
        "ordering": true,
        "info":     true
    });
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

@error('error')
    <script>
        Swal.fire(
            'Borrowed Notice!',
            '{{ $message }}',
            'warning'
        )
    </script>
@enderror

@endpush
@endsection