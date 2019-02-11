<?php

class bdd 
{
    private $bdd;

    function connection(){
        $user='root';
        $pass="root";
        try {
            $data_base = new PDO('mysql:host=localhost;dbname=projet', $user, $pass);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
        }
        $this->bdd=$data_base;
        return $this->bdd
    }
}
