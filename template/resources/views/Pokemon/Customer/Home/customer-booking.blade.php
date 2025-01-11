@extends('layouts.simple.master')

@section('title', 'Create Booking')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
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
        margin-bottom: 10px;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
    .booking-item:last-child {
        border-bottom: none;
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
                <div class="card-header">
                    <h5>Available Offers</h5>
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
                    <div id="booking-details">
                        <p>No offer selected yet.</p>
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

        // Function to update the booking summary
        function updateBookingSummary() {
            if (bookings.length === 0) {
                bookingDetails.innerHTML = `<p>No offer selected yet.</p>`;
            } else {
                let summaryHTML = bookings.map(booking => `
                    <div class="booking-item">
                        <h6>${booking.name}</h6>
                        <p>Price: ₱${booking.price}</p>
                    </div>
                `).join('');
                bookingDetails.innerHTML = summaryHTML;
            }
        }

        // Confirm booking button
        confirmBookingBtn.addEventListener('click', function () {
            if (bookings.length > 0) {
                alert(`Booking confirmed for the following items:\n${bookings.map(booking => `- ${booking.name} (₱${booking.price})`).join('\n')}`);
                // Used for sending the data to the backend via AJAX or form submission
                // Example:
                // fetch('/bookings', {
                //     method: 'POST',
                //     headers: { 'Content-Type': 'application/json' },
                //     body: JSON.stringify(bookings)
                // }).then(response => response.json())
                //   .then(data => console.log(data));

                // Clear the bookings array and update the summary
                bookings = [];
                updateBookingSummary();
                confirmBookingBtn.disabled = true;
            }
        });
    });
</script>
@endsection