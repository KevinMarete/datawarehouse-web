<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
  protected $table = 'etl_program_data';

  public $timestamps = false;

  protected $fillable = [
    'ref',
    'activity_date',
    'activity',
    'sub_activity',
    'no_of_pax',
    'sub_county',
    'facility',
    'received_by',
    'cost_kes',
    'cost_usd',
    'program_area',
    'funding_stream',
    'expenditure_analysis'
  ];

  public static $rules = [
    "ref" => "required",
    "activity_date" => "required|date",
    "activity" => "required",
    "sub_activity" => "required",
    "no_of_pax" => "required|numeric",
    "sub_county" => "required",
    "facility" => "required",
    "received_by" => "required",
    "cost_kes" => "required|numeric",
    "cost_usd" => "required|numeric",
    "program_area" => "required",
    "funding_stream" => "required",
    "expenditure_analysis" => "required",
  ];
}
