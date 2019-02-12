<?php
require_once('config.php');

class comference extends config
{
    function create_conf($name, $description, $categorie){
        session_start();
        try {
            $data_base=$this->connection();
            $req = $data_base->prepare('SELECT COUNT(*) FROM comference WHERE nom = :nom');
            $req->bindParam(':nom',$name);
            $req->execute();
            $data=$req->fetchAll();
            if($data[0]['COUNT(*)']==1){
               return 0;
            }else{
                echo $name." ".$description." ".$categorie." ".$_SESSION['id_user']." ";
                $insert = $data_base->prepare("INSERT INTO `comference` (nom,description,id_categorie,id_auteur) VALUE (:nom, :description, :categorie, :id_auteur)");
                $insert->bindParam(':nom',$name);
                $insert->bindParam(':description',$description);
                $insert->bindParam(':categorie',$categorie);
                $insert->bindParam(':id_auteur',$_SESSION['id_user']);
                $insert->execute();
                return 1;
            }
        } catch (PDOException $e) {
            return "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}