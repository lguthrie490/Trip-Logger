<?php
include_once 'header.php';

include_once 'config/Database.php';
$database = new Database();
$db = $database->connect();

include_once 'objects/Vehicles.php';
$vehicle = new Vehicle($db);

include_once 'objects/Trip.php';
$trip = new Trip($db);

$stmt = $vehicle->read();
$num = $stmt->rowCount();
if($num > 0){
    echo "<table class='table table-responsive'>";
      echo "<tr>";
        echo "<td>ID</td>";
        echo "<td>Name</td>";
        echo "<td>Vehicle</td>";
      echo "</tr>";

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$name}</td>";
        echo "<td>{$vehicle}</td>";
      echo "</tr>";
    }

    echo "</table>";
}
else {
  echo "No records found";
}

$stmt = $trip->read();
$num = $stmt->rowCount();
if($num > 0){
  echo "<table class='table table-responsive'>";
    echo "<tr>";
      echo "<td>ID</td>";
      echo "<td>Location</td>";
      echo "<td>Latitude</td>";
      echo "<td>Longitude</td>";
      echo "<td>Vehicle ID</td>";
    echo "</tr>";

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    echo "<tr>";
      echo "<td>{$id}</td>";
      echo "<td>{$location}</td>";
      echo "<td>{$lat}</td>";
      echo "<td>{$lon}</td>";
      echo "<td>{$vehicle_id}</td>";
    echo "</tr>";
  }
}
else {
  echo "No records found (2)";
}

include_once 'footer.php';
 ?>
