<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub1_menu extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function submenu(){
        return $this->belongsTo(Submenu::class,'submenu_id','id');
    }
}
