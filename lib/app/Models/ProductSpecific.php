<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecific extends Model
{
    use HasFactory;
    protected $table='hnl_product_specific';
    protected $primaryKey='id';
    protected $fillable = [
        'prod_screen',
        'prod_tech',
        'prod_camera_front',
        'prod_camera_rear',
        'prod_chip',
        'prod_ram',
        'prod_pin'
    ];
    protected $guarded=[];
}
