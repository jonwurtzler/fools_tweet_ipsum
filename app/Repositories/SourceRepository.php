<?php namespace app\Repositories;

use App\Services\Contracts\TwitterContract;
use Exception;
use Illuminate\Contracts\Cache\Repository;

class SourceRepository
{

  protected $categories = [
    'political' => ['sarahpalinusa', 'realdonaldtrump'],
    'musicians' => ['says_drake', 'stuffdrakedoes', 'kanyewest', 'bobatl'],
    'actors'    => ['officialjaden', 'snookie']
  ];

  protected $feeds = [
    'says_drake'      => "Stuff Drake Says",
    'stuffdrakedoes'  => "Stuff Drake Does",
    'kanyewest'       => "Kanye West",
    'bobatl'          => "B.o.B",
    'angeltilalove'   => "Tila Tequila",
    'sarahpalinusa'   => "Sarah Palin",
    'realdonaldtrump' => "Donald J. Trump",
    'officialjaden'   => "Jaden Smith",
    'snookie'         => "Nicole Polizzi",
    'thetweetofgod'   => "God",
    'big_ben_clock'   => "Big Ben"
  ];

  public function __construct(Repository $cache, TwitterContract $twitter) {
    $this->cache   = $cache;
    $this->twitter = $twitter;
  }

  /**
   * Return all the feeds used by the system.
   *
   * @return array
   */
  public function getFeedList()
  {
    return $this->feeds;
  }

  /**
   * Return all the categories used by the system.
   *
   * @return array
   */
  public function getCategories()
  {
    return array_keys($this->categories);
  }

  /**
   * Get a feed from a specific twitter account.
   *
   * @param string $feed
   *
   * @return array|mixed
   */
  public function getSingleFeed($feedName)
  {
    return $this->getFeed($feedName);
  }

  /**
   * Get a feed from a specific category.
   *
   * @param string $category
   *
   * @return array|mixed
   * @throws Exception
   */
  public function getCategoryFeed($category)
  {
    if (!array_key_exists($category, $this->categories)) {
      throw new Exception("Invalid Category");
    }

    $categoryFeedName = $category . "Feed";
    $categoryFeed     = $this->cache->get($categoryFeedName);
    if (!$categoryFeed) {
      $categoryFeed = [];
      foreach ($this->categories[$category] as $feedName) {
        $categoryFeed[] = $this->getFeed($feedName);
      }

      $this->cache->add($categoryFeedName, $categoryFeed, 15);
    }

    return $categoryFeed;
  }

  /**
   * Get a specific feed from Twitter.
   *
   * @param string $feedName
   *
   * @return array|mixed
   */
  private function getFeed($feedName)
  {
    $feed = $this->cache->get($feedName);
    if (!$feed) {
      $feed = [];
      $twitterFeed = $this->twitter->twitterGet("statuses/user_timeline", ['screen_name' => $feedName, 'count' => 40]);
      foreach ($twitterFeed as $tweet) {
        $feed[] = $tweet->text;
      }

      $this->cache->add($feedName, $feed, 15);
    }

    return $feed;
  }

}
