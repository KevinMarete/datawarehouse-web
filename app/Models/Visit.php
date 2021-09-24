<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
  protected $table = 'etl_patient_hiv_followup';

  protected $maps = [
    'Facility' => 'facility',
    'Gender' => 'gender',
    'location' => 'county',
    'Start_regimen' => 'start_regimen',
    'Start_regimen_date' => 'start_regimen_date',
    'sub_location' => 'sub_county',
  ];

  protected $appends = [
    'age',
    'age_group',
    'age_group_gender',
    'county',
    'facility',
    'gender',
    'next_visit_days',
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
    'facility',
    'gender',
    'next_appointment_date',
    'next_visit_days',
    'patient_id',
    'start_regimen',
    'start_regimen_date',
    'sub_county',
    'visit_date',
  ];

  protected $hidden = [
    'Gender',
    'Facility',
    'location',
    'Start_regimen',
    'Start_regimen_date',
    'sub_location'
  ];

  public function patient()
  {
    return $this->belongsTo('App\Models\Patient', 'patient_id', 'patient_id');
  }

  public function getAgeAttribute()
  {
    return Carbon::parse($this->patient->DOB)->age;
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

  public function getFacilityAttribute()
  {
    return strtoupper($this->patient->attributes['Facility']);
  }

  public function getGenderAttribute()
  {
    return $this->patient->attributes['Gender'];
  }

  public function getNextVisitDaysAttribute()
  {
    $visit_date = Carbon::parse($this->visit_date);
    $next_visit_date = Carbon::parse($this->next_appointment_date);

    return $next_visit_date->diffInDays($visit_date);
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
