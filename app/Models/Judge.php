<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    use HasFactory;
    protected $table = 'judges';

    protected $fillable = [
        'name', 'user_id'
    ];

    public function Cases() {
        return $this->hasMany('App\Models\Cases');
    }
}
