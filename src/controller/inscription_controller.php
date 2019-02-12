<?php
require_once '../model/user.php';

     $user = new user();
     $password=$_POST['password'];
     $hashing = password_hash("$password", PASSWORD_DEFAULT);
     $data = array(
        'email' => $_POST['email'],
        'password' => $hashing,
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom']
     );
     print_r($data);
     $result = $user->inscription_user($data);
     echo $result;