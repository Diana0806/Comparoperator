<?php

require('./utilscss/navbar2.php'); ?>
<link rel="stylesheet" href="./assets/css/tourOperator.css">
<?php require('./classes/Manager.php');
require('./classes/Tour_operator.php'); ?>

<section class="container">

    <div class="toperateur text-center">
        <h1 class="text-light"> Tours Opérateur </h1>
    </div>
</section>
<div class="bordertop"></div>
<?php
$operator = new Tour_operator;
$listsoperators = $operator->getAllOperator();
?>
<section class="container">

    <div class="container text-center">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <?php foreach ($listsoperators as $listoperator) { ?>
                <div class="col-3 mr-5 ml-5 mt-5">
                    <a href="<?php echo $listoperator->getLink(); ?>" class="card-link bg-lien">
                        <div class="card custom-background-color" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <div class="modal-body">
                                    <li class="list-group-item libg"> <?php echo $listoperator->getName(); ?> </li>
                    </a>
                                    <li class="list-group-item libg2">A second item</li>
                                </div>
                            </ul>
                        </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<div class="borderbottom"></div>