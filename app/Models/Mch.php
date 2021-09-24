<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Mch extends Model
{
  protected $table = 'etl_mch_enrollment';

  protected $maps = [];

  protected $appends = [
    'age',
    'age_group',
    'age_group_large',
    'age_group_gender',
    'county',
    'current_status',
    'facility',
    'gender',
    'is_new_pregnant',
    'is_known_status',
    'is_kp',
    'is_new_tested',
    'is_tested_positive',
    'is_infant',
    'eid_sample_collection_period',
    'hei_sample_collection_period',
    'start_regimen',
    'start_regimen_date',
    'sub_county'
  ];

  protected $visible = [
    'age',
    'age_group',
    'age_group_large',
    'age_group_gender',
    'current_regimen',
    'county',
    'current_status',
    'enroll_date',
    'facility',
    'gender',
    'is_new_pregnant',
    'is_known_status',
    'is_kp',
    'is_new_tested',
    'is_tested_positive',
    'is_infant',
    'eid_sample_collection_period',
    'hei_sample_collection_period',
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
    } elseif ($this->age >= 15 && $this->age < 25) {
      $age_group = "15 - 24 yrs (Youths)";
    } else {
      $age_group = "25+ yrs (Adults)";
    }
    return $age_group;
  }

  public function getAgeGroupLargeAttribute()
  {
    $age = $this->age;

    if ($age < 1) {
      $age_group_large = "<1 yrs";
    } elseif ($age >= 1 && $age < 5) {
      $age_group_large = "1-4 yrs";
    } elseif ($age >= 5 && $age < 10) {
      $age_group_large = "5-9 yrs";
    } elseif ($age >= 10 && $age < 15) {
      $age_group_large = "10-14 yrs";
    } elseif ($age >= 15 && $age < 20) {
      $age_group_large = "15-19 yrs";
    } elseif ($age >= 20 && $age < 25) {
      $age_group_large = "20-24 yrs";
    } elseif ($age >= 25 && $age < 30) {
      $age_group_large = "25-29 yrs";
    } elseif ($age >= 30 && $age < 35) {
      $age_group_large = "30-34 yrs";
    } elseif ($age >= 35 && $age < 40) {
      $age_group_large = "35-39 yrs";
    } elseif ($age >= 40 && $age < 45) {
      $age_group_large = "40-44 yrs";
    } elseif ($age >= 45 && $age < 50) {
      $age_group_large = "45-49 yrs";
    } else {
      $age_group_large = "50+ yrs";
    }
    return $age_group_large;
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

  public function getIsNewPregnantAttribute()
  {
    return false;
  }

  public function getIsKnownStatusAttribute()
  {
    return false;
  }

  public function getIsKpAttribute()
  {
    return false;
  }

  public function getIsNewTestedAttribute()
  {
    return false;
  }

  public function getIsTestedPositiveAttribute()
  {
    return false;
  }

  public function getIsInfantAttribute()
  {
    return false;
  }

  public function getEidSampleCollectionPeriodAttribute()
  {
    $hiv_test_date = Carbon::parse($this->hiv_test_date);
    $birth_date = Carbon::parse($this->patient->dob);
    $period = $hiv_test_date->diffInDays($birth_date);

    if ($period > 0 && $period < 366) {
      $eid_sample_collection_period = "0-12 Months";
    } else {
      $eid_sample_collection_period = "Over 12 Months";
    }
    return $eid_sample_collection_period;
  }

  public function getHeiSampleCollectionPeriodAttribute()
  {
    $hiv_test_date = Carbon::parse($this->hiv_test_date);
    $birth_date = Carbon::parse($this->patient->dob);
    $period = $hiv_test_date->diffInDays($birth_date);

    if ($period > 0 && $period < 61) {
      $hei_sample_collection_period = "0-2 Months";
    } elseif ($period >= 61  && $this->age < 366) {
      $hei_sample_collection_period = "2-12 Months";
    } else {
      $hei_sample_collection_period = "Over 12 Months";
    }
    return $hei_sample_collection_period;
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
