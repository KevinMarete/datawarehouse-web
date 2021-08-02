<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class BaseController extends Controller
{
  protected $client;

  public function __construct()
  {
    //Setup Curl client
    $this->client = new Client([
      'base_uri' => env('API_URL'),
      'defaults' => [
        'exceptions' => false
      ],
      'timeout'  => 10.0
    ]);
  }

  public function getRoleMenus($token = null, $role_id = null)
  {
    $menus = [];
    if ($token !== null) {
      $request = $this->client->get('role/' . $role_id . '/menus', [
        'headers' => [
          'Authorization' => 'Bearer ' . $token
        ]
      ]);
      $response = $request->getBody();
      $menus = json_decode($response, true);
    }
    return $menus;
  }

  public function manageResourceData($token = null, $rest_method = null, $resource = null, $request_data = [])
  {
    $response = $this->client->request($rest_method, $resource, [
      'headers' => [
        'Authorization' => 'Bearer ' . $token
      ],
      'json' => $request_data
    ]);

    $response = json_decode($response->getBody(), true);

    return $response;
  }

  public function getAlertMessage($alert_type, $message)
  {
    return '<div class="alert alert-' . $alert_type . ' alert-dismissible fade show" role="alert">
              ' . $message . '
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
}
