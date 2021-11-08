<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id','id');
    }
    public function sub1_menu(){
        return $this->hasMany(Sub1_menu::class, 'submenu_id','id');
    }
}
