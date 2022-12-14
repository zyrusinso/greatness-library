@extends('app.layouts.master')

@section('title')Admin - Books | Library
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
@component('app.components.admin_breadcrumb')
@slot('breadcrumb_title')
<h3>Book Return</h3>
@endslot
<li class="breadcrumb-item">Books</li>
<li class="breadcrumb-item active">Return</li>
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Book Return</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ISBN</th>
                                    <th>Title</th>
                                    <th>Borrowing Date</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrows as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ \App\Models\Book::getBook($item->book_id)->isbn }}</td>
                                        <td>{{ \App\Models\Book::getBook($item->book_id)->title }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('M j Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->due_date)->format('M j Y') }}</td>
                                        
                                        <td width="20%">
                                            <a href="javascript:void(0)" class="btn btn-primary returnBtn" data-id="{{ $item->id }}" onclick="document.getElementById('returnForm{{ $item->id }}').submit()">Return</a>
                                        </td>
                                        <form id="returnForm{{ $item->id }}" action="{{ route('book-return.store', $item->id) }}" method="POST" class="d-none" onsubmit="event.preventDefault();">
                                            @csrf
                                            <input type="hidden" name="borrow" value="{{ $item->id }}">
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
                    window.location = "{{ route('book-return.index') }}";
                }else{
                    window.location = window.location.pathname;
                }
            }
        })
    }

</script>

<script>
    $('#myTable').DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false,
    });
</script>
@endpush
@endsection