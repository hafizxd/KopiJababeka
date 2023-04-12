<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $table = 'menu_table';
    public $incrementing = false;

    protected $primaryKey = 'Menu-ID';
    
    protected $guarded = [];
}
