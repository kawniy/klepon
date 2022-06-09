<?php

class GreenBase extends Controller {

  public function index() {
    $data = [
      'title' => 'Klepon - Green PHP Framework',
      'message' => 'Selamat Datang di Klepon!!'
    ];
    return $this->view('Base', $data);
  }

}