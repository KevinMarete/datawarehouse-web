<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Hei extends Model
{
  protected $table = 'etl_hei_enrollment';

  protected $maps = [];

  protected $appends = [
    'age',
    'age_group',
    'age_group_gender',
    'county',
    'current_status',
    'facility',
    'gender',
    'is_new_ipt',
    'is_adult',
    'is_child',
    'current_art_ever_on_ipt',
    'expected_to_complete_ipt',
    'completed_ipt',
    'not_complete_reason_not_completed',
    'not_complete_reason_discontinued_developed_tb',
    'not_complete_reason_ltfu',
    'not_complete_reason_to',
    'start_regimen',
    'start_regimen_date',
    'sub_county'
  ];

  protected $visible = [
    'age',
    'age_group',
    'age_group_gender',
    'current_regimen',
    'county',
    'current_status',
    'enroll_date',
    'facility',
    'gender',
    'is_new_ipt',
    'is_adult',
    'is_child',
    'current_art_ever_on_ipt',
    'expected_to_complete_ipt',
    'completed_ipt',
    'not_complete_reason_not_completed',
    'not_complete_reason_discontinued_developed_tb',
    'not_complete_reason_ltfu',
    'not_complete_reason_to',
    'patient_id',
    'start_regimen',
    'start_regimen_date',
    'sub_county'
  ];

  protected $hidden = [];

  public function patient()
  {
    return $this->belongsTo('App\Models\Patient', 'patient_id', 'patient_id');
  }

  public function getAgeAttribute()
  {
    return Carbon::parse($this->patient->dob)->age;
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
    return strtoupper($this->patient->attributes['location']);
  }

  public function getCurrentStatusAttribute()
  {
    return strtoupper($this->patient->attributes['ART_Status']);
  }

  public function getFacilityAttribute()
  {
    return strtoupper($this->patient->attributes['Facility']);
  }

  public function getGenderAttribute()
  {
    return $this->patient->attributes['Gender'];
  }

  public function getIsNewIptAttribute()
  {
    return false;
  }

  public function getIsAdultAttribute()
  {
    return ($this->age >= 15 ? true : false);
  }

  public function getIsChildAttribute()
  {
    return ($this->age < 15 ? true : false);
  }

  public function getCurrentArtEverOnIptAttribute()
  {
    return false;
  }

  public function getExpectedToCompleteIptAttribute()
  {
    return false;
  }

  public function getCompletedIptAttribute()
  {
    return false;
  }

  public function getNotCompleteReasonNotCompletedAttribute()
  {
    return false;
  }

  public function getNotCompleteReasonDiscontinuedDevelopedTbAttribute()
  {
    return false;
  }
  
  public function getNotCompleteReasonLtfuAttribute()
  {
    return false;
  }

  public function getNotCompleteReasonToAttribute()
  {
    return false;
  }

  public function getStartRegimenDateAttribute()
  {
    return $this->patient->attributes['Start_regimen_date'];
  }

  public function getStartRegimenAttribute()
  {
    return $this->patient->attributes['Start_regimen'];
  }

  public function getSubCountyAttribute()
  {
    return strtoupper($this->patient->attributes['sub_location']);
  }
}
