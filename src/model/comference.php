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

    function get_conf(){
        try {
            $data_base=$this->connection();
                $select = $data_base->prepare("SELECT projet.categorie.nom, projet.comference.nom AS nom1, projet.comference.description, projet.comference.id FROM projet.categorie INNER JOIN projet.comference ON projet.comference.id_categorie = projet.categorie.id");
                $select->execute();
                $data=$select->fetchAll();
                return $data;
        } catch (PDOException $e) {
            return "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function delete_conf($id_conference){
        try {
            $data_base=$this->connection();
            $delete=$data_base->prepare('DELETE FROM comference WHERE id = :id_conference');
            $delete->bindParam(':id_conference',$id_conference);
            $delete->execute();
            return 1;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}