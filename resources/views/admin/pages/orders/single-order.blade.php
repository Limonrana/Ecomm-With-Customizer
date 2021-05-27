@extends('admin.layouts.app')

@section('title', 'All Orders | E-commerce Store')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('assets/img/illustrations/corner-4.png') }});opacity: 0.7;"></div>
        <!--/.bg-holder-->
        <div class="card-body">
            <div class="row" style="padding-left: 0px; padding-right: 0px;">
                <div class="col-lg-1 my-lg-col-1">
                    <button class="btn btn-falcon-default btn-sm mr-1 mb-1" type="button">
                        <span class="text-900 fs-2 fas fa-arrow-left mr-1" data-fa-transform="shrink-3"></span>
                    </button>
                </div>
                <div class="col-lg-5">
                    <h5>Order Details: {{ $order->order_number }}</h5>
                    <p class="fs--1">{{ $order->created_at->toDayDateTimeString() }}</p>
                </div>
                <div class="col-lg-6 text-right my-lg-col-6">
                    @if($order->refund == 0)
                        <a href="{{ route('order.refund', $order->id) }}" class="btn btn-light btn-sm mr-2 order-btn" id="refunded">Refund</a>
                        <a href="{{ route('order.edit', $order->id) }}" class="btn btn-light btn-sm mr-2 order-btn">Edit</a>
                        <div class="btn-group">
                            <button class="btn dropdown-toggle mb-2 btn-light btn-sm mr-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Invoice</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('order.invoice', $order->id) }}" id="print-invoice">Print invoice</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item print-window">Print order page</a>
                            </div>
                        </div>
                    @else
                    @endif
                    <div class="btn-group">
                        <button class="btn dropdown-toggle mb-2 btn-light btn-sm mr-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More action</button>
                        <div class="dropdown-menu">
                            @if($order->refund == 0)
                                @if($order->status == 3)
                                    <a class="dropdown-item" href="{{ route('order.hold', $order->id) }}">Unhold order</a>
                                @elseif($order->status == 1)
                                    <a class="dropdown-item" href="{{ route('order.hold', $order->id) }}">Hold order</a>
                                @elseif($order->status == 0)
                                    <a class="dropdown-item" href="{{ route('order.hold', $order->id) }}">Hold order</a>
                                @else
                                @endif
                            @endif
                            <a class="dropdown-item" href="{{ route('order.delete', $order->id) }}" id="delete">Delete order</a>
                            <a class="dropdown-item" href="{{ route('order.confirm', $order->id) }}" target="_blank">View order status page</a>
                        </div>
                    </div>
                </div>
            </div>
            <div><strong class="mr-2">Status: </strong>
                @if($order->refund == 0)
                    @if($order->status == 0)
                        <div class="badge badge-pill badge-soft-warning fs--2">
                            Pending Payment
                            <span class="fas fa-stream ml-1" data-fa-transform="shrink-2"></span>
                        </div>
                    @else
                        <div class="badge badge-pill badge-soft-success fs--2">
                            Paid
                            <span class="fas fa-adjust ml-1" data-fa-transform="shrink-2"></span>
                        </div>
                    @endif
                    @if($order->status == 1)
                        <div class="badge badge-pill badge-soft-primary fs--2">
                            Processing
                            <span class="fas fa-redo ml-1" data-fa-transform="shrink-2"></span>
                        </div>
                    @elseif($order->status == 2)
                        <div class="badge badge-pill badge-soft-success fs--2">
                            Completed
                            <span class="fas fa-check ml-1" data-fa-transform="shrink-2"></span>
                        </div>
                    @else
                        <div class="badge badge-pill badge-soft-secondary fs--2">
                            Hold
                            <span class="fas fa-ban ml-1" data-fa-transform="shrink-2"></span>
                        </div>
                    @endif
                    <div class="badge badge-pill badge-soft-warning fs--2">
                        Unfulfilled
                        <span class="fas fa-stream ml-1" data-fa-transform="shrink-2"></span>
                    </div>
                @else
                    <div class="badge badge-pill badge-soft-danger fs--2" style="margin-top: -8px;">
                        Refunded
                        <span class="fas fa-stream ml-1" data-fa-transform="shrink-2"></span>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Details</h5>
                </div>
                <div class="col-auto">
                    @if($order->refund == 0)
                        <a class="btn btn-falcon-default btn-sm" href="#!"><span class="fas fa-pencil-alt fs--2 mr-1"></span>
                            Edit details
                        </a>
                    @else
                        <button class="btn btn-falcon-default btn-sm" type="button" disabled><span class="fas fa-pencil-alt fs--2 mr-1"></span>
                            Edit details
                        </button>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body bg-light border-top">
            <div class="row">
                <div class="col-lg-4">
                    <h6 class="font-weight-semi-bold ls mb-3 text-uppercase">Billing Address</h6>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="font-weight-semi-bold mb-1">Name:</p>
                        </div>
                        <div class="col">
                            <p class="mb-1">{{ $order->billing->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="font-weight-semi-bold mb-1">Email:</p>
                        </div>
                        <div class="col"><a href="mailto:{{ $order->billing->email }}">{{ $order->billing->email }}</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="font-weight-semi-bold mb-1">Address:</p>
                        </div>
                        <div class="col">
                            <p class="mb-1">{{ $order->billing->address_1 }} <br>{{ $order->billing->city }}, {{ $order->billing->state }} {{ $order->billing->zip }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="font-weight-semi-bold mb-1">Phone:</p>
                        </div>
                        <div class="col"><a href="tel:+12025550110">{{ $order->billing->phone }}</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="font-weight-semi-bold mb-0">Company:</p>
                        </div>
                        <div class="col">
                            <p class="font-weight-semi-bold mb-0">{{ $order->billing->company ? $order->billing->company : 'N/A' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h6 class="font-weight-semi-bold ls mb-3 text-uppercase">Shipping Address</h6>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="font-weight-semi-bold mb-1">Name:</p>
                        </div>
                        <div class="col">
                            <p class="mb-1">{{ $order->shipping->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="font-weight-semi-bold mb-1">Email:</p>
                        </div>
                        <div class="col"><a href="mailto:{{ $order->shipping->email }}">{{ $order->shipping->email }}</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="font-weight-semi-bold mb-1">Address:</p>
                        </div>
                        <div class="col">
                            <p class="mb-1">{{ $order->shipping->address_1 }} <br>{{ $order->shipping->city }}, {{ $order->shipping->state }} {{ $order->shipping->zip }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="font-weight-semi-bold mb-1">Phone:</p>
                        </div>
                        <div class="col"><a href="tel:+12025550110">{{ $order->shipping->phone }}</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="font-weight-semi-bold mb-0">Method:</p>
                        </div>
                        <div class="col">
                            <p class="font-weight-semi-bold mb-0">{{ $order->shipping_method ? $order->shipping_method. ' Standard' : 'N/A' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h6 class="font-weight-semi-bold ls mb-3 text-uppercase">Payment Method</h6>
                    <div class="media"><img class="mr-3" src="{{ asset('assets/img/icons/visa.jpg') }}" width="40" alt="">
                        <div class="media-body">
                            <h6 class="mb-0">{{ $order->billing->name }}</h6>
                            <p class="mb-0 fs--1">{{ $order->transaction_id }}</p>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="font-weight-semi-bold mb-1">Payment:</p>
                        </div>
                        <div class="col">
                            <p class="mb-1">{{ $order->payment_type }} payment</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="font-weight-semi-bold mb-1">TXN ID:</p>
                        </div>
                        <div class="col">
                            <p class="mb-1">{{ \Illuminate\Support\Str::limit($order->transaction_id, 15) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer border-top text-right"></div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="table-responsive fs--1">
                <table class="table table-striped border-bottom">
                    <thead class="bg-200 text-900">
                    <tr>
                        <th class="border-0">Products</th>
                        <th class="border-0 text-center">Shape Type</th>
                        <th class="border-0 text-center">Length</th>
                        <th class="border-0 text-center">Width</th>
                        <th class="border-0 text-center">Height</th>
                        <th class="border-0 text-center">Quantity</th>
                        <th class="border-0 text-right">Rate</th>
                        <th class="border-0 text-right">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->orderDetails as $value)
                        <tr>
                            <td class="align-middle">
                                <h6 class="mb-0 text-nowrap">{{ $value->title }}</h6>
                                <p class="mb-0">Down 35mb, Up 100mb</p>
                            </td>
                            <td class="align-middle text-center">{{ $value->getCategory->name }}</td>
                            <td class="align-middle text-center">{{ $value->length }} M</td>
                            <td class="align-middle text-center">{{ $value->width }} M</td>
                            <td class="align-middle text-center">{{ $value->height }} M</td>
                            <td class="align-middle text-center">{{ $value->quantity }} Pcs</td>
                            <td class="align-middle text-right">${{ number_format($value->price, 2) }}</td>
                            <td class="align-middle text-right">${{ number_format($value->total_price, 2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row no-gutters justify-content-end">
                <div class="col-auto">
                    <table class="table table-sm table-borderless fs--1 text-right">
                        <tr>
                            <th class="text-900">Subtotal:</th>
                            <td class="font-weight-semi-bold">${{ number_format($order->total - $order->shipping_cost, 2) }} </td>
                        </tr>
                        <tr>
                            <th class="text-900">Shipping Cost:</th>
                            <td class="font-weight-semi-bold">${{ number_format($order->shipping_cost, 2) }}</td>
                        </tr>
                        <tr class="border-top">
                            <th class="text-900">Total:</th>
                            <td class="font-weight-semi-bold">${{ number_format($order->total, 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('admin-css')
    <style>
        a.btn.btn-light.btn-sm.mr-2.order-btn {
            margin-top: -8px;
        }
        .print-window {
            cursor: pointer;
        }
        .col-lg-1.my-lg-col-1 {
            max-width: 6% !important;
        }
        .col-lg-6.text-right.my-lg-col-6 {
            max-width: 52% !important;
            flex: 0 0 52%;
        }
    </style>
@endsection

@section('admin-js')
    <script>
        $('.print-window').click(function() {
            window.print();
        });

        $(document).on("click", "#refunded", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: "Are you want to refund?",
                text: "Once refund, You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, refund it!'
            }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                        Swal.fire(
                            'Deleted!',
                            'Refund has been sucessfully done.',
                            'success'
                        )
                    }
                });
        });

        $(document).on("click", "#deleted", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: "Are you want to delete?",
                text: "Once deleted, You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            });
        });
    </script>
@endsection
