<?php

namespace App\Enums;

enum EMP_Type: string
{
    case Receptionist = 'Receptionist';
    case Manager = 'Manager';
    case Admin = 'Admin';
}