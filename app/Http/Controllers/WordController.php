<?php namespace app\Http\Controllers;

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

  public function word($category = null, $feedName = null)
  {
    $word = $this->randomizer->getWords(1, $category, $feedName);

    return $word[0];
  }

  public function words($wordCount = self::DEFAULT_MANY)
  {
    return $this->randomizer->getWords($wordCount);
  }

  public function categoryWords($wordCount, $category)
  {
    return $this->randomizer->getWords($wordCount, $category);
  }

  public function feedWords($wordCount, $feedName)
  {
    return $this->randomizer->getWords($wordCount, null, $feedName);
  }

}
