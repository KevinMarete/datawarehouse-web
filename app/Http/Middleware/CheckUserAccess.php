<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserAccess
{

  public function handle($request, Closure $next)
  {
    $path = $request->segment(1);
    $role = $request->session()->get('role.name');

    $restricted_menus = [
      'admin' => [],
      'user' => ['county', 'subcounty', 'menu', 'menurole', 'menugroup', 'role', 'subcounty', 'user']
    ];

    if (in_array($path, $restricted_menus[$role])) {
      // user not authorized
      $flash_msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Error! User is not authorized to access this menu
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
      $request->session()->flash('pharmacy_msg', $flash_msg);
      return redirect()->back();
    }

    return $next($request);
  }
}
