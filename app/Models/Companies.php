<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'reputation',
    ];

    public $timestamps = true;

    public function items()
    {
        return $this->hasMany(Items::class, 'company_id')->get();
    }
}
