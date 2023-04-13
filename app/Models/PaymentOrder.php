<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;

class PaymentOrder extends Model
{
    use HasFactory;

    public $table = 'payment_order';
    public $incrementing = false;

    protected $primaryKey = 'Payment-ID';
    protected $guarded = [];

    public function order() {
        return $this->belongsTo(Order::class, 'Order-ID');
    }
}
