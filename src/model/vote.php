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
            $req = $data_base->prepare('SELECT
            projet.comference.nom,
            projet.comference.description,
            projet.categorie.nom AS nom1
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
}