<?php
require_once('config.php');

class categorie extends config
{
    function getAllcategorie(){
        try {
            $data_base=$this->connection();
                $select = $data_base->prepare("SELECT * FROM categorie");
                $select->execute();
                $data=$select->fetchAll();
                return $data;
        } catch (PDOException $e) {
            return "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        } 
    }
}
