<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsAuth extends Model
{
    use HasFactory;

    protected $table = "ps_auths";
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
