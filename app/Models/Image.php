<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function cover(){
        return $this->belongsTo(Cover::class,'cover_id','id');
    }
}
