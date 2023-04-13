<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class OrderDetail extends Model
{
    use HasFactory;

    public $table = 'order_detail';
    public $incrementing = false;

    protected $primaryKey = 'Order-Detail-ID';
    
    protected $guarded = [];

    public function menu() {
        return $this->belongsTo(Menu::class, 'Menu-ID');
    }
}
