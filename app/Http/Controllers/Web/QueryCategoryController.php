<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class QueryCategoryController extends BaseController
{
  public function displayQueryCategoryTableView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'table_data' => $this->manageResourceData($token, 'GET', 'querycategory', [])
    ];
    $data = [
      'page_title' => 'Query Category',
      'main_menu' => 'data',
      'sub_menu' => 'query-category',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('querycategory.listing', $view_data),
    ];

    return view('template.main', $data);
  }

  public function displayNewQueryCategoryView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'roles' => $this->manageResourceData($token, 'GET', 'role', [])
    ];

    $data = [
      'page_title' => 'Add Query Category',
      'main_menu' => 'data',
      'sub_menu' => 'query-category',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('querycategory.new', $view_data)
    ];

    return view('template.main', $data);
  }

  public function saveQueryCategory(Request $request)
  {
    $token = session()->get('token');

    $querycategory_data = [
      'name' => $request->name
    ];
    $querycategory_response = $this->manageResourceData($token, "POST", "querycategory", $querycategory_data);

    if (isset($querycategory_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Querycategory was not added successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Querycategory was created successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/querycategory');
  }

  public function displayQueryCategoryView(Request $request)
  {
    $querycategory_id = $request->id;

    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'edit' => $this->manageResourceData($token, 'GET', 'querycategory/' . $querycategory_id, [])
    ];

    $data = [
      'page_title' => 'View Query Category',
      'main_menu' => 'data',
      'sub_menu' => 'query-category',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('querycategory.view', $view_data)
    ];

    return view('template.main', $data);
  }

  public function updateQueryCategory(Request $request)
  {
    $querycategory_id = $request->id;

    $token = session()->get('token');

    $querycategory_data = [
      'name' => $request->name
    ];
    $querycategory_response = $this->manageResourceData($token, "PUT", "querycategory/" . $querycategory_id, $querycategory_data);

    if (isset($querycategory_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Querycategory was not updated successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Querycategory have been updated successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/querycategory/view/' . $querycategory_id);
  }

  public function deleteQueryCategory(Request $request)
  {
    $querycategory_id = $request->id;

    $token = session()->get('token');

    $querycategory_response = $this->manageResourceData($token, "DELETE", "querycategory/" . $querycategory_id, []);

    if (isset($querycategory_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Querycategory was not deleted successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Querycategory was deleted successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/querycategory');
  }
}
