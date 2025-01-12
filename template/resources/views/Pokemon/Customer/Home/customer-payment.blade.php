<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h6>Payment Information</h6>
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