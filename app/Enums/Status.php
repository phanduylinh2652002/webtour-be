<?php

namespace App\Enums;

enum Status: int
{
    case PENDING = 0;
    case CHECK_IN = 1;
    case CHECK_OUT = 2;
    case CANCEL = 3;
    case OUT_DATE = 4;
}
