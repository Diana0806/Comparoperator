<?php require('./utilscss/header.php') ?>
    <link rel="stylesheet" href="./assets/css/listvoyages.css">
<?php require('./utilscss/navbar.php')?>
    <title>ComparOperator</title>




<section class="container">

<div class="title py-3container">
     <div class="py-lg-5 text-center">
        <h1>Choisissez votre destination</h1>
    </div>
    </div>
    </section>
    <div class="bordertop"></div>

<div class="album py-5">

    <div class="destinations container d-flex justify-content-center">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <?php
        require("./classes/Manager.php");
        require("./classes/Destination.php");

        $destinationManager = new Destination();
        $allDestinations = $destinationManager->getAllDestination();

        foreach ($allDestinations as $destination) {
  
      ?>

        <div class="col py-3">
          <a href="destination.php?country=<?php echo $destination->getLocation(); ?>">
          <div class="cardvoyage shadow-sm">
            <img class="bd-placeholder-img card-img-top" src="./assets/images/<?php echo $destination->getLocation(); ?>.avif">
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

<div class="borderbottom"></div>


</body>
</html>