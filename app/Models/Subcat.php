<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcat extends Model
{
    use HasFactory;
    protected $table = 'subcat';

    protected $fillable = [
        'name', 'cat_id'
    ];

    public function Cases() {
        return $this->hasMany('App\Models\Cases');
    }

    public function cname($id) {
        return \App\Models\Court::find($id)->name;
    }
   
}
