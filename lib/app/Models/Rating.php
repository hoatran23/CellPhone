<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
 	protected $table='hnl_product_rating';
    protected $primaryKey='id_rating';
    protected $fillable = [
        'id_rating',
        'rate_vote',
        'rate_prod_id',
        'rate_comment',
        'rate_name',
        'rate_phone',
        'rate_email'
    ];
    protected $guarded=[];
}
