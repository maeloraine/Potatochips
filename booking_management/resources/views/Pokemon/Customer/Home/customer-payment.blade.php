<style>
    .hidden {
        display: none;
    }
</style>

<div class="container-fluid">
    <!-- Payment Information Form -->
    <h6>Payment Method</h6>
    <form id="payment-form">
        <!-- Payment Method Selection -->
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment-method" id="credit-debit-card-radio" value="credit-debit-card" required>
                <label class="form-check-label" for="credit-debit-card-radio">Credit/Debit Card</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment-method" id="gcash-radio" value="gcash" required>
                <label class="form-check-label" for="gcash-radio">GCash</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment-method" id="maya-radio" value="maya" required>
                <label class="form-check-label" for="maya-radio">Maya</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment-method" id="online-banking-radio" value="online-banking" required>
                <label class="form-check-label" for="online-banking-radio">Online Banking</label>
            </div>
        </div>

        <!-- Credit/Debit Card Form (Hidden by Default) -->
        <div id="credit-debit-card-form" class="hidden">
            <hr>
            <h6>Payment Information</h6>
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
        </div>

        <!-- GCash Form (Hidden by Default) -->
        <div id="gcash-form" class="hidden">
            <hr>
            <h6>Payment Information</h6>
            <div class="mb-3">
                <label for="gcash-number" class="form-label">GCash Number</label>
                <input type="text" class="form-control" id="gcash-number" placeholder="0912 345 6789" required>
            </div>
            <div class="mb-3">
                <label for="gcash-name" class="form-label">Account Name</label>
                <input type="text" class="form-control" id="gcash-name" placeholder="Juan Dela Cruz" required>
            </div>
        </div>

        <!-- Maya Form (Hidden by Default) -->
        <div id="maya-form" class="hidden">
            <hr>
            <h6>Payment Information</h6>
            <div class="mb-3">
                <label for="maya-number" class="form-label">Maya Number</label>
                <input type="text" class="form-control" id="maya-number" placeholder="0912 345 6789" required>
            </div>
            <div class="mb-3">
                <label for="maya-name" class="form-label">Account Name</label>
                <input type="text" class="form-control" id="maya-name" placeholder="Juan Dela Cruz" required>
            </div>
        </div>

        <!-- Online Banking Form (Hidden by Default) -->
        <div id="online-banking-form" class="hidden">
            <hr>
            <h6>Payment Information</h6>
            <div class="mb-3">
                <label for="bank-name" class="form-label">Bank Name</label>
                <input type="text" class="form-control" id="bank-name" placeholder="e.g., BDO, BPI, etc." required>
            </div>
            <div class="mb-3">
                <label for="account-number" class="form-label">Account Number</label>
                <input type="text" class="form-control" id="account-number" placeholder="1234 5678 9012 3456" required>
            </div>
            <div class="mb-3">
                <label for="account-name" class="form-label">Account Name</label>
                <input type="text" class="form-control" id="account-name" placeholder="Juan Dela Cruz" required>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const creditDebitCardRadio = document.getElementById('credit-debit-card-radio');
        const gcashRadio = document.getElementById('gcash-radio');
        const mayaRadio = document.getElementById('maya-radio');
        const onlineBankingRadio = document.getElementById('online-banking-radio');

        const creditDebitCardForm = document.getElementById('credit-debit-card-form');
        const gcashForm = document.getElementById('gcash-form');
        const mayaForm = document.getElementById('maya-form');
        const onlineBankingForm = document.getElementById('online-banking-form');

        // Function to hide all payment forms
        function hideAllPaymentForms() {
            creditDebitCardForm.classList.add('hidden');
            gcashForm.classList.add('hidden');
            mayaForm.classList.add('hidden');
            onlineBankingForm.classList.add('hidden');
        }

        // Event listeners for radio buttons
        creditDebitCardRadio.addEventListener('change', function () {
            hideAllPaymentForms();
            creditDebitCardForm.classList.remove('hidden');
        });

        gcashRadio.addEventListener('change', function () {
            hideAllPaymentForms();
            gcashForm.classList.remove('hidden');
        });

        mayaRadio.addEventListener('change', function () {
            hideAllPaymentForms();
            mayaForm.classList.remove('hidden');
        });

        onlineBankingRadio.addEventListener('change', function () {
            hideAllPaymentForms();
            onlineBankingForm.classList.remove('hidden');
        });

        // Initial hide of all payment forms
        hideAllPaymentForms();
    });
</script>