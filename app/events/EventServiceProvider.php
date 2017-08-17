<?php

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider {

  /**
   * Register
   */
  public function register()
  {
      $this->app->events->subscribe(new UserEventHandler);
    //$this->app->events->subscribe(new UserEventHandler);
  }

}