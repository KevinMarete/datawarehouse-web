<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class County extends Model
{
  use SoftDeletes;

  protected $table = 'tbl_county';

  protected $fillable = ['name'];

  public static $rules = [
    "name" => "required",
  ];

  public function subcounties()
  {
    return $this->hasMany('App\Models\SubCounty');
  }
}
