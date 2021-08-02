<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Query extends Model
{
  use SoftDeletes;

  protected $table = 'tbl_query';

  protected $fillable = ['name', 'description', 'query_category_id'];

  public static $rules = [
    "name" => "required",
    "description" => "required",
    "query_category_id" => "required|numeric"
  ];

  public function query_category()
  {
    return $this->belongsTo('App\Models\QueryCategory');
  }
}
