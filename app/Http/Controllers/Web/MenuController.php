<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MenuController extends BaseController
{
  public function displayMenuTableView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'table_data' => $this->manageResourceData($token, 'GET', 'menu', [])
    ];
    $data = [
      'page_title' => 'Menu',
      'main_menu' => 'settings',
      'sub_menu' => 'menu',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('menu.listing', $view_data),
    ];

    return view('template.main', $data);
  }

  public function displayNewMenuView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'menugroups' => $this->manageResourceData($token, 'GET', 'menugroup', [])
    ];

    $data = [
      'page_title' => 'Add Menu',
      'main_menu' => 'settings',
      'sub_menu' => 'menu',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('menu.new', $view_data)
    ];

    return view('template.main', $data);
  }

  public function saveMenu(Request $request)
  {
    $token = session()->get('token');

    $menu_data = [
      'name' => $request->name,
      'link' => $request->link,
      'menu_group_id' => $request->menu_group_id
    ];
    $menu_response = $this->manageResourceData($token, "POST", "menu", $menu_data);

    if (isset($menu_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Menu was not added successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Menu was created successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/menu');
  }

  public function displayMenuView(Request $request)
  {
    $menu_id = $request->id;

    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'edit' => $this->manageResourceData($token, 'GET', 'menu/' . $menu_id, []),
      'menugroups' => $this->manageResourceData($token, 'GET', 'menugroup', [])
    ];

    $data = [
      'page_title' => 'View Menu',
      'main_menu' => 'settings',
      'sub_menu' => 'menu',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('menu.view', $view_data)
    ];

    return view('template.main', $data);
  }

  public function updateMenu(Request $request)
  {
    $menu_id = $request->id;

    $token = session()->get('token');

    $menu_data = [
      'name' => $request->name,
      'link' => $request->link,
      'menu_group_id' => $request->menu_group_id
    ];
    $menu_response = $this->manageResourceData($token, "PUT", "menu/" . $menu_id, $menu_data);

    if (isset($menu_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Menu was not updated successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Menu have been updated successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/menu/view/' . $menu_id);
  }

  public function deleteMenu(Request $request)
  {
    $menu_id = $request->id;

    $token = session()->get('token');

    $menu_response = $this->manageResourceData($token, "DELETE", "menu/" . $menu_id, []);

    if (isset($menu_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Menu was not deleted successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Menu was deleted successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/menu');
  }
}
