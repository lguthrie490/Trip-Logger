<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php $pagename = "OOP"; ?>
    <title><?php echo $pagename; ?></title>
    <script type="text/javascript" src="config/xml.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTksDmo7svHYn-SnzD0dLKsj_VPlIqQQc" type="text/javascript" async defer></script>
    <link rel="stylesheet" href="style.css" media="screen" title="no title">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" media="screen" title="no title">
  </head>
  <body onload="load()">
  <nav class="navbar navbar-default">
    <ul class="nav navbar-nav">
      <li><a href="/read.php">Read</a></li>
      <li><a href="/trip.php">Insert Trip</a></li>
      <li><a href="/index.php">Insert Vehicle</a></li>
    </ul>
  </nav>
