<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PatientDemographics extends Model
{
  protected $table = 'etl_patient_demographics';

  protected $maps = [
    'Gender' => 'gender'
  ];

  protected $appends = [
    'age',
    'age_group',
    'age_group_gender',
    'county',
    'facility',
    'gender',
    'sub_county'
  ];

  protected $visible = [
    'age',
    'age_group',
    'age_group_gender',
    'county',
    'facility',
    'gender',
    'sub_county'
  ];

  protected $hidden = [
    'Gender'
  ];

  public function getAgeAttribute()
  {
    return Carbon::parse($this->DOB)->age;
  }

  public function getAgeGroupAttribute()
  {
    if ($this->age > 0 && $this->age < 10) {
      $age_group = "0 - 9 yrs (Children)";
    } elseif ($this->age >= 10 && $this->age < 20) {
      $age_group = "10 - 19 yrs (Adolescents)";
    } else {
      $age_group = "20+ yrs (Adults)";
    }
    return $age_group;
  }

  public function getAgeGroupGenderAttribute()
  {
    $age = $this->age;
    $gender = $this->gender;

    if ($age < 1) {
      $age_group_gender = "<1 " . $gender;
    } elseif ($age >= 1 && $age < 5) {
      $age_group_gender = "1-4 " . $gender;
    } elseif ($age >= 5 && $age < 10) {
      $age_group_gender = "5-9 " . $gender;
    } elseif ($age >= 10 && $age < 15) {
      $age_group_gender = "10-14 " . $gender;
    } elseif ($age >= 15 && $age < 20) {
      $age_group_gender = "15-19 " . $gender;
    } elseif ($age >= 20 && $age < 25) {
      $age_group_gender = "20-24 " . $gender;
    } elseif ($age >= 25 && $age < 30) {
      $age_group_gender = "25-29 " . $gender;
    } elseif ($age >= 30 && $age < 35) {
      $age_group_gender = "30-34 " . $gender;
    } elseif ($age >= 35 && $age < 40) {
      $age_group_gender = "35-39 " . $gender;
    } elseif ($age >= 40 && $age < 45) {
      $age_group_gender = "40-44 " . $gender;
    } elseif ($age >= 45 && $age < 50) {
      $age_group_gender = "45-49 " . $gender;
    } else {
      $age_group_gender = "50+ " . $gender;
    }
    return $age_group_gender;
  }

  public function getCountyAttribute()
  {
    return null;
  }

  public function getFacilityAttribute()
  {
    return null;
  }

  public function getGenderAttribute()
  {
    return $this->attributes['Gender'];
  }

  public function getSubCountyAttribute()
  {
    return null;
  }
}
