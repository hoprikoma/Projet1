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
                <a class="nav-link show active" data-toggle="tab" href="#home" style="">Conférences</a>
            </li>
            <?php
            if (isset($_SESSION['user'])) {
                if (!$_SESSION['role']=="admin") {
                echo'
                <li class="nav-item">
                    <a class="nav-link show" data-toggle="tab" href="#conf-vote" style="">Conférences votées</a>
                </li>';
                echo'
                <li class="nav-item">
                    <a class="nav-link show" data-toggle="tab" href="#conf-non-vote" style="">Conférences non votée</a>
                </li>
                ';
                }
                else{
                    echo'
                    <li class="nav-item">
                        <a class="nav-link show" data-toggle="tab" href="#top10" style="">Top10</a>
                    </li>
                    ';    
                }
            }
            ?>
            

        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active show" id="home">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Column 1</th>
                            <th>Column 2</th>
                            <th>Column 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Row 1 Data 1</td>
                            <td>Row 1 Data 2</td>
                            <td>test</td>
                        </tr>
                        <tr>
                            <td>Row 2 Data 1</td>
                            <td>Row 2 Data 2</td>
                            <td>test3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php
            if (isset($_SESSION['user'])) {
                if (!$_SESSION['role']=="admin") {
                    echo'
                    <div class="tab-pane fade" id="conf-vote">
                        <p>2</p>
                    </div>
                ';
                echo'
                    <div class="tab-pane fade" id="conf-non-vote">
                        <p>3</p>
                    </div>
                ';    
                }
                else{
                    echo'
                    <div class="tab-pane fade" id="top10">
                        <p>4</p>
                    </div>
                    ';    
                }
            }
            ?>            
        </div>

    </div>
</body>

</html>