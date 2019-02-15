<?php
require_once '../model/vote.php';

     $vote = new vote();
     $result = $vote->getConferenceVote();
     echo json_encode($result);