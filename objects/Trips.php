<?php
class Trip{
  private $conn;
  private $table_name = "Trips";

  public $name;
  public $address;
  public $lat;
  public $lon;
  public $type;
  public $vehicle_id;
  // Creates connection through Database object upon instantiation
  public function __construct($db){
    $this->conn = $db;
  }

  public function create(){
    $query = "INSERT INTO
      " . $this->table_name . "
       SET
        name = :name,
        address = :address,
        lat = :lat,
        lon = :lon,
        type = :type,
        vehicle_id = :vehicle_id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':address', $this->address);
    $stmt->bindParam(':lat', $this->lat);
    $stmt->bindParam(':lon', $this->lon);
    $stmt->bindParam(':type', $this->type);
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
