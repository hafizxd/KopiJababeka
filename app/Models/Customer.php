<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $table = 'customer_table';
    public $incrementing = false;

    protected $primaryKey = 'Customer-ID';
    
    protected $guarded = [];
}
