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
    function create_categorie($name){
        session_start();
        try {
            $data_base=$this->connection();
            $req = $data_base->prepare('SELECT COUNT(*) FROM categorie WHERE nom = :nom');
            $req->bindParam(':nom',$name);
            $req->execute();
            $data=$req->fetchAll();
            if($data[0]['COUNT(*)']==1){
               return 0;
            }else{
                $insert = $data_base->prepare("INSERT INTO `categorie` (nom) VALUE (:nom)");
                $insert->bindParam(':nom',$name);
                $insert->execute();
                return 1;
            }
        } catch (PDOException $e) {
            return "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
