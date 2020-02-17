<?php

class DB {

  function __constructor() {
    $this->db = new PDO(DB_URL, DB_USERNAME, DB_PASSWORD);
  }

  function query($sql, $param) {
    $stmt = $this->db->prepare($sql, $param);
    if(!$stmt) {
      throw new Exception("DB Error: ".$this->db->errorInfo()[0]);
    }
    $run = $stmt->execute($param);
    if(!$run) {
      throw new Exception("DB Error: ".$this->db->errorInfo()[0]);
    }
    $result=$stmt->fetchAll();
    return $result;
    print_r($result);
    if($result=$stmt->fetch()){
      $result = [$result];
      while($row=$stmt->fetch()){
        $result = $row;
      }
      return $result;
    } else {
      print_r($result);
      return false;
    }
  }

  function insertId() {
    return $this->db->lastInsertId();
  }

}

?>
