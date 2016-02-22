<?php namespace app\Http\Controllers\v1;

use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class SentenceController extends ApiController
{
  const DEFAULT_MANY = 3;

  /**
   * Get a single sentence from a random set.
   *
   * @return mixed
   */
  public function sentence()
  {
    $sentence = $this->randomizer->getSentences(1);

    return $this->apiResponse($sentence[0]);
  }

  /**
   * Get a set of sentences (tweets).
   *
   * @param int $sentenceCount
   *
   * @return JsonResponse
   */
  public function sentences($sentenceCount = self::DEFAULT_MANY)
  {
    $data   = $this->randomizer->getSentences($sentenceCount);
    $concat = implode("\n", $data);

    return $this->apiResponse($data, $concat);
  }

  /**
   * Get sentences from a specific series of accounts.
   *
   * @param int    $sentenceCount
   * @param string $category
   *
   * @return JsonResponse
   */
  public function categorySentences($sentenceCount, $category)
  {
    $data   = $this->randomizer->getSentences($sentenceCount, $category);
    $concat = implode("\n", $data);

    return $this->apiResponse($data, $concat);
  }

  /**
   * Get sentences from a specific feed.
   *
   * @param int    $sentenceCount
   * @param string $feedName
   *
   * @return JsonResponse
   */
  public function feedSentences($sentenceCount, $feedName)
  {
    $data   = $this->randomizer->getSentences($sentenceCount, null, $feedName);
    $concat = implode("\n", $data);

    return $this->apiResponse($data, $concat);
  }

}
