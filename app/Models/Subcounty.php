<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCounty extends Model
{
  use SoftDeletes;

  protected $table = 'tbl_subcounty';

  protected $fillable = ['name', 'county_id'];

  public static $rules = [
    "name" => "required",
    "county_id" => "required|numeric",
  ];

  public function county()
  {
    return $this->belongsTo('App\Models\County')->withTrashed();
  }

  public function facilities()
  {
    return $this->hasMany('App\Models\Facility', 'subcounty_id', 'id');
  }
}
