<?php
class VehicleList{
  private $conn;
  private $table_name = "Vehicles";

  public $id;
  public $vehicle;

  public function __construct($db){
    $this->conn = $db;
  }

  function read(){
    $query = "SELECT
      id, vehicle
      FROM
      " . $this->table_name . "
      ORDER BY
      id
      ASC";
    $stmt = $this->conn->prepare($query);

    $stmt->execute();
    return $stmt;
  }
}
 ?>
