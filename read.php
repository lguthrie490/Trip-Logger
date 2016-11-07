<?php
include_once 'header.php';

include_once 'config/Database.php';
$database = new Database();
$db = $database->connect();
//
// echo "<div class='right-button-margin'>";
//     echo "<a href='create_product.php' class='btn btn-default pull-right'>Create Product</a>";
// echo "</div>";
include_once 'objects/Vehicles.php';
$vehicle = new Vehicle($db);

$stmt = $vehicle->read();
$num = $stmt->rowCount();

if($num > 0){
    echo "<table class='table table-responsive>";
      echo "<tr>";
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

include_once 'footer.php';
 ?>
