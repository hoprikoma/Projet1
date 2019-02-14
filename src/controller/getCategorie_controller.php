<?php
require_once '../model/categorie.php';

     $categorie = new categorie();
     $result = $categorie->getAllcategorie();
     echo json_encode($result);