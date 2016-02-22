<?php namespace app\Http\Controllers\v1;

use App\Http\Controllers\ApiController;
use App\Repositories\RandomizerRepository;
use Illuminate\Http\JsonResponse;

class WordController extends ApiController
{
  const DEFAULT_MANY = 3;

  /**
   * @var RandomizerRepository
   */
  protected $randomizer;

  public function __construct(RandomizerRepository $randomizer) {
    $this->randomizer = $randomizer;
  }

  /**
   * Get a single word from a random set.
   *
   * @return JsonResponse
   */
  public function word()
  {
    $word = $this->randomizer->getWords(1);

    return $this->apiResponse($word[0]);
  }

  /**
   * Get a set of words in a series from a post, or multiples if count is higher.
   *
   * @param int $wordCount
   *
   * @return JsonResponse
   */
  public function words($wordCount = self::DEFAULT_MANY)
  {
    $data   = $this->randomizer->getWords($wordCount);
    $concat = implode(" ", $data);

    return $this->apiResponse($data, $concat);
  }

  /**
   * Get words from a specific series of accounts.
   *
   * @param int    $wordCount
   * @param string $category
   *
   * @return JsonResponse
   */
  public function categoryWords($wordCount, $category)
  {
    $data   = $this->randomizer->getWords($wordCount, $category);
    $concat = implode(" ", $data);

    return $this->apiResponse($data, $concat);
  }

  /**
   * Get words from a specific feed.
   *
   * @param int    $wordCount
   * @param string $feedName
   *
   * @return string[]
   */
  public function feedWords($wordCount, $feedName)
  {
    $data   = $this->randomizer->getWords($wordCount, null, $feedName);
    $concat = implode(" ", $data);

    return $this->apiResponse($data, $concat);
  }

}
