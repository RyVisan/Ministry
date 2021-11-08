<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function image(){
        return $this->hasMany(Image::class,'cover_id','id');
    }
}
