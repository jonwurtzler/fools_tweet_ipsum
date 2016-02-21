<?php namespace app\Providers;

use App\Services\Contracts\TwitterContract;
use App\Services\Twitter;
use Illuminate\Support\ServiceProvider;

class TwitterServiceProvider extends ServiceProvider
{

  /**
   * Bootstrap the application services.
   *
   * @return void
   */
  public function boot() { }

  /**
   * Register the application services.
   *
   * @return void
   */
  public function register() {
    $this->app->bind(TwitterContract::class, Twitter::class);
  }

}