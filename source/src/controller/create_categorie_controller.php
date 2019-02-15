<?php
require_once '../model/categorie.php';

     $categorie = new categorie();
     $result = $categorie->create_categorie($_POST['name']);
     echo $result;