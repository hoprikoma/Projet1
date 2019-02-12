<?php
require_once '../model/user.php';

     $user = new user();
     $result = $user->deconnexion();
     echo $result;
