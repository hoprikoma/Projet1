<?php
require_once '../model/vote.php';

     $vote = new vote();
     $result = $vote->getConferenceTop10();
     function compare($a, $b)
     {
          return strcmp($b['total'], $a['total']);
     }
     usort($result, 'compare');
     echo json_encode($result);