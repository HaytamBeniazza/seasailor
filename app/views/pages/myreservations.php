<?php require APPROOT . '/views/inc/header.php'; ?>

  <div class="container mt-5">
  <?php flash('date_error') ?>
  <!-- <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <input class="navbar-brand" type="text">
  </div>
</nav>


  <form action="">
  <div class="container-fluid">
    <input class="navbar-brand" type="search" placeholder="Search">
  </div>
    <input type="search" class="">  
  </form> -->



      <?php
          foreach ($data['myreservations'] as $key) {
          ?>
      <div class="card mt-5">
        <div class="card-header text-center">
          Featured
        </div>
        <div class="card-body d-flex">
          <div class="d-flex flex-column justify-content-center align-items-start">
            <h5 class="card-title text-primary"><?= $key->title ?></h5>
            <p class="card-title"><strong>Ship Name:</strong>  <?= $key->shipname ?></p>
            <p class="card-text"><strong>Departure Date:</strong> <?= $key->departuredate ?></p>
            <p class="card-text"><strong>Departure Port:</strong> <?= $key->name?> | <?= $key->country?></p>
            <p class="card-text"><strong>Destination:</strong> <?= $key->destination ?></p>
            <p class="card-text"><strong>Duration:</strong> <?= $key->duration ?></p>
            <p class="card-text"><strong>Itinerary:</strong><br> <?= $key->itinerary ?></p>
            <a href="<?php echo URLROOT; ?>/pages/cancel/<?php echo $key->reservationid; ?>" type="button" class="btn btn-primary">Cancel</a>
          </div>
        </div>





        <div class="card-footer text-muted text-center">
        <?= $key->created_at ?>
        </div>
      </div>
      <?php } ?>

      
  </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>