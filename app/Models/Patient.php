<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  protected $table = 'etl_art_master_list';

  protected $maps = [
    'ART_Status' => 'current_status',
    'Enrollment_Date' => 'enrollment_date',
    'Facility' => 'facility',
    'Gender' => 'gender',
    'location' => 'county',
    'Start_regimen' => 'start_regimen',
    'Start_regimen_date' => 'start_regimen_date',
    'sub_location' => 'sub_county'
  ];

  protected $appends = [
    'age',
    'age_group',
    'age_group_gender',
    'county',
    'current_status',
    'enrollment_date',
    'facility',
    'gender',
    'start_regimen',
    'start_regimen_date',
    'sub_county'
  ];

  protected $visible = [
    'age',
    'age_group',
    'age_group_gender',
    'county',
    'current_regimen',
    'current_regimen_date',
    'current_status',
    'enrollment_date',
    'facility',
    'gender',
    'hiv_test_date',
    'start_regimen',
    'start_regimen_date',
    'sub_county'
  ];

  protected $hidden = [
    'ART_Status',
    'Gender',
    'Enrollment_Date',
    'Facility',
    'location',
    'Start_regimen',
    'Start_regimen_date',
    'sub_location'
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
    return strtoupper($this->attributes['location']);
  }

  public function getCurrentStatusAttribute()
  {
    return strtolower($this->attributes['ART_Status']);
  }

  public function getEnrollmentDateAttribute()
  {
    return $this->attributes['Enrollment_Date'];
  }

  public function getFacilityAttribute()
  {
    return strtoupper($this->attributes['Facility']);
  }

  public function getGenderAttribute()
  {
    return $this->attributes['Gender'];
  }

  public function getStartRegimenDateAttribute()
  {
    return $this->attributes['Start_regimen_date'];
  }

  public function getStartRegimenAttribute()
  {
    return $this->attributes['Start_regimen'];
  }

  public function getSubCountyAttribute()
  {
    return strtoupper($this->attributes['sub_location']);
  }
}
