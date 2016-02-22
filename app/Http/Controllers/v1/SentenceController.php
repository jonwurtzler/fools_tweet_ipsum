<?php namespace app\Http\Controllers\v1;

use App\Repositories\RandomizerRepository;
use Laravel\Lumen\Routing\Controller as BaseController;

class SentenceController extends BaseController
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
   * Get a single sentence from a random set.
   *
   * @return mixed
   */
  public function sentence()
  {
    $sentence = $this->randomizer->getSentences(1);

    return $sentence[0];
  }

  /**
   * Get a set of sentences (tweets).
   *
   * @param int $sentenceCount
   *
   * @return string[]
   */
  public function sentences($sentenceCount = self::DEFAULT_MANY)
  {
    return $this->randomizer->getSentences($sentenceCount);
  }

  /**
   * Get sentences from a specific series of accounts.
   *
   * @param int    $sentenceCount
   * @param string $category
   *
   * @return string[]
   */
  public function categorySentences($sentenceCount, $category)
  {
    return $this->randomizer->getSentences($sentenceCount, $category);
  }

  /**
   * Get sentences from a specific feed.
   *
   * @param int    $sentenceCount
   * @param string $feedName
   *
   * @return string[]
   */
  public function feedSentences($sentenceCount, $feedName)
  {
    return $this->randomizer->getSentences($sentenceCount, null, $feedName);
  }

}
