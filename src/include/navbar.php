<?php
session_start();
echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Organization</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="conferences-votee.php">Conférences votées</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="conferences-non-votee.php">Conférences non votées</a>
      </li>';
      if (!isset($_SESSION['user'])) {
          echo'<li class="nav-item">
          <a class="nav-link" id="opener_inscription">Inscription</a>
        </li>';
        echo'<li class="nav-item">
          <a class="nav-link" id="opener_connexion">Connexion</a>
        </li>';
      }
      else {
          echo'<li class="nav-item">
          <a class="nav-link" href="profil.php">Profil</a>
        </li>';
      }
    echo'
    </ul>
  </div>
</nav>
';

echo'
<div id="dialog_inscription" title="Inscription" class="container">
<form action="" method="post">
    <fieldset>
        <div class="form-group">
            
            <input type="text" class="form-control" id="forename" placeholder="Prénom">
            <input type="text" class="form-control" id="name" placeholder="Nom">
            <input type="email" class="form-control" id="mail-inscription" placeholder="Email">
            <input type="password" class="form-control" id="pass-inscription" aria-describedby="passHelp" placeholder="Mot de passe">
            <small id="passHelp" class="form-text text-muted">Vous ne devez jamais partager votre mot de passe avec qui que ce soit.</small>
        </div>
    </fieldset>
        <button type="submit" class="btn btn-primary">Envoi</button>
    </fieldset>
</form>
</div>';

echo'
<div id="dialog_connexion" title="Connexion" class="container">
<form action="" method="post">
        <div class="form-group">
            <input type="email" class="form-control" id="mail-connexion" placeholder="Email" required>
            <input type="password" class="form-control" id="pass-connexion" aria-describedby="passHelp" placeholder="Mot de passe" required>
        </div>
</form>
  <button id="btn-connexion" class="btn btn-primary">Envoi</button>
</div>';
