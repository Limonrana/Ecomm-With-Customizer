<div class="myaccount-content">
    <h3>Dashboard</h3>
    <div class="welcome">
        <p>Hello, <strong>{{ $customer->name }}</strong> (If Not <strong>{{ $customer->name }}! </strong><a
                href="{{ route('logout') }}" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a>)</p>
    </div>

    <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage
        your
        shipping and billing addresses and edit your password and account details.</p>
</div>
