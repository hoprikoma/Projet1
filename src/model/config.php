<?php

class config
{

    function connection(){
        $user='root';
        $pass="root";
        try {
            $data_base = new PDO('mysql:host=localhost;dbname=projet', $user, $pass);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
        }
        return $data_base;
        
    }
    function mail($name){
        $to = "organization@example.com";
        $subject = "New conference";
        $txt = "La conference ".$name." à ete créer";
        $headers = "organization@example.com" . "\r\n" .
        "BCC: somebodyelse@example.com";

        mail($to,$subject,$txt,$headers);
    }
}
