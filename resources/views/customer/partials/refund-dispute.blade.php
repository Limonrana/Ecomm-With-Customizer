<div class="myaccount-content">
    <h3>Refund & Disputes</h3>
    <div class="myaccount-table table-responsive text-center">
        @if(count($refund) > 0)
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>#Order No</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($refund as $value)
                    <tr>
                        <td>{{ $value->order_number }}</td>
                        <td>{{ $value->date }}</td>
                        <td>
                            @if($value->status == 1)
                                Refund Pending
                            @else
                                Refunded
                            @endif
                        </td>
                        <td>${{ number_format($value->total, 2) }}</td>
                        <td><a href="#" class="check-btn sqr-btn ">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="saved-message">You Can't Refund Any Product yet.</p>
        @endif
    </div>
</div>
