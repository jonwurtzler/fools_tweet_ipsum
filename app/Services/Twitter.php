<?php namespace App\Services;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Services\Contracts\TwitterContract;

class Twitter implements TwitterContract
{

  /**
   * Run a 'GET' to twitter api.
   *
   * @param string   $path
   * @param string[] $parameters
   *
   * @return mixed
   */
  public function twitterGet($path, $parameters) {
    $connection = $this->getConnection();

    return $connection->get($path, $parameters);
  }

  /**
   * Get a new connection with vars passed from env.
   *
   * @return TwitterOAuth
   */
  private function getConnection()
  {
    return new TwitterOAuth(
      env("TWITTER_CONSUMER_KEY"),
      env("TWITTER_CONSUMER_SECRET"),
      env("TWITTER_ACCESS_TOKEN"),
      env("TWITTER_ACCESS_TOKEN_SECRET")
    );
  }

}
