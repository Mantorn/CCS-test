<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'name',
        'customer_description',
        'inside_description',
        'date_of_return',
        'company_id',
    ];

    public $timestamps = true;
}
