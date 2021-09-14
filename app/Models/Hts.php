<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Hts extends Model
{
  protected $table = 'etl_laboratory_extract';

  protected $maps = [];

  protected $appends = [
    'age',
    'age_group',
    'age_group_gender',
    'county',
    'current_status',
    'enrollment_date',
    'facility',
    'gender',
    'is_new_care',
    'is_new_care_bcd4',
    'is_eligible_crag',
    'is_crag_test',
    'is_crag_test_positive',
    'is_fluconazole',
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
    'enrollment_date',
    'facility',
    'gender',
    'is_new_care',
    'is_new_care_bcd4',
    'is_eligible_crag',
    'is_crag_test',
    'is_crag_test_positive',
    'is_fluconazole',
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
    if ($this->patient->age > 0 && $this->patient->age < 10) {
      $age_group = "0 - 9 yrs (Children)";
    } elseif ($this->patient->age >= 10 && $this->patient->age < 20) {
      $age_group = "10 - 19 yrs (Adolescents)";
    } else {
      $age_group = "20+ yrs (Adults)";
    }
    return $age_group;
  }

  public function getAgeGroupGenderAttribute()
  {
    $age = $this->patient->age;
    $gender = $this->patient->gender;

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

  public function getEnrollmentDateAttribute()
  {
    return strtoupper($this->patient->attributes['Enrollment_Date']);
  }

  public function getFacilityAttribute()
  {
    return strtoupper($this->patient->attributes['Facility']);
  }

  public function getGenderAttribute()
  {
    return $this->patient->attributes['Gender'];
  }

  public function getIsNewCareAttribute()
  {
    // If $test_date < 30 days then is_new_care = 1 otherwise is_new_care = 0
    $enrollment_date = Carbon::parse($this->patient->enrollment_date);
    $test_date = Carbon::parse($this->attributes["date_test_requested"]);
    return ($test_date->diffInDays($enrollment_date) < 30 ? true : false);
  }

  public function getIsNewCareBcd4Attribute()
  {
    return ($this->attributes['lab_test'] == 5497 ? false : true);
  }

  public function getIsEligibleCragAttribute()
  {
    return (is_null($this->attributes['lab_test']) ? false : true);
  }

  public function getIsCragTestAttribute()
  {
    return (is_null($this->attributes['lab_test']) ? false : true);
  }

  public function getIsCragTestPositiveAttribute()
  {
    return (is_null($this->attributes['lab_test']) ? false : true);
  }

  public function getIsFluconazoleAttribute()
  {
    return (is_null($this->attributes['lab_test']) ? false : true);
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
