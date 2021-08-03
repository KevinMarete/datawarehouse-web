<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
  use SoftDeletes;

  protected $table = 'tbl_menu';

  protected $fillable = ['name', 'link', 'menu_group_id'];

  public static $rules = [
    "name" => "required",
    "link" => "required",
    "menu_group_id" => "required|numeric",
  ];

  public function menu_group()
  {
    return $this->belongsTo('App\Models\MenuGroup');
  }

  public function menu_roles()
  {
    return $this->hasMany('App\Models\MenuRole');
  }
}
