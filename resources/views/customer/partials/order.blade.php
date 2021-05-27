<div class="myaccount-content" v-show="OrderData === false">
    <div class="row" style="border-bottom: 1px dashed black; margin-left: 0px; margin-right: 0px;">
        <div class="col-md-8" style="padding-left: 0px;"><h4>ORDER ${ order.order_number }</h4></div>
        <div class="col-md-4 text-right" style="padding-right: 0px;">
            <button class="arrow-btn lezada-button--icon lezada-button--icon--left" @click="getOrdersAgain"> <i class="ti-angle-left"></i>Back</button>
        </div>
    </div>
    <p>Placed on ${ order.date }</p>
    <div class="myaccount-table table-responsive text-center">
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>Product</th>
                <th>Length</th>
                <th>Width</th>
                <th>Height</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in order.order_details">
                <td>${ item.title }</td>
                <td>${ item.length } M</td>
                <td>${ item.width } M</td>
                <td>${ item.height } M</td>
                <td>$${ item.price }</td>
                <td>${ item.quantity }</td>
                <td>$${ item.total_price }</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th class="small--hide text-left" scope="row" colspan="6">Subtotal</th>
                <td class="text-center">$${ order.total - order.shipping_cost }</td>
            </tr>
            <tr>
                <th class="small--hide text-left" scope="row" colspan="6">Shipping Cost</th>
                <td class="text-center">$${ order.shipping_cost }</td>
            </tr>
            <tr style="border-top: 3px solid black">
                <th class="small--hide text-left" scope="row" colspan="6"><b>Total</b></th>
                <td class="text-center"><b>$${ order.total }</b></td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="myaccount-content" v-show="OrderData === true">
    <h3>All Orders</h3>
    <div class="myaccount-table table-responsive text-center">
        @if(count($orders) > 0)
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>Order</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $value)
                    <tr>
                        <td>{{ $value->order_number }}</td>
                        <td>{{ $value->date }}</td>
                        <td>
                            @if($value->status == 0)
                                Payment Pending
                            @elseif($value->status == 1)
                                Processing
                            @else
                                Delivered
                            @endif
                        </td>
                        <td>${{ number_format($value->total, 2) }}</td>
                        <td><button type="button" href="#" class="check-btn sqr-btn" @click="getOrder({{ $value->id }})">View</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="saved-message">You Can't Ordered Any Product yet.</p>
        @endif
    </div>
</div>
