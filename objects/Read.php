<?php
class Reader{
  private $conn;
  private $trip_table = "Trips";
  private $vehicle_table = "Vehicles";
  // Connects to DB
  public function __construct($db){
    $this->conn = $db;
  }

  public function read(){
    $query = "SELECT t.location, t.lat, t.lon, v.name, v.vehicle
    FROM Trips t
    INNER JOIN Vehicles v
    ON t.vehicle_id = v.id";
    $stmt = $this->conn->prepare($query);

    $stmt->execute();
    return $stmt;
  }
}
 ?>
