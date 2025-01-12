@extends('layouts.simple.master')

@section('title', 'Create Booking')

@section('css')
    
@endsection

@section('style')
<style>
    .offer-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .offer-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .booking-summary {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        background-color: #f9f9f9;
    }
    .category-header {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 15px;
        color: #333;
    }
    .category-buttons {
        margin-bottom: 20px;
    }
    .category-buttons .btn {
        margin-right: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .category-buttons .btn-primary {
        background-color: #A888B5; /* Custom purple color */
        color: white;
    }
    .category-buttons .btn-primary:hover {
        background-color: #90699F; /* Slightly darker purple on hover */
    }
    .hidden {
        display: none;
    }
    .booking-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    padding: 10px;
    border-bottom: 1px solid #ddd;
    }
    .booking-item:last-child {
        border-bottom: none;
    }
    .booking-item h6 {
        margin: 0;
        flex: 1;
    }
    .booking-item p {
        margin: 0;
        margin-right: 10px;
    }
    .delete-booking {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }
    .delete-booking:hover {
        background-color: #c82333;
    }

    .total-price-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
    }

    .total-price-container span {
        font-weight: bold;
        font-size: 1.1rem;
    }

    #booking-dates-guests p {
    margin: 0; /* Remove default margin for paragraphs */
    }

    #booking-dates-guests .d-flex {
        margin-bottom: 10px; /* Add spacing between rows */
    }

    .input-group {
        width: 100%; /* Ensure the input group takes full width of its container */
    }

    .input-group .form-control {
        flex: 1; /* Allow the input to take remaining space */
        text-align: center; /* Center the text in the input */
    }

    .input-group .btn {
        padding: 5px 10px; /* Reduce button padding */
    }
</style>
@endsection

