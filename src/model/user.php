<?php
require_once('config.php');

class user extends config
{
   
    function deconnexion()
    {
        session_start();
        session_destroy();
    }

    function inscription_user($data_post)
    {
        try {
            $role=1;
            $data_base=$this->connection();
            $req = $data_base->prepare('SELECT COUNT(*) FROM user WHERE email = :email');
            $req->bindParam(':email',$data_post['email']);
            $req->execute();
            $data=$req->fetchAll();
            if($data[0]['COUNT(*)']==1){
               return 0;
            }else{
                $insert = $data_base->prepare("INSERT INTO `user` (nom,prenom,password,email,id_role) VALUE (:nom, :prenom, :password, :email, :role)");
                $insert->bindParam(':email',$data_post['email']);
                $insert->bindParam(':password',$data_post['password']);
                $insert->bindParam(':nom',$data_post['nom']);
                $insert->bindParam(':prenom',$data_post['prenom']);
                $insert->bindParam(':role',$role);
                $insert->execute();
                print_r($data_post);
                return 1;
            }
        } catch (PDOException $e) {
            return "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function connection_user($user,$password)
    {
        $data_base=$this->connection();
        $req = $data_base->prepare('SELECT user.email, user.prenom, user.id, user.password, role.nom FROM user INNER JOIN role ON user.id_role = role.id WHERE user.email = :username');
        $req->bindValue(':username',$user, PDO::PARAM_STR);
        $req->execute();
        $data=$req->fetch();
        echo $data['password'];
        if (password_verify($password, $data['password'])) // Acces OK !
        {
            session_start();
            $_SESSION['id_user']=$data['id'];
            $_SESSION['user'] = $data['email'];
            $_SESSION['role'] = $data['nom'];
            return 1;
        }
        else // Acces pas OK !
        {   
            return 0;
        }
    }

    function getAll_user()
    {
        try {
            $data_base=$this->connection();
            $req = $data_base->prepare('SELECT nom, prenom, email, id FROM user WHERE id_role = :role');
            $req->bindValue(':role',1);
            $req->execute();
            $data=$req->fetchAll();
            return $data;
        } catch (PDOException $e) {
            return "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function delete_user($id_user)
    {
        try {
            $data_base=$this->connection();
            $delete=$data_base->prepare('DELETE FROM user WHERE id = :id_user');
            $delete->bindParam(':id_user',$id_user);
            $delete->execute();
            return 1;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }


}

