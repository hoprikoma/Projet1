<?php
require_once '../model/vote.php';

     $vote = new vote();
     $result = $vote->getConferenceTop10();
     echo json_encode($result);