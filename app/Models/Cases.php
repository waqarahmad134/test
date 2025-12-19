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
        $court = \App\Models\Court::find($id);
        return $court ? $court->name : '';
    }
    public function sname($id) {
        $subcat = \App\Models\Subcat::find($id);
        return $subcat ? $subcat->name : '';
    }
    public function jname($id) {
        $judge = \App\Models\Judge::find($id);
        return $judge ? $judge->name : '';
    }
    public function psname($id) {
        $ps = \App\Models\PS::find($id);
        return $ps ? $ps->name : '';
    }

    public function u($id) {
        return \App\Models\User::find($id);
    }

}
