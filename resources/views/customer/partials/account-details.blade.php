<div class="myaccount-content">
    <h3>Account Details</h3>
    <div class="account-details-form">
        <form action="{{ route('customer.update', $customer->id) }}" method="POST">
            @csrf
            <div class="single-input-item">
                <label for="name" class="required">Full Name</label>
                <input type="text" id="name" name="name" required value="{{ $customer->name }}"/>
            </div>
            <div class="single-input-item">
                <label for="email" class="required">Email Address</label>
                <input type="email" id="email" name="email" required value="{{ $customer->email }}"/>
            </div>
            <div class="single-input-item">
                <button type="submit" class="check-btn sqr-btn">Save Changes</button>
            </div>
        </form>
    </div>
</div>
