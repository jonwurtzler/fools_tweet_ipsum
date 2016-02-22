<?php namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

class ApiController extends BaseController
{

  /**
   * Setup responses in correct json format.
   *
   * @param array|string $data
   * @param string       $concatenated
   * @param int          $status
   *
   * @return JsonResponse
   */
  protected function apiResponse($data, $concatenated = null, $status = 200)
  {
    $data = ['data' => $data];

    if (!is_null($concatenated)) {
      $data['concatenated'] = $concatenated;
    }

    return new JsonResponse($data, $status);
  }

}
