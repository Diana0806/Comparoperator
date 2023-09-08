<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/css/main.css">
    <title>ComparOperator</title>

    <style>

        .nav-link {
            color: #6D8194;
        }

        .nav-link.active {
            text-decoration: underline;
        }

        .menu .btn {
            color: #6D8194;
        }

        h1 {
            color: #06427B;
        }

        header {
            color: #6D8194;
        }

        .cardvoyage {
            background-color: rgba(156, 183, 208, 0.15);
            color: #06427B;
            width: 280px;
            height: 344px;
        }

        .cardvoyage .card-img-top {
            width: 248px;
            height: 248px;
            margin: 16px;
        }

        .row-cols-1::before {
            content: "";
            display: block;
            width: 30%; 
            height: 4px; 
            background-color: #9CB7D0; 
            position: absolute;
            left: 0;

        }

        .row-cols-1::after {
            content: "";
            display: block;
            width: 30%; 
            height: 4px; 
            background-color: #9CB7D0; 
            position: absolute;
            bottom: 0;
            right: 0;
            margin-bottom: 30px;
        }



    </style>

</head>
<body>
<div class="menu container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
        <img src="./assets/images/logo.png" width="100">
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-5">Accueil</a></li>
        <li><a href="#" class="nav-link px-5 active">Destinations</a></li>
        <li><a href="#" class="nav-link px-5">Tours Opérateur</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <button type="button" class="btn me-2"><img src="./assets/images/Iconsignin.png"> Se connecter</button>
      </div>

      </header>
  </div>


<main>

<div class="title py-3 text-center container-fluid">
     <div class="row py-lg-5">
        <h1 class="display-5 fw-semibold">Choisissez votre destination</h1>
    </div>
    </div>

<div class="album py-5">

    <div class="destinations container d-flex justify-content-center">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <?php
        require("./classes/Manager.php");
        require("./classes/Destination.php");

        $destinationManager = new Destination();
        // var_dump($destinationManager);
        $allDestinations = $destinationManager->getAllDestination();
        // var_dump($allDestinations);

        foreach ($allDestinations as $destination) {
        //     echo "<div>";
        //     echo "<h2> Destination : " . "<a href='listTO.php?destination=" . $destination->getLocation() . "'>" . $destination->getLocation() . "</a>" . "</h2>";
        //     echo "<h4> Prix : " . $destination->getPrice() . " €</h4>";
        //     echo "</div>";
        // }
      ?>

        <div class="col py-3">
          <a href="destination.php?country=<?php echo $destination->getId(); ?>">
          <div class="cardvoyage shadow-sm">
            <img class="bd-placeholder-img card-img-top" src="./assets/images/<?php echo $destination->getId(); ?>.jpg">
            <div class="card-body">
              <h5 class="card-text"><?php echo $destination->getLocation(); ?></h5>
              <p>Prix : <?php echo $destination->getPrice(); ?> €</p>
            </div>
          </div>
          </a>
        </div>

        <?php
          }
        ?>

      </div>
    </div>
  </div>
</main>

</body>
</html>