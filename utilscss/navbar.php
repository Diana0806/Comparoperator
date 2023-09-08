<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/listTO.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="home">
<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <div class="container">
    <!-- Logo à gauche -->
    <a class="navbar-brand" href="#"><img class ="logo" src="./assets/images/logo.png" alt="Logo"></a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav mx-auto"> <!-- Utilisation de 'mx-auto' pour centrer les éléments -->
        <li class="nav-item active ">
          <a class="nav-link" href="./index.php">Accueil <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link ml-5 mr-5" href="./listvoyage.php">Destinations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./listTO.php">Tours Opérateur</a>
        </li>
      </ul>
      
      <ul class="navbar-nav"> <!-- Élément à droite -->
        <li class="nav-item">
          <a class="nav-link" href="./register.php">Se connecter</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

