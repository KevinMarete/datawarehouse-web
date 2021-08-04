<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  protected $table = 'etl_art_master_list';

  protected $maps = [
    'Gender' => 'gender',
    'Enrollment_Date' => 'enrollment_date',
    'Start_regimen' => 'start_regimen',
    'Start_regimen_date' => 'start_regimen_date'
  ];

  protected $appends = ['age', 'age_group', 'gender', 'enrollment_date', 'start_regimen', 'start_regimen_date'];

  protected $visible = ['age', 'age_group', 'gender', 'enrollment_date', 'start_regimen', 'start_regimen_date', 'current_regimen', 'current_regimen_date'];

  protected $hidden = array('Gender', 'Enrollment_Date', 'Enrollment_Date', 'Start_regimen', 'Start_regimen_date');

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

  public function getEnrollmentDateAttribute()
  {
    return $this->attributes['Enrollment_Date'];
  }
}
