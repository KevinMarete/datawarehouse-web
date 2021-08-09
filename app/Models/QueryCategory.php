<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QueryCategory extends Model
{
  use SoftDeletes;

  protected $table = 'tbl_query_category';

  protected $fillable = ['name'];

  public static $rules = [
    "name" => "required"
  ];

  public function queries()
  {
    return $this->hasMany('App\Models\Query')->withTrashed();
  }
}
