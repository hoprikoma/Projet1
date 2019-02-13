<?php
require_once '../model/vote.php';
     $vote = new vote();
     $result = $vote->insertVote($_POST['id_conference'],$_POST['vote']);
     echo $result;