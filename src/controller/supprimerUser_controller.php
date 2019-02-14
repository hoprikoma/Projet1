<?php
require_once '../model/user.php';

     $user = new user();
     $result = $user->delete_user($_POST['id_user']);
     echo $result;