<?php

namespace ApiConnector\Services;

/**
 *
 */
class MainServices
{
  protected $host;
  protected $apiVersion;

  public function __construct(){
    if (env('APP_ENV') == 'local') {
      // code...
      $this->host = env('API_URL_DEV');
    }else{
      $this->host = env('API_URL_PRO');
    }
    $this->apiVersion = '1.0';
  }

}
