<?php

class Database {

  public static $_instance = null;
  private $mysqli;

  private $db_host = '';
  private $db_user = '';
  private $db_pass = '';
  private $db_name = '';

  public function __construct() {
    $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name) or die('Could not connect to database server.');
  }
  
  
  /**
   * getInstance
   *
   * @return void
   */
  public static function getInstance() {
      if(!self::$_instance) {
          self::$_instance = new Database();
      }
      return self::$_instance;
  }
  
  /**
   * dbQuery
   *
   * @param  mixed $table
   * @param  mixed $where
   * @param  mixed $order
   * @param  mixed $limit
   * @return void
   */
  public function dbQuery($table, $where = null, $order = null, $limit = null) {
    $data = [];
    $sql = "SELECT * FROM $table";
    $result = $this->mysqli->query($sql);

    while($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }
}