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

    if ($_ENV['APP_ENV'] == 'local') {
      // code...
      $this->host = $_ENV['API_URL_DEV'];
    }else{
      $this->host = $_ENV['API_URL_PRO'];
    }
    // $this->host = env('API_URL_DEV');
    $this->apiVersion = '1.0';
  }
  public function getRootDir(){
    //ci have five n laravel 4
    return __DIR__.'/../../../../../';
  }
  public function getEnv(){
    $env = new \Dotenv\Dotenv(self::getRootDir());
    $env->load();
  }
}
