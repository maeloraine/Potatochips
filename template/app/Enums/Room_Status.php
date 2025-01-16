<?php

namespace App\Enums;

enum Room_Status: string
{
    case Available = 'Available';
    case Occupied = 'Occupied';
    case Reserved = 'Reserved';
}
