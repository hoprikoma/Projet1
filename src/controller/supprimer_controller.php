<?php
require_once '../model/comference.php';

     $comference = new comference();
     $result = $comference->delete_conf($_POST['id_conference']);
     echo $result;