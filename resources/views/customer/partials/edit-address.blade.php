<div class="myaccount-content" id="address_fields" style="display: none;">
    <h3>Add/Edit Billing Address</h3>
    <div class="account-details-form">
        <form action="{{ route('customer.address.update', $customer->address) }}" method="post" class="address_form">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-input-item">
                        <label for="phone" class="required">Phone Number</label>
                        <input type="text" id="phone" name="phone" placeholder="Your phone number..." value="{{ $customer->address ? $customer->address->phone : '' }}" required/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-input-item">
                        <label for="company" class="required">Company (Optional)</label>
                        <input type="text" id="company" name="company" placeholder="Your company name (Optional)..." value="{{ $customer->address ? $customer->address->company : '' }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-input-item">
                        <label for="address_1" class="required">Address Line 1</label>
                        <input type="text" id="address_1" name="address_1" placeholder="Your address line 1..." value="{{ $customer->address ? $customer->address->address_1 : '' }}" required/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-input-item">
                        <label for="address_2" class="required">Address Line 2 (Optional)</label>
                        <input type="text" id="address_2" name="address_2" placeholder="Your address line 2 (Optional)..." value="{{ $customer->address ? $customer->address->address_2 : '' }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-input-item">
                        <label for="city" class="required">City</label>
                        <input type="text" id="city" name="city" placeholder="Your city name..." value="{{ $customer->address ? $customer->address->city : '' }}" required/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-input-item">
                        <label for="state" class="required">State</label>
                        <input type="text" id="state" name="state" placeholder="Your state name..." value="{{ $customer->address ? $customer->address->state : '' }}" required/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-input-item">
                        <label for="zip" class="required">Zip Code</label>
                        <input type="text" id="zip" name="zip" placeholder="Your zip code..." value="{{ $customer->address ? $customer->address->zip : '' }}" required/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-input-item">
                        <label for="country" class="required">Country*</label>
                        <select class="nice-select" name="country" id="country" required>
                            @foreach($country as $val)
                                <option value="{{ $val->id }}" @if ($customer->address->country == $val->id) selected @endif>{{ $val->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="single-input-item">
                <button type="submit" class="check-btn sqr-btn ">Save Changes</button>
                <button type="button" class="check-btn sqr-btn" @click="showAddress({{2}})">Cancel</button>
            </div>
        </form>
    </div>
</div>
