<?php
include_once 'header.php';

include_once 'config/Database.php';
// Instantiates new Database object
$database = new Database();
// Sets var $db to successful connection() method
$db = $database->connect();
// Executes if submit button has been clicked
if ($_POST){
  include_once('objects/Vehicles.php');
  // Instantiates new Vehicle object on with the connect() method passed in to connect
  // to the Database
  $vehicle = new Vehicle($db);
  // Sets object properties to the $_POST data
  $vehicle->name = $_POST['name'];
  $vehicle->vehicle = $_POST['vehicle'];
  // Invocation of the Object's create() method to insert posted values to DB
  if($vehicle->create()){
    echo "<div class=\"alert alert-success alert-dismissable\">";
    echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
    echo "Vechicle " . $vehicle->vehicle ." was created.";
    echo "</div>";
  }
  else {
    echo "<div class=\"alert alert-danger alert-dismissable\">";
    echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
    echo "Unable to create vehicle.";
    echo "</div>";
  }
}

 ?>
    <form class="" action="index.php" method="post">
      <table class="table table-responsive">
        <tr>
          <td>Name: </td>
          <td>
            <input type="text" name="name" class="form-input">
          </td>
        </tr>
        <tr>
          <td>Vehicle: </td>
          <td>
            <input type="text" name="vehicle" class="form-input">
          </td>
        </tr>
        <!-- <tr>
          <td>Location: </td>
          <td>
            <input type="text" name="location" class="form-input">
          </td>
        </tr> -->
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
