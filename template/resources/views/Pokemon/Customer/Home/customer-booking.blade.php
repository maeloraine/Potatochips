@extends('layouts.simple.cust-master')

@section('title', 'Create Booking')

@section('css')
    <!-- Additional CSS if needed -->
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
    .booking-details {
        padding-top: 20px;
    }
    
    /* Dark mode compatibility */
    .category-header {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 15px;
        color: var(--bs-body-color); /* Use Bootstrap's body color variable */
    }

    /* Ensure text color adapts to dark mode */
    .dark-mode .category-header {
        color: var(--bs-light); /* Light text color for dark mode */
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
        <!-- Available Offers Section (Left Side) -->
        <div class="col-md-8" id="available-offers">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                    <h5>Available Offers</h5>
                    <!-- Check-In/Check-Out and Number of Guests Form -->
                    <div class="booking-details d-flex gap-3 flex-wrap">
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
                        <button class="btn btn-primary" id="show-kubo">Kubo</button>
                        <button class="btn btn-primary" id="show-cabin">Cabin</button>
                    </div>

                    <!-- Cottages Section -->
                    <div id="cottages-list">
                        <div class="category-header">Cottage</div>
                        <!-- Cottage Offers -->
                        <div class="offer-card" data-id="1" data-name="Barkada Cottage" data-price="1800" data-details="A cozy kubo with a room, perfect for small families or groups.">
                            <h6>Barkada Cottage</h6>
                            <p>Price: ₱1,800.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                        <div class="offer-card" data-id="2" data-name="Family Cottage" data-price="2700" data-details="A comfortable triangle cabin with air conditioning, ideal for a relaxing stay.">
                            <h6>Family Cottage</h6>
                            <p>Price: ₱2,700.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                        <div class="offer-card" data-id="3" data-name="Duplex Cottage" data-price="800" data-details="A simple tent for those who love camping and the outdoors.">
                            <h6>Duplex Cottage</h6>
                            <p>Price: ₱800.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                    </div>

                    <!-- Kubo Section -->
                    <div id="kubos-list" class="hidden">
                        <div class="category-header">Kubo</div>
                        <!-- Cottage Offers -->
                        <div class="offer-card" data-id="1" data-name="Kubo with room" data-price="1800" data-details="A cozy kubo with a room, perfect for small families or groups.">
                            <h6>Kubo with room</h6>
                            <p>Price: ₱1,800.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                        <div class="offer-card" data-id="2" data-name="Modern kubo" data-price="2700" data-details="A modern kubo, ideal for a relaxing stay.">
                            <h6>Modern kubo</h6>
                            <p>Price: ₱2,700.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                        <div class="offer-card" data-id="3" data-name="Small kubo" data-price="800" data-details="A simple and small kubo for barkada">
                            <h6>Small Kubo</h6>
                            <p>Price: ₱800.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                    </div>

                    <!-- Cabin Section -->
                    <div id="cabins-list" class="hidden">
                        <div class="category-header">Cabin</div>
                        <!-- Function Hall Offers -->
                        <div class="offer-card" data-id="4" data-name="Duplex cabin" data-price="5000" data-details="A small cabin ideal for couples.">
                            <h6>Duplex cabin</h6>
                            <p>Price: ₱5,000.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                        <div class="offer-card" data-id="5" data-name="Triangle cabin w/ aircon" data-price="8000" data-details="A comfortable triangle cabin with air conditioning, ideal for a relaxing stay.">
                            <h6>Triangle cabin w/ aircon</h6>
                            <p>Price: ₱8,000.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                        <div class="offer-card" data-id="6" data-name="2-storey cabin with balcony" data-price="12000" data-details="A spacious cabin ideal for big groups and families who loves overlooking place.">
                            <h6>2-storey cabin with view deck</h6>
                            <p>Price: ₱12,000.00</p>
                            <button class="btn btn-info btn-sm see-details" data-bs-toggle="modal" data-bs-target="#offerModal">See Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Guest Information Section (Hidden by Default) -->
        <div class="col-md-8 hidden" id="guest-information">
            <div class="card">
                <div class="card-header">
                    <h5>Guest Information</h5>
                </div>
                <div class="card-body">
                    <form id="guest-info-form">
                        <!-- First Name and Last Name -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="first-name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first-name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="last-name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last-name" required>
                            </div>
                        </div>

                        <!-- Gender and Birthdate -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="birthdate" class="form-label">Birthdate</label>
                                <input type="date" class="form-control" id="birthdate" required>
                                <small class="text-danger" id="age-error" style="display: none;">The primary guest must be at least 18 years old to confirm your booking.</small>
                            </div>
                        </div>

                        <!-- Email and Phone Number -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" required>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" required>
                            </div>
                        </div>

                        <!-- Special Requests -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="special-requests" class="form-label">Special Requests</label>
                                <textarea class="form-control" id="special-requests" rows="3"></textarea>
                            </div>
                        </div>

                        <!-- Proceed to Payment Button -->
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id="proceed-to-payment" class="btn btn-primary">Proceed to Payment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Booking Summary Section (Right Side) -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Booking Summary</h5>
                </div>
                <div class="card-body booking-summary">
                    <h6>Details</h6>
                    <!-- Date and Number of Guests -->
                    <div id="booking-dates-guests" class="mt-3">
                        <!-- Check-In and Check-Out Dates -->
                        <div class="d-flex justify-content-between">
                            <p><strong>Check-In:</strong> <span id="summary-check-in">Not set</span></p>
                            <p><strong>Check-Out:</strong> <span id="summary-check-out">Not set</span></p>
                        </div>

                        <!-- Adults and Children (Below Dates) -->
                        <div class="d-flex justify-content-between">
                            <p><strong>Adults:</strong> <span id="summary-adults">1</span></p>
                            <p><strong>Children:</strong> <span id="summary-children">0</span></p>
                        </div>
                        <hr>

                        <h6>Booked Offers</h6>
                        <div id="booking-details">
                            <p>No offer selected yet.</p>
                        </div>
                    </div>
                    <hr>

                    <!-- Display the total price -->
                    <div class="total-price-container">
                        <span>Total Price:</span>
                        <span id="total-price">₱0.00</span>
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

        // Toggle visibility for Cottages, Kubo, and Cabin
        const cottagesList = document.getElementById('cottages-list');
        const kubosList = document.getElementById('kubos-list');
        const cabinsList = document.getElementById('cabins-list');

        // Hide all sections initially (except Cottages)
        kubosList.classList.add('hidden');
        cabinsList.classList.add('hidden');

        // Event listeners for category buttons
        document.getElementById('show-cottages').addEventListener('click', function () {
            cottagesList.classList.remove('hidden');
            kubosList.classList.add('hidden');
            cabinsList.classList.add('hidden');
        });

        document.getElementById('show-kubo').addEventListener('click', function () {
            cottagesList.classList.add('hidden');
            kubosList.classList.remove('hidden');
            cabinsList.classList.add('hidden');
        });

        document.getElementById('show-cabin').addEventListener('click', function () {
            cottagesList.classList.add('hidden');
            kubosList.classList.add('hidden');
            cabinsList.classList.remove('hidden');
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

        document.getElementById('kubos-list').addEventListener('click', function (event) {
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

        document.getElementById('cabins-list').addEventListener('click', function (event) {
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

                // Enable the Confirm Booking button if dates are set
                updateConfirmBookingButtonState();

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

            // Update the Confirm Booking button state
            updateConfirmBookingButtonState();
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

        // Function to check if dates are set
        function areDatesSet() {
            const checkInDate = checkInDateInput.value;
            const checkOutDate = checkOutDateInput.value;
            return checkInDate && checkOutDate; // Returns true if both dates are set
        }

        // Function to update the Confirm Booking button state
        function updateConfirmBookingButtonState() {
            if (bookings.length > 0 && areDatesSet()) {
                confirmBookingBtn.disabled = false; // Enable the button if bookings exist and dates are set
            } else {
                confirmBookingBtn.disabled = true; // Disable the button otherwise
            }
        }

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
                        updateConfirmBookingButtonState(); // Update the Confirm Booking button state
                    });
                });
            }
            updateConfirmBookingButtonState(); // Update the Confirm Booking button state
        }

        // Confirm booking button
        confirmBookingBtn.addEventListener('click', function () {
            if (bookings.length > 0) {
                // Hide Available Offers Section
                document.getElementById('available-offers').classList.add('hidden');

                // Show Guest Information Section
                document.getElementById('guest-information').classList.remove('hidden');
            }
        });

        // Function to calculate age from birthdate
            function calculateAge(birthdate) {
                const today = new Date();
                const birthDate = new Date(birthdate);
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDifference = today.getMonth() - birthDate.getMonth();

                // Adjust age if the birthday hasn't occurred yet this year
                if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }

                return age;
            }

        // Function to validate age
            function validateAge() {
                const birthdateInput = document.getElementById('birthdate');
                const ageError = document.getElementById('age-error');
                const birthdate = birthdateInput.value;

                if (birthdate) {
                    const age = calculateAge(birthdate);
                    if (age < 18) {
                        ageError.style.display = 'block'; // Show error message
                        return false; // Guest is under 18
                    } else {
                        ageError.style.display = 'none'; // Hide error message
                        return true; // Guest is 18 or older
                    }
                }
                return false; // Birthdate is not set
            }

        // Proceed to Payment button
        document.getElementById('proceed-to-payment').addEventListener('click', function () {
            const guestForm = document.getElementById('guest-info-form');

            // Validate Guest Information Form
            if (!guestForm.checkValidity()) {
                guestForm.reportValidity(); // Show validation errors
                return;
            }

            // Validate Guest Information Form
            if (!guestForm.checkValidity()) {
                guestForm.reportValidity(); // Show validation errors
                return;
            }

            // If the form is valid, show the payment modal
            const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
            paymentModal.show();
        });

        // Event listener for birthdate input to validate age in real-time
            document.getElementById('birthdate').addEventListener('change', function () {
                validateAge();
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

        // ====================================================
        // Date Validation
        // ====================================================

            // Set minimum date for Check-In (today)
            const today = new Date().toISOString().split('T')[0];
            checkInDateInput.setAttribute('min', today);

            // Automatically set check-out date to the day after check-in date
            checkInDateInput.addEventListener('change', function () {
                const checkInDate = new Date(checkInDateInput.value); // Get the selected check-in date
                if (checkInDate) {
                    const checkOutDate = new Date(checkInDate);
                    checkOutDate.setDate(checkOutDate.getDate() + 1); // Add 1 day to the check-in date

                    // Format the date as YYYY-MM-DD (required for input[type="date"])
                    const formattedCheckOutDate = checkOutDate.toISOString().split('T')[0];

                    // Set the check-out date input value
                    checkOutDateInput.value = formattedCheckOutDate;

                    // Update the booking summary
                    updateBookingSummaryDetails();
                }
            });

            // Update Check-Out minimum date when Check-In date changes
            checkInDateInput.addEventListener('change', function () {
                const checkInDate = new Date(checkInDateInput.value);
                const minCheckOutDate = new Date(checkInDate);
                minCheckOutDate.setDate(minCheckOutDate.getDate() + 1); // Check-Out must be at least 1 day after Check-In

                // Set minimum Check-Out date
                checkOutDateInput.setAttribute('min', minCheckOutDate.toISOString().split('T')[0]);

                // If Check-Out date is invalid, reset it
                if (new Date(checkOutDateInput.value) < minCheckOutDate) {
                    checkOutDateInput.value = '';
                }
            });

            // Ensure Check-Out date is after Check-In date
            checkOutDateInput.addEventListener('change', function () {
                const checkInDate = new Date(checkInDateInput.value);
                const checkOutDate = new Date(checkOutDateInput.value);

                if (checkOutDate <= checkInDate) {
                    alert('Check-Out date must be after Check-In date.');
                    checkOutDateInput.value = '';
                }
            });

            // Initial update of Confirm Booking button state
            updateConfirmBookingButtonState();
    });
</script>
@endsection