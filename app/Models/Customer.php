<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Customer extends Authenticatable
{
    protected $guarded = [];
    public $timestaps = false;
    protected $casts = [
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
    ];
}
