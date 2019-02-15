<?php

echo '
<div id="navbar">
<nav  class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Organization</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Accueil</a>
      </li>';
if (!isset($_SESSION['user'])) {
    echo '<li class="nav-item">
          <a class="nav-link" id="opener_inscription">Inscription</a>
        </li>';
    echo '<li class="nav-item">
          <a class="nav-link" id="opener_connexion">Connexion</a>
        </li>';
      }
      else {
        if ($_SESSION['role']=='admin') {
          echo'<li class="nav-item">
            <a class="nav-link" id="opener_conf">Creer conférence</a>
          </li>';
          echo'<li class="nav-item">
            <a class="nav-link" id="opener_categorie">Creer catégorie</a>
          </li>';
          echo'<li class="nav-item">
            <a class="nav-link" id="delete-all">Supprimer toute les conférences</a>
          </li>';
    }
    echo '<li class="nav-item">
          <a class="nav-link" id="deconnexion">Deconnexion</a>
        </li>';
}
echo '
    </ul>
  </div>
</nav>
';

if (!isset($_SESSION['user'])) {
    echo '
<div id="dialog_inscription" title="Inscription" class="container">
<div id="form_inscription">
<form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="forename"  placeholder="Prénom">
            <input type="text" class="form-control" id="name"  placeholder="Nom">
            <input type="email" class="form-control" id="mail-inscription"  placeholder="Email">
            <input type="password" class="form-control" id="pass-inscription" aria-describedby="passHelp" placeholder="Mot de passe">
            <small id="passHelp" class="form-text text-muted">Vous ne devez jamais partager votre mot de passe avec qui que ce soit.</small>
        </div>
</form>
        <div id="button_inscription">
          <button id="btn-inscription"  class="btn btn-primary">Envoi</button>
        </div>
</div>
<div id="message_form_inscription"></div>

</div>';

    echo '
<div id="dialog_connexion" title="Connexion" class="container">
<div id="form_connexion">
<form action="" method="post">
        <div class="form-group">
            <input type="email" class="form-control" id="mail-connexion" placeholder="Email" required>
            <input type="password" class="form-control" id="pass-connexion" aria-describedby="passHelp" placeholder="Mot de passe" required>
        </div>
</form>
<div id="button_connexion">
<button id="btn-connexion" class="btn btn-primary">Envoi</button>
</div>
</div>
<div id="message_form_connexion"></div>

</div>';

}
else {
  if ($_SESSION['role']=="admin") {
    echo'
<div id="dialog_conf" title="Creation de conférence" class="container">
<div id="form_conf">
<form method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="name_conf"  placeholder="Nom de la conférence">
            <textarea id="description_conf" class="form-control" name="description_conf" rows="5" cols="33" style="width:100%" placeholder="Description de la conférence"></textarea>
            <select class="form-control" id="categorie-conf">
            </select>
        </div>
</form>
<div id="button_conf">
  <button id="btn-conf" class="btn btn-primary">Envoi</button>
</div>
</div>
<div id="message_form_conf"></div>
</div>';
echo'
<div id="dialog_categorie" title="Creation de catégorie" class="container">
<div id="form_categorie">
<form method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="name_categorie"  placeholder="Nom de la categorie">
        </div>
</form>
<div id="button_categorie">
  <button id="btn-categorie" class="btn btn-primary">Envoi</button>
</div>
</div>
<div id="message_form_categorie"></div>
</div>';
    }
}
echo '</div>';
