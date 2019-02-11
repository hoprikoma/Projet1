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
        <a class="nav-link" href="#">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Conférences votées</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Conférences non votées</a>
      </li>';
      if (!isset($_SESSION['user'])) {
          echo'<li class="nav-item">
          <a class="nav-link" href="#">Inscription</a>
        </li>';
        echo'<li class="nav-item">
          <a class="nav-link" href="#">Connexion</a>
        </li>';
      }
      else {
          echo'<li class="nav-item">
          <a class="nav-link" href="#">Profil</a>
        </li>';
      }

    echo'
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
';