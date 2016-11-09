<?php
class Trip{
  private $conn;
  private $table_name = "Trips";

  public $location;
  public $lat;
  public $lon;
  public $vehicle_id;
  // Creates connection through Database object upon instantiation
  public function __construct($db){
    $this->conn = $db;
  }

  public function create(){
    $query = "INSERT INTO
      " . $this->table_name . "
       SET
        location = :location,
        lat = :lat,
        lon = :lon,
        vehicle_id = :vehicle_id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':location', $this->location);
    $stmt->bindParam(':lat', $this->lat);
    $stmt->bindParam(':lon', $this->lon);
    $stmt->bindParam(':vehicle_id', $this->vehicle_id);

    if($stmt->execute()){
      return true;
    }
    else {
      return false;
    }
  }

  public function read(){
    $query = "SELECT * FROM
    " . $this->table_name . "
    ORDER BY id ASC LIMIT 10";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }
}
?>
