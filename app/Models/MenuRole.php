<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuRole extends Model
{
  use SoftDeletes;

  protected $table = 'tbl_menu_role';

  protected $fillable = ['menu_id', 'role_id'];

  public static $rules = [
    "menu_id" => "required|numeric",
    "role_id" => "required|numeric"
  ];

  public function menu()
  {
    return $this->belongsTo('App\Models\Menu')->withTrashed();
  }

  public function role()
  {
    return $this->belongsTo('App\Models\Role')->withTrashed();
  }
}
