<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table='hnl_order_detail';
    protected $primaryKey='order_id';
    protected $guarded=[];
}
