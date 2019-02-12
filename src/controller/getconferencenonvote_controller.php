<?php
require_once '../model/vote.php';

     $user = new user();
     $result = $user->deconnexion();
     echo $result;