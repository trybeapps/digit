<?php

namespace App\Models\Enums;

use MabeEnum\Enum;

class AccountType extends Enum
{
    const ASSETS = "Assets";
    const LIABILITIES = "Liabilities";
    const EXPENSES = "Expenses";
    const EQUITY = "Equity";
    const REVENUE = "Revenue";
}