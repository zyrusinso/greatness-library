@extends('app.layouts.master')

@section('title')Admin - Monitoring | Library
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
@component('app.components.admin_breadcrumb')
@slot('breadcrumb_title')
<h3>Visitors Log</h3>
@endslot
<li class="breadcrumb-item active">Visitors Log</li>
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Visitors Log</h5>
                    {{-- <a class="btn btn-primary">Add</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Course</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visitors as $item)
                                    <tr>
                                        <td>{{ $item->stud_id }}</td>
                                        <td>{{ $item->fname }} {{ $item->lname }}</td>
                                        <td>{{ $item->course }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('M j Y') }}</td>
                                        <td width="15%">
                                            <a href="{{ route('visitor-logs.show', $item->id) }}" class="btn btn-secondary">View</a>
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