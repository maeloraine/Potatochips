@extends('layouts.simple.cust-master')

@section('title', 'My Reservations')

@section('breadcrumb-title')
    <h3>My Bookings</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">General</li>
    <li class="breadcrumb-item">My Bookings</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Booking List</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Booking Reference</th>
                                    <th>Room Type</th>
                                    <th>Check-In Date</th>
                                    <th>Check-Out Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->booking_reference }}</td>
                                        <td>{{ $booking->room->Room_Type ?? 'N/A' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('Y-m-d') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($bookings->isEmpty())
                            <p class="text-center">No bookings found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script src="/assets/js/clock.js"></script>
<script src="/assets/js/chart/apex-chart/moment.min.js"></script>
<script src="/assets/js/notify/bootstrap-notify.min.js"></script>
<script src="/assets/js/dashboard/default.js"></script>
<script src="/assets/js/notify/index.js"></script>
<script src="/assets/js/typeahead/handlebars.js"></script>
<script src="/assets/js/typeahead/typeahead.bundle.js"></script>
<script src="/assets/js/typeahead/typeahead.custom.js"></script>
<script src="/assets/js/typeahead-search/handlebars.js"></script>
<script src="/assets/js/typeahead-search/typeahead-custom.js"></script>
<script src="/assets/js/height-equal.js"></script>
<script src="/assets/js/animation/wow/wow.min.js"></script>
@endsection