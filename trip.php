<?php
include_once 'header.php';
include_once 'config/Database.php';
$database = new Database();
$db = $database->connect();
include_once 'objects/VehicleList.php';
$vehicle_list = new VehicleList($db);

if ($_POST){
  include_once 'objects/Trip.php';

  $trip = new Trip($db);

  $trip->location = $_POST['location'];
  $trip->lat = $_POST['lat'];
  $trip->lon = $_POST['lon'];
  $trip->vehicle_id = $_POST['vehicle_id'];

  if($trip->create()){
    echo "<div class=\"alert alert-success alert-dismissable\">";
    echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
    echo "Trip to " . $trip->location ." created.";
    echo "</div>";
  } else {
    echo "<div class=\"alert alert-danger alert-dismissable\">";
    echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
    echo "Unable to create trip.";
    echo "</div>";
  }
}
?>
<form class="" action="trip.php" method="post">
  <table class="table table-responsive">
    <tr>
      <td>Location:</td>
      <td>
        <input type="text" name="location" value="">
      </td>
    </tr>
    <tr>
      <td>Latitude:</td>
      <td>
        <input type="text" name="lat" value="">
      </td>
    </tr>
    <tr>
      <td>Longitude:</td>
      <td>
        <input type="text" name="lon" value="">
      </td>
    </tr>
    <tr>
      <td>Vehicle:</td>
      <td>
        <select class="" name="vehicle_id">
          <?php
          $stmt = $vehicle_list->read();
          $num = $stmt->rowCount();
          if($num > 0){
            while($row_veh = $stmt->fetch(PDO::FETCH_ASSOC)){
              extract($row_veh);
              echo "<option name='{$id}' value='{$id}'>{$vehicle}</option>";
            }
          }
          else {
            echo "Error, there are no vehicles!";
          }
           ?>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <button type="submit" class="btn btn-primary">Submit</button>
      </td>
    </tr>
  </table>
</form>
<?php

include_once 'footer.php';
 ?>
