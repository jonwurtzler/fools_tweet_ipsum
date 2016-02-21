<?php namespace App\Services\Contracts;

interface TwitterContract
{

  /**
   * Run a 'GET' to twitter api.
   *
   * @param string   $path
   * @param string[] $parameters
   *
   * @return mixed
   */
  public function twitterGet($path, $parameters);

}
