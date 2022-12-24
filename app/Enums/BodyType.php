<?php

namespace App\Enums;

enum BodyType: string
{
    case SEDAN = 'Sedan';
    case HATCHBACK = 'HatchBack';
    case SUV = 'Suv';
    case VAN = 'Van';
    case TRUCK = 'Truck';
    case WAGON = 'Wagon';
    case BUS = 'Bus';
    case COUPE = 'Coupe';
}
