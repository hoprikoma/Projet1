<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil - Organization</title>
    <?php require("../include/require.php"); ?>
</head>

<body>
    <?php require('../include/navbar.php');?>
    <div class="jumbotron">
        <h1>Conférences</h1>
        <p class="lead">Voici les dernières conférences, n'oubliez pas de vous inscrire/connecter pour voter !</p>
        <hr class="my-4">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link show active" data-toggle="tab" href="#home" id="conf-display">Conférences</a>
            </li>
            <?php
            if (isset($_SESSION['user'])) {
                if ($_SESSION['role']!="admin") {
                echo'
                <li class="nav-item">
                    <a class="nav-link show" data-toggle="tab" id="conf-vote" href="#conf-vote" style="">Conférences votées</a>
                </li>';
                echo'
                <li class="nav-item">
                    <a class="nav-link show" data-toggle="tab" id="conf-non-vote" href="#conf-non-vote" style="">Conférences non votée</a>
                </li>
                ';
                }
                else{
                    echo'
                    <li class="nav-item">
                        <a class="nav-link show" data-toggle="tab" id="top10" href="#top10" style="">Top10</a>
                    </li>
                    ';  
                    echo'
                    <li class="nav-item">
                        <a class="nav-link show" data-toggle="tab" id="conf-gerer" href="#gerer-conf" style="">Gerer les conferences</a>
                    </li>
                    ';   
                    echo'
                    <li class="nav-item">
                        <a class="nav-link show" data-toggle="tab" id="user-gerer" href="#gerer-user" style="">Gerer les user</a>
                    </li>
                    '; 
                }
            }
            ?>
            

        </ul>
        <div id="myTabContent" class="tab-content">
            </div>
            <?php
            if (isset($_SESSION['user'])) {
                if ($_SESSION['role']!="admin") {
                    echo'
                    <div class="tab-pane fade" id="conf-vote">
                    </div>
                ';
                echo'
                    <div class="tab-pane fade" id="conf-non-vote">
                    </div>
                ';    
                }
                else{
                    echo'
                    <div class="tab-pane fade" id="top10">
                    </div>
                    ';    
                    echo'
                    <div class="tab-pane fade" id="conf-gerer">
                    </div>
                    '; 
                    echo'
                    <div class="tab-pane fade" id="user-gerer">
                    </div>
                    ';  
                    
                }
            }
            ?>            
        </div>

    </div>
</body>

</html>