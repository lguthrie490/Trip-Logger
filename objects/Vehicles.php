<?php
class Vehicle {
  // Private property that gets the Database connect() passed in via constructor method
  private $conn;
  private $table_name = 'Vehicles';
  // Properties that are set after instantiation
  public $name;
  public $vehicle;
  // Connects to DB
  public function __construct($db){
    $this->conn = $db;
  }
  // Function to insert posted data to sql table
  public function create(){
    $query = "INSERT INTO " . $this->table_name . " SET name = :name, vehicle = :vehicle";
    // Uses PDO prepare() method to get PDOStatement object
    $stmt = $this->conn->prepare($query);
    // Sets object properties to PDO parameters
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':vehicle', $this->vehicle);
    // Executes PDO query, returns boolean
    if($stmt->execute()){
      return true;
    }
    else {
      return false;
    }
  }

  // Method to return data from the Vehicle table
  function read(){
    $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC LIMIT 10";
    // Gets PDOStatement object
    $stmt = $this->conn->prepare($query);

    $stmt->execute();
    
    return $stmt;
    // if($stmt->execute()){
    //   return $stmt;
    // }
    // else {
    //   echo "There was an error retrieving stuff from the DB.";
    // }
  }

}

 ?>
