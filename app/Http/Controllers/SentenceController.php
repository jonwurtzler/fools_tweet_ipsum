<?php namespace app\Http\Controllers;

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

  public function sentence($category = null, $feedName = null)
  {
    $sentence = $this->randomizer->getSentences(1, $category, $feedName);

    return $sentence[0];
  }

  public function sentences($sentenceCount = self::DEFAULT_MANY)
  {
    return $this->randomizer->getSentences($sentenceCount);
  }

  public function categorySentences($sentenceCount, $category)
  {
    return $this->randomizer->getSentences($sentenceCount, $category);
  }

  public function feedSentences($sentenceCount, $feedName)
  {
    return $this->randomizer->getSentences($sentenceCount, null, $feedName);
  }

}
