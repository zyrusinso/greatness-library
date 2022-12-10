@extends('app.layouts.master')

@section('title')Admin - Monitoring | Library
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
@component('app.components.admin_breadcrumb')
@slot('breadcrumb_title')
<h3>Borrow Books</h3>
@endslot
<li class="breadcrumb-item active">Borrow Books</li>
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Borrow Books</h5>
                    {{-- <a class="btn btn-primary">Add</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Book Title</th>
                                    <th>Status</th> {{-- Lended or Returned--}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    function borrowerData($borrowerId){
                                        return App\Models\Borrow::borrowerData($borrowerId);
                                    }
                                ?>
                                @foreach ($monitors as $item)
                                    <tr>
                                        <td>{{ borrowerData($item->borrower_id)->stud_id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td width="15%">
                                            <a href="{{ route('monitor.show', $item->id) }}" class="btn btn-info">View</a>
                                        </td>
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
    $('#myTable').DataTable({
        "paging":   true,
        "ordering": true,
        "info":     true
    });
</script>

<script>
    document.querySelector('.deleteBtn').onclick = function(){
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
                )
            }
        })
    }
</script>
@endpush
@endsection