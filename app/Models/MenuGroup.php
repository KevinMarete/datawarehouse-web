<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuGroup extends Model
{
  use SoftDeletes;

  protected $table = 'tbl_menu_group';

  protected $fillable = ['name', 'icon'];

  public static $rules = [
    "name" => "required",
    "icon" => "required",
  ];

  public function menus()
  {
    return $this->hasMany('App\Models\Menu');
  }
}
