<?php namespace app\Http\Controllers\v1;

use App\Repositories\RandomizerRepository;
use Laravel\Lumen\Routing\Controller as BaseController;

class WordController extends BaseController
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
   * @return mixed
   */
  public function word()
  {
    $word = $this->randomizer->getWords(1);

    return $word[0];
  }

  /**
   * Get a set of words in a series from a post, or multiples if count is higher.
   *
   * @param int $wordCount
   *
   * @return string[]
   */
  public function words($wordCount = self::DEFAULT_MANY)
  {
    return $this->randomizer->getWords($wordCount);
  }

  /**
   * Get words from a specific series of accounts.
   *
   * @param int    $wordCount
   * @param string $category
   *
   * @return string[]
   */
  public function categoryWords($wordCount, $category)
  {
    return $this->randomizer->getWords($wordCount, $category);
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
    return $this->randomizer->getWords($wordCount, null, $feedName);
  }

}
