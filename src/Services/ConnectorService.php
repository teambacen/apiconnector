<?php

namespace ApiConnector\Services;

use ApiConnector\Services\MainServices;
use Josantonius\Cookie\Cookie;

class ConnectorService extends MainServices
{
  protected $response;

  // public function __construct($id){
  //   $this->getToken($id); ;
  // }
  public function index(){
    return $this->getToken(310);
      // echo $this->host;
  }

  public function getToken($id){
    $data = array('secret' => urlencode(base64_encode($id)));
    // $this->token = $this->run('post', 'auth/token', $data);
    $request = $this->run('post', 'auth/token', $data);
    // setcookie('jwt', $request, time() + (86400 * 30), "/");
    Cookie::set('jwt', $request);
    // return (string)$request;
    // echo $request;
    return $request;
  }
  public function run($method, $point, $data = null){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->host.'/'.$this->apiVersion.'/'.$point);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if ($method == 'post') {
      # code...

      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    if (isset($_COOKIE["jwt"])) {
      // code...
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer '.Cookie::get('jwt');
      ));
    }
    $output = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    $json = json_decode($output, true);
    if ($err) {
      return $err;
    }else{
      if ($point == 'auth/token') {
        # code...
        return $output;
      }else{
        return $json;
      }
    }
  }
}
