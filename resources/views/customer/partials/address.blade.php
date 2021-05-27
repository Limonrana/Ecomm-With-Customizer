<div class="myaccount-content" id="address">
    <h3>Billing Address</h3>
    <address>
        <p><strong>{{ $customer->name ?? $customer->name}}</strong></p>
        @if($customer->address)
            <p>{{ $customer->address->address_1 ? $customer->address->address_1 : 'N/A' }} <br>
                {{ $customer->address->city ? $customer->address->city : 'N/A' }}, {{ $customer->address->state ? $customer->address->state : 'N/A' }}
                {{ $customer->address->zip ? $customer->address->zip : 'N/A' }}, {{ $customer->address->country ? $customer->address->getCountry->name : 'N/A' }}</p>
            <p>Mobile: {{ $customer->address ? $customer->address->phone : 'N/A' }}</p>
        @else
            <p>No address available for this customer!</p
        @endif
    </address>
    <button type="button" class="check-btn sqr-btn" @click="showAddress({{1}})"><i class="fa fa-edit"></i> Edit Address</button>
</div>
