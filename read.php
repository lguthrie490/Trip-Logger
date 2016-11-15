<?php
include_once 'header.php';

include_once 'config/Database.php';
$database = new Database();
$db = $database->connect();

include_once 'objects/Read.php';
$reader = new Reader($db);

$stmt = $reader->read();
$num = $stmt->rowCount();
if($num > 0){
    echo "<table class='table table-responsive'>";
      echo "<tr>";
        echo "<td>Name</td>";
        echo "<td>Address</td>";
        echo "<td>Latitude</td>";
        echo "<td>Longitude</td>";
        echo "<td>Type</td>";
        echo "<td>Vehicle</td>";
      echo "</tr>";

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      echo "<tr>";
        echo "<td>{$name}</td>";
        echo "<td>{$address}</td>";
        echo "<td>{$lat}</td>";
        echo "<td>{$lon}</td>";
        echo "<td>{$type}</td>";
        echo "<td>{$vehicle}</td>";
      echo "</tr>";
    }
    echo "</table>";
}
else {
  echo "No records found";
}

?>
  <div id="map"></div>
<?php
include_once 'footer.php';
 ?>
