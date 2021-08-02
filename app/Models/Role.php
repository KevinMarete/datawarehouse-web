<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
  use SoftDeletes;

  protected $table = 'tbl_role';

  protected $fillable = ['name'];

  public static $rules = [
    "name" => "required",
  ];

  public function users()
  {
    return $this->hasMany('App\Models\User');
  }
}
