<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    use HasApiTokens;

    use HasFactory;

    protected $table = 'tbl_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'phone', 'email', 'email_verified_at', 'password', 'is_active', 'role_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public static $rules = [
        "firstname" => "required",
        "lastname" => "required",
        "phone" => "required",
        "email" => "required|email",
        "role_id" => "required|numeric",
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role')->withTrashed();
    }
}
