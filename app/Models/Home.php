<?php

class Home {
    
  private $_db;

  public function __construct() {
    $this->_db = Database::getInstance();
  }

}