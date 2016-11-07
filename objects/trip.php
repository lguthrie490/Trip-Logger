<?php
class Trip {
  private $conn;
  private $table_name = "Trips";

  public $trip;
  // Creates connection through Database object upon instantiation
  public function __construct($db){
    $this->conn = $db;
  }

  function create(){

    $query = "INSERT INTO " . $this->table_name . " SET trip = :trip";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':trip', $this->trip);

    if($stmt->execute()) {
      return true;
    }
    else {
      return false;
    }
  }
}
?>
