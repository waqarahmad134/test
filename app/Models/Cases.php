<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    protected $table = 'cases';

    protected $fillable = [
         'i_date', 'i_no','cat', 'subcat', 'c_type','fir_no', 'fir_year', 'offence','jur', 'app_against','o_date', 'court_name', 'cnic', 'judge_id','ps_id', 'p1','p2','a_date','cno','m1','m2','pic','caset'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function court() {
        return $this->belongsTo('App\Models\Court');
    }
    public function cname($id) {
        return \App\Models\Court::find($id)->name;
    }
    public function sname($id) {
        return \App\Models\Subcat::find($id)->name;
    }
    public function jname($id) {
        return \App\Models\Judge::find($id)->name;
    }
    public function psname($id) {
        return \App\Models\PS::find($id)->name;
    }

    public function u($id) {
        return \App\Models\User::find($id);
    }

}
