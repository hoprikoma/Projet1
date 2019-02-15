<?php
require_once '../model/user.php';

     $user = new user();
     $result = $user->getAll_user();
     echo json_encode($result);