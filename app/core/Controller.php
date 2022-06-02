<?php

class Controller {
    
  /**
   * view
   *
   * @param  mixed $file
   * @param  mixed $data
   * @return void
   */
  public function view($file, $data = []) {
    require_once '../app/Views/' . $file . '.php';
  }
    
  /**
   * model
   *
   * @param  mixed $file
   * @return void
   */
  public function model($file) {
    require_once '../app/Models/' . $file . '.php';
    return new $file();
  }
}