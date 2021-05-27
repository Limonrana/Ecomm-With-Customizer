@extends('admin.layouts.app')

@section('title', 'All Orders | E-commerce Store')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-auto mb-2 mb-sm-0">
                    <h6 class="mb-0">DashBoard > All Orders</h6>
                </div>
                <div class="col-sm-auto">
                    <a class="text-600" href="{{ route('admin.dashboard') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="DashBoard"><svg class="svg-inline--fa fa-th fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="th" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm386.667-56H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24z"></path></svg><!-- <span class="fas fa-th"></span> --></a>
                </div>
            </div>
        </div>
    </div>

    @if (count($orders) > 0)
        <div class="card mb-3">
            <div class="card-header">
                <div class="row align-items-center justify-content-between">
                    <div class="col-4 col-sm-auto d-flex align-items-center pr-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Orders</h5>
                    </div>
                    <div class="col-8 col-sm-auto ml-auto text-right pl-0">
                        <div class="d-none" id="orders-actions">
                            <div class="input-group input-group-sm"><select class="custom-select cus" aria-label="Bulk actions">
                                    <option selected="">Bulk actions</option>
                                    <option value="Delete">Delete</option>
                                </select><button class="btn btn-falcon-default btn-sm ml-2" type="button">Apply</button></div>
                        </div>
                        <div id="dashboard-actions"><button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ml-1">New</span></button><button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ml-1">Filter</span></button><button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ml-1">Export</span></button></div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="falcon-data-table">
                    <table class="table table-sm mb-0 table-striped table-dashboard fs--1 data-table border-bottom border-200" data-options='{"searching":true,"responsive":false,"info":false,"lengthChange":false,"sWrapper":"falcon-data-table-wrapper","dom":"<&#39;row mx-1&#39;<&#39;col-sm-12 col-md-6&#39;l><&#39;col-sm-12 col-md-6&#39;f>><&#39;table-responsive&#39;tr><&#39;row no-gutters px-1 py-3 align-items-center justify-content-center&#39;<&#39;col-auto&#39;p>>","language":{"paginate":{"next":"<span class=\"fas fa-chevron-right\"></span>","previous":"<span class=\"fas fa-chevron-left\"></span>"}}}'>
                        <thead class="bg-200 text-900">
                        <tr>
                            <th class="align-middle no-sort">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input checkbox-bulk-select" id="checkbox-bulk-purchases-select" type="checkbox" data-checkbox-body="#orders" data-checkbox-actions="#orders-actions" data-checkbox-replaced-element="#dashboard-actions">
                                    <label class="custom-control-label" for="checkbox-bulk-purchases-select"></label>
                                </div>
                            </th>
                            <th class="align-middle sort">Order</th>
                            <th class="align-middle sort pr-7">Date</th>
                            <th class="align-middle sort pr-7">Payment Type</th>
                            <th class="align-middle sort" style="min-width: 12.5rem;">Ship To</th>
                            <th class="align-middle sort text-center">Status</th>
                            <th class="align-middle sort text-right">Amount</th>
                            <th class="no-sort"></th>
                        </tr>
                        </thead>
                        <tbody id="orders">
                        @foreach($orders as $value)
                            <tr class="btn-reveal-trigger">
                            <td class="py-2 align-middle">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input checkbox-bulk-select-target" type="checkbox" id="checkbox_{{ $value->id }}" />
                                    <label class="custom-control-label" for="checkbox_{{ $value->id }}"></label>
                                </div>
                            </td>
                            <td class="py-2 align-middle white-space-nowrap">
                                <a href="{{ route('orders.show', $value->id) }}"> <strong>{{ $value->order_number }}</strong></a> by <strong>{{ $value->customer->name }}</strong><br />
                                <a href="mailto:{{ $value->customer->email }}">{{ $value->customer->email }}</a>
                            </td>
                            <td class="py-2 align-middle">{{ $value->date }}</td>
                            <td class="py-2 align-middle">{{ $value->payment_type }} Payment</td>
                            <td class="py-2 align-middle">
                                {{ $value->customer->name }}, {{ $value->shipping->address_1 }}, {{ $value->shipping->city }}, {{ $value->shipping->state }} {{ $value->shipping->zip }}
                                <p class="mb-0 text-500">Via {{ $value->shipping_method }} Standard</p>
                            </td>
                            <td class="py-2 align-middle text-center fs-0 white-space-nowrap">
                                @if($value->status == 0)
                                    <span class="badge badge rounded-capsule d-block badge-soft-warning">
                                        Pending
                                        <span class="ml-1 fas fa-stream" data-fa-transform="shrink-2"></span>
                                    </span>
                                @elseif($value->status == 1)
                                    <span class="badge badge rounded-capsule d-block badge-soft-primary">
                                        Processing
                                        <span class="ml-1 fas fa-redo" data-fa-transform="shrink-2"></span>
                                    </span>
                                @elseif($value->status == 2)
                                    <span class="badge badge rounded-capsule d-block badge-soft-success">
                                        Completed
                                        <span class="ml-1 fas fa-check" data-fa-transform="shrink-2"></span>
                                    </span>
                                @else
                                    <span class="badge badge rounded-capsule d-block badge-soft-secondary">
                                        On Hold
                                        <span class="ml-1 fas fa-ban" data-fa-transform="shrink-2"></span>
                                    </span>
                                @endif
                            </td>
                            <td class="py-2 align-middle text-right fs-0 font-weight-medium">${{ $value->total }}</td>
                            <td class="py-2 align-middle white-space-nowrap">
                                <div class="dropdown text-sans-serif">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                        <span class="fas fa-ellipsis-h fs--1"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">
                                        <div class="bg-white py-2">
                                            <a class="dropdown-item" href="{{ route('orders.show', $value->id) }}">Edit</a>
                                            <a class="dropdown-item" href="#!">Processing</a>
                                            <a class="dropdown-item" href="#!">Pending</a>
                                            <a class="dropdown-item" href="#!">Completed</a>
                                            <a class="dropdown-item" href="#!">On Hold</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#!">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else

        <div class="card">
            <div class="card-body overflow-hidden p-lg-7">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6"><img class="img-fluid" src="{{ asset('assets/img/illustrations/4.png') }}" alt=""></div>
                    <div class="col-lg-6 pl-lg-4 my-5 text-center text-lg-left">
                        <h3>No More Order Here!</h3>
                        <p class="lead">Create a New Order and Start Something Beautiful.</p><a class="btn btn-falcon-primary" data-toggle="modal" data-target="#categoryAdd" href="#">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('admin-css')
    <style>

    </style>
@endsection

@section('admin-js')
    <script>
        // Bulk Delete Option Start
        $(document).ready(function(){
            $('#allDelete').click(function(){
                var data_arr = [];
                // Get checked checkboxes
                $('#recordsTable input[type=checkbox]').each(function() {
                    if (jQuery(this).is(":checked")) {
                        var id = this.id;
                        var splitid = id.split('_');
                        var postid = splitid[1];
                        data_arr.push(postid);
                    }
                });
                if(data_arr.length > 0){
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
                            //Delete Request Send
                            axios.post('/admin/all-category', { id: data_arr})
                                .then(response => {
                                    $.each(data_arr, function( i,l ){
                                        $("#value_"+l).remove();
                                    });
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                })
                                .catch(error => {
                                    toastr.warning("Opps! Something is wrong.");
                                })
                        }
                    })
                }
            });
        });

        // Single Delete Option Start
        function singleDelete(id) {
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
                    //Delete Request Send
                    axios.delete('/admin/category/' + id)
                        .then(response => {
                            $("#value_"+id).remove();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        })
                        .catch(error => {
                            toastr.warning("Opps! Something is wrong.");
                        })
                }
            })
        };

    </script>
@endsection
