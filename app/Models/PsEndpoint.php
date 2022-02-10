<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsEndpoint extends Model
{
    use HasFactory;

    protected $table = "ps_endpoints";
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
