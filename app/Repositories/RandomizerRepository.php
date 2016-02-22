<?php namespace App\Repositories;

use Faker\Factory;

class RandomizerRepository
{

  /**
   * @var \Faker\Generator
   */
  protected $faker;

  /**
   * @var SourceRepository
   */
  protected $source;

  public function __construct(SourceRepository $source) {
    $this->faker  = Factory::create();
    $this->source = $source;
  }

  /**
   * Get a group of words from given feeds.
   *
   * @param int           $count
   * @param string|null   $category
   * @param string|null   $feedName
   * @param string[]|null $currentSource
   *
   * @return string[]
   */
  public function getWords($count = 3, $category = null, $feedName = null, $currentSource = null)
  {
    if (is_null($currentSource)) {
      $currentSource = $this->getSource($category, $feedName);
    }

    // Get a random entry to break up
    $randomEntry = $this->faker->randomElement($currentSource);

    // Break into individual words.
    $words       = str_word_count($randomEntry, 1);
    $wordCount   = count($words);
    $endingRange = $wordCount - $count;

    // Exact match needed, return whole string.
    if ($endingRange == 0) {
      return $words;
    // If entry didn't have enough words to fulfill the quota, get more from another entry.
    } elseif ($endingRange < 0) {
      $neededCount = $count - $wordCount;
      $extraWords  = $this->getWords($neededCount, null, null, $currentSource);

      return array_merge($words, $extraWords);
    }

    $startingPosition = $this->faker->numberBetween(0, $endingRange - 1);

    return array_slice($words, $startingPosition, $count);
  }

  /**
   * Get a group of sentences from given feeds.
   *
   * @param int           $count
   * @param string|null   $category
   * @param string|null   $feedName
   * @param string[]|null $currentSource
   *
   * @return string[]
   */
  public function getSentences($count = 3, $category = null, $feedName = null, $currentSource = null)
  {

    if (is_null($currentSource)) {
      $currentSource = $this->getSource($category, $feedName);
    }

    $elementCount = count($currentSource);
    $countCheck   = $elementCount - $count;

    // Exact match needed, return whole set.
    if ($countCheck == 0) {
      $sentences = $this->faker->shuffle($currentSource);
      return implode(" ", $sentences);
    // If entry didn't have enough sentences to fulfill the quota, get more from another set.
    } elseif ($countCheck < 0) {
      $neededCount    = $count - $elementCount;
      $extraSentences = $this->getSentences($neededCount, null, null, $currentSource);

      return array_merge($currentSource, $extraSentences);
    }

    return $this->faker->randomElements($currentSource, $count);
  }

  /**
   * @param int           $paragraphCount
   * @param int           $sentenceCount
   * @param string|null   $category
   * @param string|null   $feedName
   * @param string[]|null $currentSource
   *
   * @return string[]
   */
  public function getParagraphs(
    $paragraphCount = 3,
    $sentenceCount = 3,
    $category = null,
    $feedName = null,
    $currentSource = null
  ) {
    if (is_null($currentSource)) {
      $currentSource = $this->getSource($category, $feedName);
    }

    $paragraphs = [];

    for ($i = 0; $i < $paragraphCount; $i++) {
      $paragraphs[] = implode(" ", $this->getSentences($sentenceCount, null, null, $currentSource));
    }

    return $paragraphs;
  }

  /**
   * Get the source for the given situation.
   *
   * @param string $category
   * @param string $feedName
   *
   * @return array|mixed
   * @throws \Exception
   */
  private function getSource($category, $feedName)
  {
    if (!is_null($category)) {
      $feeds = $this->source->getCategoryFeed($category);
      return call_user_func_array('array_merge', $feeds);
    }

    if (!is_null($feedName)) {
      return $this->source->getSingleFeed($feedName);
    }

    $feedList   = $this->source->getFeedList();
    $randomFeed = $this->faker->randomElement($feedList);

    return $this->source->getSingleFeed($randomFeed);
  }

}
