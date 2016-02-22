<?php namespace App\Http\Controllers;

use App\Repositories\RandomizerRepository;
use App\Repositories\SourceRepository;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

class ApiController extends BaseController
{

  /**
   * @var RandomizerRepository
   */
  protected $randomizer;

  /**
   * @var SourceRepository
   */
  protected $source;

  public function __construct(RandomizerRepository $randomizer, SourceRepository $source) {
    $this->randomizer = $randomizer;
    $this->source     = $source;
  }

  /**
   * Get a list of available categories.
   *
   * @return JsonResponse
   */
  public function categories()
  {
    $categories = $this->source->getCategories();

    return $this->apiResponse($categories);
  }

  /**
   * Get a list of available individual feeds.
   *
   * @return JsonResponse
   */
  public function feeds()
  {
    $feeds = $this->source->getFeedList();

    return $this->apiResponse($feeds);
  }

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
