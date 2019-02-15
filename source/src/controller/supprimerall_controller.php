<?php
require_once '../model/comference.php';

     $comference = new comference();
     $result = $comference->deleteAll_conf();
     echo $result;