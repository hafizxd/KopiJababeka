<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Order extends Model
{
    use HasFactory;

    public $table = 'order_table';
    public $incrementing = false;

    protected $primaryKey = 'Order-ID';
    
    protected $guarded = [];

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'Order-ID');
    } 
}
