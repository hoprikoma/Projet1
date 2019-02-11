<?php
require_once('bdd.php');

class user extends bdd
{
   
    function deconnexion()
    {
        session_destroy();
        header("Location: ../index.php");
    }

    function inscription($username,$password)
    {
        try {
            $data_base=$this->connection();
            $req = $data_base->prepare('SELECT COUNT(*) FROM user WHERE username = :username');
            $req->bindParam(':username',$username);
            $req->execute();
            $data=$req->fetchAll();
            if($data[0]['COUNT(*)']==1){
                echo "<center>";
                echo "ce pseudo est déjà utilisé";
                echo "<br>";
                echo "<a href='inscription.php'>Page précédente</a>";
                echo "</center>";
            }else{
                $insert = $data_base->prepare("INSERT INTO `user` (username,password) VALUE (:username, :password)");
                $insert->bindParam(':username',$username);
                $insert->bindParam(':password',$password);
                $insert->execute();
                header("Location: connection.php");
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function connection($user,$password)
    {
        $data_base=$this->connection();
        $req = $data_base->prepare('SELECT * FROM user WHERE username = :username');
        $req->bindValue(':username',$user, PDO::PARAM_STR);
        $req->execute();
        $data=$req->fetch();
        echo $data['password'];
        if (password_verify($password, $data['password'])) // Acces OK !
        {
            $_SESSION['id_user']=$data['id'];
            $_SESSION['user'] = $data['username'];
            $_SESSION['role'] = $data['role'];
            return 1;
        }
        else // Acces pas OK !
        {   
            return 0;;
        }
    }

}

