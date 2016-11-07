<?php
class Database {
  // Set Database creds
  private $host = "localhost";
  private $dbname = "TripLogger";
  private $username = "logan";
  private $password = "Sogol789";

  public $conn;
  // Method used to connect to the database via PDO
  public function connect() {
    // Make sure property $conn is null before adding connection
    $this->conn = null;
    // Connects to DB
    try {
      $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";", $this->username, $this->password);
    // Prints out PDOException if query fails
    } catch (PDOException $e) {
      echo "Error : " . $e;
    }
    // Returns connection via the $conn property
    return $this->conn;
  }

}

?>
