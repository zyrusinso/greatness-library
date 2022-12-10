@extends('app.layouts.master')

@section('title')Admin - Dashboard | Library
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owlcarousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/whether-icon.css')}}">
@endpush
@section('content')
@component('app.components.admin_breadcrumb')
@slot('breadcrumb_title')
<h3>Dashboard</h3>
@endslot
<li class="breadcrumb-item active">Dashboard</li>
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>New Borrowers Order</h5>
                    {{-- <a class="btn btn-primary">Add</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="myTable">
                            <thead>
                                <tr>
                                    <th>ORDER ID</th>
                                    <th>ISBN</th>
                                    <th>BORROWER ID</th>
                                    <th>BORROWING DATE</th> {{-- Lended or Returned--}}
                                    <th>DUE DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>978-3-16-148410-0</td>
                                    <td>123</td>
                                    <td>Dec 8 2022</td>
                                    <td>Dec 15 2022</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>978-3-16-148410-0</td>
                                    <td>123</td>
                                    <td>Dec 1 2022</td>
                                    <td>Dec 10 2022</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>978-3-16-148410-0</td>
                                    <td>123</td>
                                    <td>Dec 2 2022</td>
                                    <td>Dec 8 2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card b-danger"> 
                <div class="card-body">
                    <p>
                        1. A borrower can only loan (3) books at the same time. The maximum times that borrower can loan the book is (5) days. <br>
                        2. If a book is not return after the due date, the borrower will be charged ₱5.00/day. <br>
                        3. The borrowers are responsible to replace or pay the book that (s)he lost within 30 days exluding holidays and every sunday. failure to do so, will result to permanently ban from the library. <br>
                        4. Renewal is allowed, you can renew before the due date or after you return the book. The student are not allowed to have the same book for (4) consecutives weeks. <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
<script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
<script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
<script src="{{asset('assets/js/general-widget.js')}}"></script>
<script src="{{asset('assets/js/height-equal.js')}}"></script>
<script src="{{asset('assets/js/tooltip-init.js')}}"></script>
@endpush

@push('scripts')
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>

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