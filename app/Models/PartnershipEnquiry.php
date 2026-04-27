<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnershipEnquiry extends Model
{
    protected $fillable = [
        'name', 'company', 'email', 'phone', 'budget_range', 'message',
    ];
}
