<?php

namespace ApiConnector\Services;
use Dotenv\Dotenv;

/**
 *
 */
class MainServices
{
  protected $host;
  protected $apiVersion;

  public function __construct(){
    self::getEnv();

    if (env('APP_ENV') == 'local') {
      // code...
      $this->host = env('API_URL_DEV');
    }else{
      $this->host = env('API_URL_PRO');
    }
    $this->apiVersion = '1.0';
  }
  public function getRootDir(){
    return __DIR__.'/../../../../';
  }
  public function getEnv(){
    $env = new \Dotenv\Dotenv(self::getRootDir());
    $env->load();
  }
}
