<?php

namespace App\Http\Controllers;

use App\Services\Contracts\TwitterContract;
use Illuminate\Contracts\Cache\Repository;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

  public function testTwitter(TwitterContract $twitter, Repository $cache)
  {
    $drake = $cache->get('drake');
    if (!$drake) {
      $tweetText = [];
      $drakeTwitter = $twitter->twitterGet("statuses/user_timeline", ['screen_name' => 'says_drake']);
      foreach ($drakeTwitter as $tweet) {
        $tweetText[] = $tweet->text;
      }

      $cache->add('drake', $tweetText, 15);
      $drake = $cache->get('drake');
    }

    return $drake;
  }

  public function word($category = null)
  {
    return "Category: " . $category;
  }
}
