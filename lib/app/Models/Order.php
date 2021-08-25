<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='hnl_order';
    protected $primaryKey='order_id';
    protected $guarded=[];
    protected $keyType = 'string';
    public $incrementing = false;
}
