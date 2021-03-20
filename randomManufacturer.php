<?php
  include_once('databaseConnection.php');
  function randomManufacturer(){
    $conn = connectDB();
    # Get the number of manufacturers in the table
    $query = $conn->query("SELECT COUNT(DISTINCT MID) FROM manufacturers");
    if(!$query) echo "Could not run query: " . $conn->error;
    $max = $query->fetch_row();
    # Randomly choose a MID between 1 and the number of manufacturers in the table
    $MID = rand(1, $max[0]);
    $query->close();
    $conn->close();
    # Return the MID if called from HTML
    echo $MID;
    # Return MID if called from PHP
    return $MID;
  }
 ?>
