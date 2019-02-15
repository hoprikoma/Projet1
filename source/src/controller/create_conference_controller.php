<?php
require_once '../model/comference.php';

     $comference = new comference();
     $result = $comference->create_conf($_POST['name'],$_POST['description'],$_POST['categorie']);
     echo $result;
