<?php
require_once '../model/user.php';

     $user = new user();
     $result = $user->connection_user($_POST['email'],$_POST['password']);
     echo $result;
