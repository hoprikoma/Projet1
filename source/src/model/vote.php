<?php
require_once('config.php');

class vote extends config
{
    function getConferenceVote(){
        session_start();
        try {
            $data_base=$this->connection();
            $req = $data_base->prepare('SELECT
            projet.categorie.nom, 
            projet.comference.nom AS nom1, 
            projet.comference.description,
            projet.comference.id
          FROM
            projet.vote
            INNER JOIN projet.comference ON projet.vote.id_conference = projet.comference.id
            INNER JOIN projet.categorie ON projet.comference.id_categorie = projet.categorie.id
          where
            vote.id_user=:nom');
            $req->bindParam(':nom',$_SESSION['id_user']);
            $req->execute();
            $data=$req->fetchAll();
            return $data;
        } catch (PDOException $e) {
            return "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    function getConferenceTop10(){
        session_start();
        try {
            $data_base=$this->connection();
            $req = $data_base->prepare('SELECT id, nom FROM comference');
            $req->execute();
            $data=$req->fetchAll();
            $x=0;
            foreach($data as $value){
                $req = $data_base->prepare('SELECT COUNT(*) FROM vote WHERE id_conference = :conference');
                $req->bindParam(':conference',$value['id']);
                $req->execute();
                $count=$req->fetch();
                $data[$x]['total']=$count[0];
                $x++;
            }
            return $data;
        } catch (PDOException $e) {
            return "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    function insertVote($id_conference,$vote)
    {
      session_start();
        try {
            $data_base=$this->connection();
                $insert = $data_base->prepare("INSERT INTO `vote` (id_user,id_conference,level) VALUE (:user, :conference, :level)");
                $insert->bindParam(':level',$vote);
                $insert->bindParam(':conference',$id_conference);
                $insert->bindParam(':user',$_SESSION['id_user']);
                $insert->execute();
                return 1;
        } catch (PDOException $e) {
            return "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
