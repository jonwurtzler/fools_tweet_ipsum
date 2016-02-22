<?php namespace app\Http\Controllers;

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

  public function paragraph($category = null, $feedName = null)
  {
    $paragraph = $this->randomizer->getParagraphs(1, $category, $feedName);

    return $paragraph[0];
  }

  public function paragraphs($paragraphCount = self::DEFAULT_MANY, $sentenceCount = null)
  {
    return $this->randomizer->getParagraphs($paragraphCount, $sentenceCount);
  }

  public function categoryParagraphs($paragraphCount, $sentenceCount, $category)
  {
    return $this->randomizer->getParagraphs($paragraphCount, $sentenceCount, $category);
  }

  public function feedParagraphs($paragraphCount, $sentenceCount, $feedName)
  {
    return $this->randomizer->getParagraphs($paragraphCount, $sentenceCount, null, $feedName);
  }

}
