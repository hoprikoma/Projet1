<?php
require_once '../model/comference.php';

     $comference = new comference();
     $result = $comference->get_conf();
     echo json_encode($result);

