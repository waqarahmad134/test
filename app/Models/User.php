<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\Models\Cases;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'ctype', 'tehsil', 'phone', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Cases() {
        return $this->hasMany('App\Models\Cases');
    }
    public function counts($id)
    {
        return Cases::where('user_id',$id)->count();
    }
    public function countstoday($id)
    {
        return Cases::where('user_id',$id)->whereDate('created_at', Carbon::today())->count();
    }
    public function countsbydate($id, $date)
    {
        
        return Cases::where('user_id',$id)->where('created_at', $date)->count();
    }
}
