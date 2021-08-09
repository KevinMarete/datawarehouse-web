<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FacilityController extends BaseController
{
  public function displayFacilityTableView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'table_data' => $this->manageResourceData($token, 'GET', 'facility', [])
    ];
    $data = [
      'page_title' => 'Facility',
      'main_menu' => 'settings',
      'sub_menu' => 'facility',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('facility.listing', $view_data),
    ];

    return view('template.main', $data);
  }

  public function displayNewFacilityView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'subcounties' => $this->manageResourceData($token, 'GET', 'subcounty')
    ];

    $data = [
      'page_title' => 'Add Facility',
      'main_menu' => 'settings',
      'sub_menu' => 'facility',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('facility.new', $view_data)
    ];

    return view('template.main', $data);
  }

  public function saveFacility(Request $request)
  {
    $token = session()->get('token');

    $facility_data = [
      'mflcode' => $request->mflcode,
      'name' => $request->name,
      'subcounty_id' => $request->subcounty_id
    ];
    $facility_response = $this->manageResourceData($token, "POST", "facility", $facility_data);

    if (isset($facility_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Facility was not added successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Facility was created successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/facility');
  }

  public function displayFacilityView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'edit' => $this->manageResourceData($token, 'GET', 'facility/' . $request->id, []),
      'subcounties' => $this->manageResourceData($token, 'GET', 'subcounty')
    ];

    $data = [
      'page_title' => 'View Facility',
      'main_menu' => 'settings',
      'sub_menu' => 'facility',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('facility.view', $view_data)
    ];

    return view('template.main', $data);
  }

  public function updateFacility(Request $request)
  {
    $facility_id = $request->id;

    $token = session()->get('token');

    $facility_data = [
      'mflcode' => $request->mflcode,
      'name' => $request->name,
      'subcounty_id' => $request->subcounty_id
    ];
    $facility_response = $this->manageResourceData($token, "PUT", "facility/" . $facility_id, $facility_data);

    if (isset($facility_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Facility was not updated successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Facility have been updated successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/facility/view/' . $facility_id);
  }

  public function deleteFacility(Request $request)
  {
    $facility_id = $request->id;

    $token = session()->get('token');

    $facility_response = $this->manageResourceData($token, "DELETE", "facility/" . $facility_id, []);

    if (isset($facility_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Facility was not deleted successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Facility was deleted successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/facility');
  }
}
