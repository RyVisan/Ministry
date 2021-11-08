<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id','id');
    }
    public function submenu(){
        return $this->belongsTo(Submenu::class, 'submenu_id','id');
    }
//    public function sub1menu(){
//        return $this->belongsTo(Sub1_menu::class, 'sub1menu_id','id');
//    }
}