@section('breadcrumb-title')
    <h3>Create Booking</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Create Booking</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Available Offers Section -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                    <h5>Available Offers</h5>
                    <!-- Check-In/Check-Out and Number of Guests Form -->
                    <div class="d-flex gap-3 flex-wrap">
                        <div>
                            <label for="check-in-date" class="form-label">Check-In Date</label>
                            <input type="date" class="form-control" id="check-in-date" required>
                        </div>
                        <div>
                            <label for="check-out-date" class="form-label">Check-Out Date</label>
                            <input type="date" class="form-control" id="check-out-date" required>
                        </div>
                        <div style="width: 135px;">
                            <label for="adults" class="form-label">Adults</label>
                            <div class="input-group">
                                <button type="button" class="btn btn-outline-secondary" id="decrease-adults">-</button>
                                <input type="number" class="form-control text-center" id="adults" value="1" min="1" readonly>
                                <button type="button" class="btn btn-outline-secondary" id="increase-adults">+</button>
                            </div>
                        </div>
                        <div style="width: 135px;">
                            <label for="children" class="form-label">Children (under 12)</label>
                            <div class="input-group">
                                <button type="button" class="btn btn-outline-secondary" id="decrease-children">-</button>
                                <input type="number" class="form-control text-center" id="children" value="0" min="0" readonly>
                                <button type="button" class="btn btn-outline-secondary" id="increase-children">+</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Category Buttons -->
                    <div class="category-buttons">
                        <button class="btn btn-primary" id="show-cottages">Cottages</button>
                        <button class="btn btn-primary" id="show-function-hall">Function Hall</button>
                    </div>

                    <!-- Cottages Section -->
                    <div id="cottages-list">
                        <div class="category-header">Cottages</div>
                        <!-- Cottage Offers -->
                        <div class="offer-card" data-id="1" data-name="Kubo with room" data-price="1800" data-details="A cozy kubo with a room, perfect for small families or groups.">
                            <h6>Kubo with room</h6>
                            <p>Price: ₱1,800.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                        <div class="offer-card" data-id="2" data-name="Triangle Cabin w/aircon" data-price="2700" data-details="A comfortable triangle cabin with air conditioning, ideal for a relaxing stay.">
                            <h6>Triangle Cabin w/aircon</h6>
                            <p>Price: ₱2,700.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                        <div class="offer-card" data-id="3" data-name="Tent" data-price="800" data-details="A simple tent for those who love camping and the outdoors.">
                            <h6>Tent</h6>
                            <p>Price: ₱800.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                    </div>

                    <!-- Function Hall Section -->
                    <div id="function-hall-list" class="hidden">
                        <div class="category-header">Function Hall</div>
                        <!-- Function Hall Offers -->
                        <div class="offer-card" data-id="4" data-name="Small Function Hall" data-price="5000" data-details="A small function hall suitable for intimate gatherings and events.">
                            <h6>Small Function Hall</h6>
                            <p>Price: ₱5,000.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                        <div class="offer-card" data-id="5" data-name="Medium Function Hall" data-price="8000" data-details="A medium-sized function hall perfect for medium-sized events and parties.">
                            <h6>Medium Function Hall</h6>
                            <p>Price: ₱8,000.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                        <div class="offer-card" data-id="6" data-name="Large Function Hall" data-price="12000" data-details="A spacious function hall ideal for large events, weddings, and conferences.">
                            <h6>Large Function Hall</h6>
                            <p>Price: ₱12,000.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking Summary Section -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Booking Summary</h5>
                </div>
                <div class="card-body booking-summary">
                    <h6>Details</h6>
                    <!-- Date and Number of Guests-->
                    <div id="booking-dates-guests" class="mt-3">
                    <!-- Check-In and Check-Out Dates-->
                    <div class="d-flex justify-content-between">
                        <p><strong>Check-In:</strong> <span id="summary-check-in">Not set</span></p>
                        <p><strong>Check-Out:</strong> <span id="summary-check-out">Not set</span></p>
                    </div>

                    <!-- Adults and Children (Below Dates) -->
                    <div class="d-flex justify-content-between">
                        <p><strong>Adults:</strong> <span id="summary-adults">1</span></p>
                        <p><strong>Children:</strong> <span id="summary-children">0</span></p>
                    </div><hr>

                    <h6>Booked Offers</h6>
                    <div id="booking-details">
                        <p>No offer selected yet.</p>
                    </div>
                </div><hr>

                    <!-- Display the total price -->
                    <div class="total-price-container" style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                    <span style="font-weight: bold; font-size: 1.1rem;">Total Price:</span>
                    <span id="total-price" style="font-weight: bold; font-size: 1.1rem;">₱0.00</span>
                    </div>

                    <button id="confirm-booking" class="btn btn-success btn-block mt-3" disabled>Confirm Booking</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Offer Details Modal -->
