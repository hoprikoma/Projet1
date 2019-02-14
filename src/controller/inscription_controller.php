<?php
require_once '../model/user.php';

     $user = new user();
     $password=$_POST['password'];
     $hashing = password_hash("$password", PASSWORD_DEFAULT);
     $data = array(
        'email' => htmlentities($_POST['email'], ENT_COMPAT,'ISO-8859-1', true),
        'password' => $hashing,
        'nom' => htmlentities($_POST['nom'], ENT_COMPAT,'ISO-8859-1', true),
        'prenom' => htmlentities($_POST['prenom'], ENT_COMPAT,'ISO-8859-1', true),
        //   'email' => $_POST['email'],
        //   'nom' => $_POST['nom'],
      //   'prenom' => $_POST['prenom']
     );
     $result = $user->inscription_user($data);
     echo $result;