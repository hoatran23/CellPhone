<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table='hnl_product_image';
    protected $primaryKey='id';
    protected $fillable = [
        'prod_sub_img_name',
        'prod_sub_img',
        'prod_id'
    ];
    protected $guarded=[];
}
