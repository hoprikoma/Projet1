<?php
require_once '../model/user.php';

if(isset( $_POST['password'] )) {
     $user = new user();
     $result = $->getName();
     echo $result;
}
