@extends('app.layouts.master')

@section('title')Admin - Books | Library
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
@component('app.components.admin_breadcrumb')
@slot('breadcrumb_title')
<h3>Books</h3>
@endslot
<li class="breadcrumb-item active">Books</li>
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Books</h5>
                    <a class="btn btn-primary" href="{{ route('books.create') }}">Add</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Year</th>
                                    <th>Avail Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($books->count() > 0)
                                    @foreach ($books as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->author }}</td>
                                            <td>{{ $item->year }}</td>
                                            <td>{{ $item->avail_stock }}</td>
                                            <td width="30%">
                                                <a href="{{ route('books.show', $item->id) }}" class="btn btn-secondary">Edit</a>
                                                <a href="#" class="btn btn-danger deleteBtn" data-id="{{ $item->id }}" onclick="deleteData(this)">Delete</a>
                                            </td>
                                            <form id="deleteDataForm{{ $item->id }}" action="{{ route('books.destroy', $item->id) }}" method="POST" class="d-none" onsubmit="event.preventDefault();">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th class="text-center text-white" colspan="10" style="background-color: #111727;">
                                            No Data Found
                                        </th>
                                    </tr>
                                @endif
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
    $('#myTable').DataTable({
        "paging":   true,
        "ordering": true,
        "info":     true
    });
</script>

<script>
    function deleteData(el){
        var form = document.getElementById('deleteDataForm'+el.dataset.id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your data has been deleted.',
                    'success'
                ).then((result) => {
                    if(result.isConfirmed){
                        form.submit();
                        // window.location = window.location.pathname;
                    }
                })
            }
        })
    }
</script>
@endpush
@endsection