<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentOrder;
use App\Models\OrderDetail;
use App\Models\Customer;

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

    public function customer() {
        return $this->belongsTo(Customer::class, 'Customer-ID');
    }

    public function payment() {
        return $this->hasOne(PaymentOrder::class, 'Order-ID');
    }
}
