<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
  use SoftDeletes;

  protected $table = 'tbl_facility';

  protected $fillable = ['mflcode', 'name', 'subcounty_id'];

  public static $rules = [
    "mflcode" => "required",
    "name" => "required",
    "subcounty_id" => "required|numeric",
  ];

  public function subcounty()
  {
    return $this->belongsTo('App\Models\SubCounty')->withTrashed();
  }
}