<div class="modal fade" id="offerModal" tabindex="-1" aria-labelledby="offerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="offerModalLabel">Offer Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 id="modal-offer-name"></h6>
                <p id="modal-offer-price"></p>
                <p id="modal-offer-details"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="modal-book-now">Book Now</button>
            </div>
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Payment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Include the customer-payment.blade.php content here -->
                @include('Pokemon.Customer.Home.customer-payment')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submit-payment">Submit Payment</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bookingDetails = document.getElementById('booking-details');
        const confirmBookingBtn = document.getElementById('confirm-booking');
        const offerModal = new bootstrap.Modal(document.getElementById('offerModal'));
        let selectedOffer = null;
        let bookings = []; // Array to store booked items

        // Toggle visibility for Cottages and Function Hall
        const cottagesList = document.getElementById('cottages-list');
        const functionHallList = document.getElementById('function-hall-list');

        document.getElementById('show-cottages').addEventListener('click', function () {
            cottagesList.classList.remove('hidden');
            functionHallList.classList.add('hidden');
        });

        document.getElementById('show-function-hall').addEventListener('click', function () {
            functionHallList.classList.remove('hidden');
            cottagesList.classList.add('hidden');
        });

        // Event delegation for "See Details" buttons
        document.getElementById('cottages-list').addEventListener('click', function (event) {
            if (event.target.classList.contains('see-details')) {
                const offerCard = event.target.closest('.offer-card');
                selectedOffer = {
                    id: offerCard.dataset.id,
                    name: offerCard.dataset.name,
                    price: offerCard.dataset.price,
                    details: offerCard.dataset.details
                };

                // Update modal content
                document.getElementById('modal-offer-name').textContent = selectedOffer.name;
                document.getElementById('modal-offer-price').textContent = `Price: ₱${selectedOffer.price}`;
                document.getElementById('modal-offer-details').textContent = selectedOffer.details;

                // Show the modal
                offerModal.show();
            }
        });

        document.getElementById('function-hall-list').addEventListener('click', function (event) {
            if (event.target.classList.contains('see-details')) {
                const offerCard = event.target.closest('.offer-card');
                selectedOffer = {
                    id: offerCard.dataset.id,
                    name: offerCard.dataset.name,
                    price: offerCard.dataset.price,
                    details: offerCard.dataset.details
                };

                // Update modal content
                document.getElementById('modal-offer-name').textContent = selectedOffer.name;
                document.getElementById('modal-offer-price').textContent = `Price: ₱${selectedOffer.price}`;
                document.getElementById('modal-offer-details').textContent = selectedOffer.details;

                // Show the modal
                offerModal.show();
            }
        });

        // Book Now button in modal
        document.getElementById('modal-book-now').addEventListener('click', function () {
            if (selectedOffer) {
                // Add the selected offer to the bookings array
                bookings.push(selectedOffer);

                // Update booking summary
                updateBookingSummary();

                // Enable the Confirm Booking button
                confirmBookingBtn.disabled = false;

                // Close the modal
                offerModal.hide();
            }
        });

        // Get references to the input fields
        const checkInDateInput = document.getElementById('check-in-date');
        const checkOutDateInput = document.getElementById('check-out-date');
        const adultsInput = document.getElementById('adults');
        const childrenInput = document.getElementById('children');
        const increaseAdultsBtn = document.getElementById('increase-adults');
        const decreaseAdultsBtn = document.getElementById('decrease-adults');
        const increaseChildrenBtn = document.getElementById('increase-children');
        const decreaseChildrenBtn = document.getElementById('decrease-children');

        // Get references to the summary elements
        const summaryCheckIn = document.getElementById('summary-check-in');
        const summaryCheckOut = document.getElementById('summary-check-out');
        const summaryAdults = document.getElementById('summary-adults');
        const summaryChildren = document.getElementById('summary-children');

        // Update booking summary when dates or number of guests change
        function updateBookingSummaryDetails() {
            summaryCheckIn.textContent = checkInDateInput.value || 'Not set';
            summaryCheckOut.textContent = checkOutDateInput.value || 'Not set';
            summaryAdults.textContent = adultsInput.value;
            summaryChildren.textContent = childrenInput.value;
        }

        // Add event listeners for date inputs
        checkInDateInput.addEventListener('change', updateBookingSummaryDetails);
        checkOutDateInput.addEventListener('change', updateBookingSummaryDetails);

        // Add event listeners for number of guests
        increaseAdultsBtn.addEventListener('click', function () {
            adultsInput.value = parseInt(adultsInput.value) + 1;
            updateBookingSummaryDetails();
        });

        decreaseAdultsBtn.addEventListener('click', function () {
            if (parseInt(adultsInput.value) > 1) {
                adultsInput.value = parseInt(adultsInput.value) - 1;
                updateBookingSummaryDetails();
            }
        });

        increaseChildrenBtn.addEventListener('click', function () {
            childrenInput.value = parseInt(childrenInput.value) + 1;
            updateBookingSummaryDetails();
        });

        decreaseChildrenBtn.addEventListener('click', function () {
            if (parseInt(childrenInput.value) > 0) {
                childrenInput.value = parseInt(childrenInput.value) - 1;
                updateBookingSummaryDetails();
            }
        });

        // Initial update of booking summary details
        updateBookingSummaryDetails();

        // Function to update the booking summary
        function updateBookingSummary() {
            if (bookings.length === 0) {
                bookingDetails.innerHTML = `<p>No offer selected yet.</p>`;
                document.getElementById('total-price').textContent = '₱0.00'; // Clear total price
            } else {
                let summaryHTML = bookings.map((booking, index) => `
                    <div class="booking-item">
                        <div>
                            <h6>${booking.name}</h6>
                            <p>Price: ₱${booking.price}</p>
                        </div>
                        <button class="delete-booking" data-index="${index}">Delete</button>
                    </div>
                `).join('');
                bookingDetails.innerHTML = summaryHTML;

                // Calculate the total price
                const totalPrice = bookings.reduce((sum, booking) => sum + parseFloat(booking.price), 0);
                document.getElementById('total-price').textContent = `₱${totalPrice.toFixed(2)}`;

                // Add event listeners to delete buttons
                document.querySelectorAll('.delete-booking').forEach(button => {
                    button.addEventListener('click', function () {
                        const index = this.getAttribute('data-index');
                        bookings.splice(index, 1); // Remove the item from the bookings array
                        updateBookingSummary(); // Update the booking summary
                        if (bookings.length === 0) {
                            confirmBookingBtn.disabled = true; // Disable the Confirm Booking button if no items are left
                        }
                    });
                });
            }
        }

        // Confirm booking button
        confirmBookingBtn.addEventListener('click', function () {
            if (bookings.length > 0) {
                // Show the payment modal
                const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
                paymentModal.show();
                // Used for sending the data to the backend via AJAX or form submission
                // Example:
                // fetch('/bookings', {
                //     method: 'POST',
                //     headers: { 'Content-Type': 'application/json' },
                //     body: JSON.stringify(bookings)
                // }).then(response => response.json())
                //   .then(data => console.log(data));
            }
        });
        
        // Submit Payment button in the payment modal
        document.getElementById('submit-payment').addEventListener('click', function () {
            const guestForm = document.getElementById('guest-info-form');
            const paymentForm = document.getElementById('payment-form');

            // Validate Guest Information Form
            if (!guestForm.checkValidity()) {
                guestForm.reportValidity(); // Show validation errors
                return;
            }

            // Validate Payment Form
            if (!paymentForm.checkValidity()) {
                paymentForm.reportValidity(); // Show validation errors
                return;
            }

            // If both forms are valid, proceed with submission
            const guestInfo = {
                firstName: document.getElementById('first-name').value,
                lastName: document.getElementById('last-name').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                address: document.getElementById('address').value,
                checkInDate: document.getElementById('check-in-date').value,
                checkOutDate: document.getElementById('check-out-date').value,
                specialRequests: document.getElementById('special-requests').value,
            };

            const paymentInfo = {
                cardNumber: document.getElementById('card-number').value,
                expiryDate: document.getElementById('expiry-date').value,
                cvv: document.getElementById('cvv').value,
                cardholderName: document.getElementById('cardholder-name').value,
            };

            // Combine guest and payment information
            const bookingData = {
                guestInfo,
                paymentInfo,
                bookings, // Include the booked items from the booking summary
            };

            // Simulate submission (replace with actual API call)
            console.log('Booking Data:', bookingData);
            alert('Booking submitted successfully!');

            // Clear forms and reset booking summary
            guestForm.reset();
            paymentForm.reset();
            bookings = [];
            updateBookingSummary();
            confirmBookingBtn.disabled = true;

            // Close the payment modal
            const paymentModal = bootstrap.Modal.getInstance(document.getElementById('paymentModal'));
            paymentModal.hide();
        });

    });
</script>
@endsection