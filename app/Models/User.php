<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = 'user_table';

    protected $primaryKey = 'User-ID';

    protected $fillable = [
        'User-ID',
        'User-Name',
        'User-Login',
    ];
    
    protected $hidden = [
        'Password'
    ];

    public function getAuthPassword() {
        return $this->Password;
    }
}
