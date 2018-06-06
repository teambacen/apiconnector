<?php

namespace ApiConnector;

use ApiConnector\Services\ConnectorService;

class ApiConnector
{
  protected $token;
  protected $response;
  protected $connector;

  function __construct($id)
  {
    $this->connector = new ConnectorService;
    $this->token = $this->connector->getToken($id);
  }

  public function run($method, $customPoint, $data = null){
    return $this->connector->run($method, $customPoint, $data);
  }
}
