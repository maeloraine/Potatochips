<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- Guest Information Form -->
            <h6>Guest Information</h6>
            <form id="guest-info-form">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="first-name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first-name" placeholder="John" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last-name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last-name" placeholder="Doe" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="john.doe@example.com" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" placeholder="+63 912 345 6789" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="123 Main St, City, Country" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="check-in-date" class="form-label">Check-In Date</label>
                        <input type="date" class="form-control" id="check-in-date" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="check-out-date" class="form-label">Check-Out Date</label>
                        <input type="date" class="form-control" id="check-out-date" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="special-requests" class="form-label">Special Requests</label>
                    <textarea class="form-control" id="special-requests" rows="3" placeholder="Any special requests?"></textarea>
                </div>
            </form>

            <!-- Payment Information Form -->
            <h6 class="mt-5">Payment Information</h6>
            <form id="payment-form">
                <div class="mb-3">
                    <label for="card-number" class="form-label">Card Number</label>
                    <input type="text" class="form-control" id="card-number" placeholder="1234 5678 9012 3456" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="expiry-date" class="form-label">Expiry Date</label>
                        <input type="text" class="form-control" id="expiry-date" placeholder="MM/YY" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cvv" class="form-label">CVV</label>
                        <input type="text" class="form-control" id="cvv" placeholder="123" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="cardholder-name" class="form-label">Cardholder Name</label>
                    <input type="text" class="form-control" id="cardholder-name" placeholder="John Doe" required>
                </div>
            </form>
        </div>
    </div>
</div>