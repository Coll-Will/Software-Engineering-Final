<?php
    require_once("./dismatrix.php");

   function delayByDistance($SID, $MID, $db){
      # allow the code to run for longer than 120 seconds (default max execution time limit)
      ini_set('max_execution_time', '0');

      if($getRemNodes=$db->prepare("SELECT WID, remaining_nodes FROM shipments WHERE SID = $SID")){
        $getRemNodes->execute();
        $getRemNodes->bind_result($currentNode, $remaining_nodes);
        $getRemNodes->fetch();
        $getRemNodes->close();
      }

      $nextNode = explode(" ", $remaining_nodes);

      # if the shipment is still at the manufacturer
      if($currentNode == $nextNode[0]){
        if($getCurrent=$db->prepare("SELECT latitude, longitude FROM manufacturer WHERE MID = $MID")){
          $getCurrent->execute();
          $getCurrent->bind_result($current[0], $current[1]);
          $getCurrent->fetch();
          $getCurrent->close();
        }
      }
      # if shipment is at a warehouse
      else{
        if($getCurrent=$db->prepare("SELECT latitude, longitude FROM warehouses WHERE WID = $currentNode")){
          $getCurrent->execute();
          $getCurrent->bind_result($current[0], $current[1]);
          $getCurrent->fetch();
          $getCurrent->close();
        }
      }

      if($getNext=$db->prepare("SELECT latitude, longitude FROM warehouses WHERE WID = $nextNode[0]")){
        $getNext->execute();
        $getNext->bind_result($next[0], $next[1]);
        $getNext->fetch();
        $getNext->close();
      }

      $distance = (int) distance($current[0], $current[1], $next[0], $next[1]);
      $delay_in_seconds = (int) ($distance * .1);

      echo date('h:i:s') . "<br>";
      sleep($delay_in_seconds);
      echo date('h:i:s');
    }

    function delayByTime($seconds){
      echo date('h:i:s') . "<br>";
      sleep($seconds);
      echo date('h:i:s');
    }
 ?>
