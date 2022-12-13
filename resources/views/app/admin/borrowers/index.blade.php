@extends('app.layouts.master')

@section('title')Admin - Books | Library
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
@component('app.components.admin_breadcrumb')
@slot('breadcrumb_title')
<h3>Borrowers</h3>
@endslot
<li class="breadcrumb-item active">Borrowers</li>
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Borrowers</h5>
                    <a class="btn btn-primary" href="{{ route('borrowers.create') }}">Add</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Borrower Name</th>
                                    <th>Status</th>
                                    <th>Date Verified</th>
                                    <th>Date Registered</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrowers as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ App\Models\User::getUser($item->user_id)->fname }} {{ App\Models\User::getUser($item->user_id)->lname }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->verified_at)->format('M j Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse(App\Models\User::getUser($item->user_id)->created_at)->format('M j Y') }}</td>
                                        <td width="30%">
                                            <a href="{{ route('borrowers.show', $item->id) }}" class="btn btn-secondary">Edit</a>
                                            <a href="#" class="btn btn-danger deleteBtn" data-id="{{ $item->id }}" onclick="deleteData(this)">Delete</a>
                                        </td>
                                        <form id="deleteDataForm{{ $item->id }}" action="{{ route('borrowers.destroy', $item->id) }}" method="POST" class="d-none" onsubmit="event.preventDefault();">
                                            @csrf
                                            @method('DELETE')
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