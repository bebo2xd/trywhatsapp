<?php

namespace Bebo2xd\TryWhatsapp\Providers;

use Illuminate\Support\ServiceProvider;

class TryWhatsappServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    // Publish config file
    $this->publishes([
      __DIR__ . '/../config/trywhatsapp.php' => config_path('trywhatsapp.php'),
    ], 'config');
  }

  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    // Merge config file
    $this->mergeConfigFrom(
      __DIR__ . '/../config/trywhatsapp.php',
      'trywhatsapp'
    );

    // Register the main class to use with the facade
    $this->app->singleton('trywhatsapp', function () {
      return new TryWhatsapp();
    });
  }
}
