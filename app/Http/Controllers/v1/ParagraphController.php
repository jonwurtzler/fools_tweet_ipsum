<?php namespace app\Http\Controllers\v1;

use App\Http\Controllers\ApiController;
use App\Repositories\RandomizerRepository;
use Illuminate\Http\JsonResponse;

class ParagraphController extends ApiController
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
   * @return JsonResponse
   */
  public function paragraph()
  {
    $paragraph = $this->randomizer->getParagraphs(1);

    return $this->apiResponse($paragraph[0]);
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
    $data   = $this->randomizer->getParagraphs($paragraphCount, $sentenceCount);
    $concat = implode("\n", $data);

    return $this->apiResponse($data, $concat);
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
    $data   = $this->randomizer->getParagraphs($paragraphCount, $sentenceCount, $category);
    $concat = implode("\n", $data);

    return $this->apiResponse($data, $concat);
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
    $data   = $this->randomizer->getParagraphs($paragraphCount, $sentenceCount, null, $feedName);
    $concat = implode("\n", $data);

    return $this->apiResponse($data, $concat);
  }

}
