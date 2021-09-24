<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tb extends Model
{
  protected $table = 'etl_ipt_follow_up';

  protected $maps = [];

  protected $appends = [
    'age',
    'age_group',
    'age_group_gender',
    'county',
    'current_status',
    'facility',
    'gender',
    'is_new',
    'is_relapsed',
    'is_known_hiv_status',
    'is_kp',
    'is_new_tested',
    'is_new_positive',
    'is_positive',
    'is_on_haart',
    'has_tb',
    'tb_status',
    'treatment_outcome',
    'is_screened',
    'is_diagnosed',
    'start_tb_treatment_date',
    'is_genexpert',
    'is_chest_xray',
    'is_smear_microscopy',
    'is_child',
    'is_adult',
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
    'is_new',
    'is_relapsed',
    'is_known_hiv_status',
    'is_kp',
    'is_new_tested',
    'is_new_positive',
    'is_positive',
    'is_on_haart',
    'has_tb',
    'tb_status',
    'treatment_outcome',
    'is_screened',
    'is_diagnosed',
    'start_tb_treatment_date',
    'is_genexpert',
    'is_chest_xray',
    'is_smear_microscopy',
    'is_child',
    'is_adult',
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

  public function getIsNewAttribute()
  {
    return false;
  }

  public function getIsRelapsedAttribute()
  {
    return false;
  }

  public function getIsKnownHivStatusAttribute()
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

  public function getIsNewPositiveAttribute()
  {
    return false;
  }

  public function getIsPositiveAttribute()
  {
    return false;
  }

  public function getIsOnHaartAttribute()
  {
    return false;
  }

  public function getHasTbAttribute()
  {
    return false;
  }

  public function getTbStatusAttribute()
  {
    return false;
  }

  public function getTreatmentOutcomeAttribute()
  {
    return false;
  }

  public function getIsScreenedAttribute()
  {
    return false;
  }

  public function getIsDiagnosedAttribute()
  {
    return false;
  }

  public function getStartTbTreatmentDateAttribute()
  {
    return false;
  }

  public function getIsGenexpertAttribute()
  {
    return false;
  }

  public function getIsChestXrayAttribute()
  {
    return false;
  }

  public function getIsSmearMicroscopyAttribute()
  {
    return false;
  }

  public function getIsChildAttribute()
  {
    return ($this->age < 15 ? true : false);
  }

  public function getIsAdultAttribute()
  {
    return ($this->age >= 15 ? true : false);
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
