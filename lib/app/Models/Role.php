<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'hnl_role';

    protected $fillable = [
        'name',
        'display_name'
    ];
    
    public function permission() {
        return $this->belongsToMany(Permission::class, 'hnl_role_permission');
    }

}
