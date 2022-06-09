<?php

class Green404 extends Controller {
  
  public function index() {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $data = [
      'title' => 'Klepon - Page Not Found',
      'message' => 'Page not found!',
      'ip_address' => $ip_address
    ];
    return $this->view('Error/404', $data);
  }

}