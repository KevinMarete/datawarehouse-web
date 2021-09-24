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
    'age_group_large',
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
    'is_offered_test',
    'is_accepted_test',
    'is_contact_elicited',
    'is_contact_tested_kp',
    'is_contact_new_negative',
    'is_contact_new_positive',
    'is_contact_not_tested',
    'is_ft_testing_point',
    'is_pns_testing_point',
    'is_tested_negative',
    'is_tested_positive',
    'is_child',
    'is_adult',
    'is_vl',
    'is_vl_routine',
    'is_vl_targeted',
    'is_vl_routine_suppressed',
    'is_vl_routine_not_suppressed',
    'is_vl_targeted_suppressed',
    'is_vl_targeted_not_suppressed',
    'is_linked',
    'testing_point',
    'datim',
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
    'enrollment_date',
    'facility',
    'gender',
    'is_new_care',
    'is_new_care_bcd4',
    'is_eligible_crag',
    'is_crag_test',
    'is_crag_test_positive',
    'is_fluconazole',
    'is_offered_test',
    'is_accepted_test',
    'is_contact_elicited',
    'is_contact_tested_kp',
    'is_contact_new_negative',
    'is_contact_new_positive',
    'is_contact_not_tested',
    'is_ft_testing_point',
    'is_pns_testing_point',
    'is_tested_negative',
    'is_tested_positive',
    'is_child',
    'is_adult',
    'is_vl',
    'is_vl_routine',
    'is_vl_targeted',
    'is_vl_routine_suppressed',
    'is_vl_routine_not_suppressed',
    'is_vl_targeted_suppressed',
    'is_vl_targeted_not_suppressed',
    'is_linked',
    'testing_point',
    'datim',
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
    return (isset($this->patient->dob) ? Carbon::parse($this->patient->dob)->age : 0);
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
    return (isset($this->patient->attributes['location']) ? strtoupper($this->patient->attributes['location']) : 'None');
  }

  public function getCurrentStatusAttribute()
  {
    return (isset($this->patient->attributes['ART_Status']) ? strtoupper($this->patient->attributes['ART_Status']) : 'None');
  }

  public function getEnrollmentDateAttribute()
  {
    return (isset($this->patient->attributes['Enrollment_Date']) ? $this->patient->attributes['Enrollment_Date'] : 'None');
  }

  public function getFacilityAttribute()
  {
    return (isset($this->patient->attributes['Facility']) ? strtoupper($this->patient->attributes['Facility']) : 'None');
  }

  public function getGenderAttribute()
  {
    return (isset($this->patient->attributes['Gender']) ? $this->patient->attributes['Gender'] : 'None');
  }

  public function getIsNewCareAttribute()
  {
    if (!isset($this->patient->enrollment_date)) {
      return false;
    }
    // If $test_date < 30 days then is_new_care = 1 otherwise is_new_care = 0
    $enrollment_date = Carbon::parse($this->patient->enrollment_date);
    $test_date = Carbon::parse($this->attributes["date_test_requested"]);
    return ($test_date->diffInDays($enrollment_date) < 30 ? true : false);
  }

  public function getIsNewCareBcd4Attribute()
  {
    if (!isset($this->patient->attributes['baseline_cd4'])) {
      return false;
    }
    return ($this->is_new_care && !is_null($this->patient->attributes['baseline_cd4']) ? true : false);
  }

  public function getIsEligibleCragAttribute()
  {
    if (!isset($this->patient->attributes['baseline_cd4'])) {
      return false;
    }
    return ($this->is_new_care && !is_null($this->patient->attributes['baseline_cd4']) && $this->patient->attributes['baseline_cd4'] < 200 ? true : false);
  }

  public function getIsCragTestAttribute()
  {
    return ($this->attributes['lab_test'] == 1305 ? true : false);
  }

  public function getIsCragTestPositiveAttribute()
  {
    return ($this->attributes['lab_test'] == 1305 && $this->attributes['test_result'] > 95 ? true : false);
  }

  public function getIsFluconazoleAttribute()
  {
    return false;
  }

  public function getIsOfferedTestAttribute()
  {
    return false;
  }

  public function getIsAcceptedTestAttribute()
  {
    return false;
  }

  public function getIsContactElicitedAttribute()
  {
    return false;
  }

  public function getIsContactTestedKpAttribute()
  {
    return false;
  }

  public function getIsContactNewNegativeAttribute()
  {
    return false;
  }

  public function getIsContactNewPositiveAttribute()
  {
    return false;
  }

  public function getIsContactNotTestedAttribute()
  {
    return false;
  }

  public function getIsFtTestingPointAttribute()
  {
    return false;
  }

  public function getIsPnsTestingPointAttribute()
  {
    return false;
  }

  public function getIsTestedNegativeAttribute()
  {
    return false;
  }

  public function getIsTestedPositiveAttribute()
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

  public function getIsVlAttribute()
  {
    ($this->attributes['lab_test'] == 856 ? true : false);
  }

  public function getIsVlRoutineAttribute()
  {
    (($this->is_vl && $this->attributes['urgency'] == 'ROUTINE') ? true : false);
  }

  public function getIsVlTargetedAttribute()
  {
    (($this->is_vl && $this->attributes['urgency'] != 'ROUTINE') ? true : false);
  }

  public function getIsVlRoutineSuppressedAttribute()
  {
    (($this->is_vl_routine && $this->attributes['test_result'] < 200) ? true : false);
  }

  public function getIsVlRoutineNotSuppressedAttribute()
  {
    (($this->is_vl_routine && $this->attributes['test_result'] >= 200) ? true : false);
  }

  public function getIsVlTargetedSuppressedAttribute()
  {
    (($this->is_vl_targeted && $this->attributes['test_result'] < 200) ? true : false);
  }

  public function getIsVlTargetedNotSuppressedAttribute()
  {
    (($this->is_vl_targeted && $this->attributes['test_result'] >= 200) ? true : false);
  }

  public function getIsLinkedAttribute()
  {
    return false;
  }

  public function getTestingPointAttribute()
  {
    return false;
  }

  public function getDatimAttribute()
  {
    return false;
  }

  public function getStartRegimenDateAttribute()
  {
    return (isset($this->patient->attributes['Start_regimen_date']) ? $this->patient->attributes['Start_regimen_date'] : 'None');
  }

  public function getStartRegimenAttribute()
  {
    return (isset($this->patient->attributes['Start_regimen']) ? $this->patient->attributes['Start_regimen'] : 'None');
  }

  public function getSubCountyAttribute()
  {
    return (isset($this->patient->attributes['sub_location']) ? strtoupper($this->patient->attributes['sub_location']) : 'None');
  }
}
