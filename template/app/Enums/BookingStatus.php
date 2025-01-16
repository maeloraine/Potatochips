<?php

namespace App\Enums;

enum BookingStatus: string
{
    case Pending = 'Pending';
    case Confirmed = 'Confirmed';
    case CheckedIn = 'Checked-In';
    case CheckedOut = 'Checked-Out';
    case Cancelled = 'Cancelled';
    case NoShow = 'No-Show';
    case InProgress = 'In-Progress';
}
