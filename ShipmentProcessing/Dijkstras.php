<?php
    # VARS and such
    $PATH = "";
    $NO_PARENT = -1;

    function dijkstra($adjacencyMatrix, $startVertex, $endVertex){
        //adjust numbers to match 0 start array vs. 1 start shipment ids
        $startVertex = $startVertex - 1;
        $endVertex = $endVertex - 1;
        $nVertices = count($adjacencyMatrix[0]);
        global $PATH;
        $PATH = "";
        global $NO_PARENT;

        // shortestDistances[i] will hold the shortest distance from src to i
        $shortestDistances = new SplFixedArray($nVertices);
        // added[i] will true if vertex i is included / in shortest path tree
        // or shortest distance from src to i is finalized
        $added = new SplFixedArray($nVertices);
        // Initialize all distances as INFINITE and added[] as false
        for($vertexIndex = 0; $vertexIndex < $nVertices; $vertexIndex++){
          $shortestDistances[$vertexIndex] = PHP_INT_MAX;
          $added[$vertexIndex] = -1;
        }
        // Distance of source vertext from itself is always 0
        $shortestDistances[$startVertex] = 0;
        // Parent array to store shortest path tree
        $parents = new SplFixedArray($nVertices);
        // The starting vertex does not have a parent
        $parents[$startVertex] = $NO_PARENT;
        // Find shortest path for vertices
        for($i = 0; $i < $nVertices; $i++){
          // Pick the minimum distance vertex from the set of vertices not yet
          // processed. nearestVertex is always equal to startNode in first iteration
          $nearestVertex = -1;
          $shortestDistance = PHP_INT_MAX;
          for($vertexIndex = 0; $vertexIndex < $nVertices; $vertexIndex++){
            if($added[$vertexIndex] == -1 && $shortestDistances[$vertexIndex] < $shortestDistance){
              $nearestVertex = $vertexIndex;
              $shortestDistance = $shortestDistances[$vertexIndex];
            }
          }
          // Mark the picked vertex as processes
          $added[$nearestVertex] = 0;
          for($vertexIndex = 0; $vertexIndex < $nVertices; $vertexIndex++){
            $edgeDistance = $adjacencyMatrix[$nearestVertex][$vertexIndex];
            if($edgeDistance > 0 && (($shortestDistance + $edgeDistance) < $shortestDistances[$vertexIndex])){
              $parents[$vertexIndex] = $nearestVertex;
              $shortestDistances[$vertexIndex] = $shortestDistance + $edgeDistance;
            }
          }
        }

        setPath($endVertex, $parents);
        return $PATH;
    }

    function setPath($currentVertex, $parents){
      global $PATH;
      global $NO_PARENT;
      if($currentVertex == $NO_PARENT) return;
      setPath($parents[$currentVertex], $parents);
      $nextVertex = $currentVertex + 1;
      $PATH = $PATH . $nextVertex . " ";
    }
 ?>
