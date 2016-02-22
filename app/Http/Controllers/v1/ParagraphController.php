<?php namespace app\Http\Controllers\v1;

use App\Repositories\RandomizerRepository;
use Laravel\Lumen\Routing\Controller as BaseController;

class ParagraphController extends BaseController
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
   * Get a single paragraph from a random set.
   *
   * @return mixed
   */
  public function paragraph()
  {
    $paragraph = $this->randomizer->getParagraphs(1);

    return $paragraph[0];
  }

  /**
   * Get a set of paragraphs built from sentences (tweets).
   *
   * @param int      $paragraphCount
   * @param int|null $sentenceCount
   *
   * @return string[]
   */
  public function paragraphs($paragraphCount = self::DEFAULT_MANY, $sentenceCount = null)
  {
    return $this->randomizer->getParagraphs($paragraphCount, $sentenceCount);
  }

  /**
   * Get paragraphs from a specific series of accounts.
   *
   * @param int    $paragraphCount
   * @param int    $sentenceCount
   * @param string $category
   *
   * @return string[]
   */
  public function categoryParagraphs($paragraphCount, $sentenceCount, $category)
  {
    return $this->randomizer->getParagraphs($paragraphCount, $sentenceCount, $category);
  }

  /**
   * Get paragraphs from a specific feed.
   *
   * @param int    $paragraphCount
   * @param int    $sentenceCount
   * @param string $feedName
   *
   * @return string[]
   */
  public function feedParagraphs($paragraphCount, $sentenceCount, $feedName)
  {
    return $this->randomizer->getParagraphs($paragraphCount, $sentenceCount, null, $feedName);
  }

}
