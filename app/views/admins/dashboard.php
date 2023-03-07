<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flash('room_error'); ?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Admin side | Total cruises</h1>
        <p>
          <a href="<?php echo URLROOT; ?>/admins/addCruise" class="btn btn-primary my-2">Add A Cruise</a>
        </p>
      </div>
    </div>
  </section>

  

  <div class="album py-5 bg-light">
    <div class="container">
    <!-- <div class="card mt-5">
      <div class="card-body">
        Ships:
      </div>
    </div>
    <div class="card mt-2 mb-5">
      <div class="card-body">
        Ports:
      </div>
    </div> -->

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
      <?php
    foreach ($data['cruisedetails'] as $key) {
    ?>
        <div class="col">
          <div class="card shadow-sm w-100 p-3">
            <img src="<?php echo URLROOT?>/uploads/<?=$key->image?>" class="bd-placeholder-img card-img-top rounded" style="height:200px">

            <div class="card-body">
                <p class="card-text text-center text-primary"><strong><?= $key->title ?></strong></p>
                <p class="card-text"><strong>Ship Name:</strong> <?= $key->shipname ?></p>
                <p class="card-text"><strong>Departure Date:</strong> <?= $key->departuredate ?></p>
                <p class="card-text"><strong>Departure Port:</strong> <?= $key->name?> | <?= $key->country?></p>
                <p class="card-text"><strong>Destination:</strong> <?= $key->destination ?></p>
                <p class="card-text"><strong>Duration:</strong> <?= $key->duration ?></p>
                <p class="card-text"><strong>Itinerary: </strong> <br><?= $key->itinerary ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <!-- <a type="button" class="btn btn-sm btn-outline-secondary">View</a> -->
                  <a href="<?php echo URLROOT; ?>/admins/deletecruise/<?php echo $key->idcruise; ?>" type="button" class="btn btn-sm btn-outline-secondary">Delete</a>
                </div>
                <small class="text-muted"><?= $key->created_at ?></small>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
<!-- the end of cruise section -->


<!-- the start of ships section -->


<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Total Ships</h1>
        <p>
          <a href="<?php echo URLROOT; ?>/admins/addShip" class="btn btn-primary my-2">Add A Ship</a>
        </p>
      </div>
    </div>
  </section>

  

  <div class="album py-5 bg-light">
    <div class="container">
    <!-- <div class="card mt-5">
      <div class="card-body">
        Ships:
      </div>
    </div>
    <div class="card mt-2 mb-5">
      <div class="card-body">
        Ports:
      </div>
    </div> -->

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
      <?php
    foreach ($data['shipdetails'] as $key) {
    ?>
        <div class="col">
          <div class="card shadow-sm">

            <div class="card-body">
                <p class="card-text"><strong>Ship Name:</strong> <?= $key->shipname ?></p>
                <p class="card-text"><strong>Rooms: </strong><?= $key->rooms ?></p>
                <p class="card-text"><strong>Places: </strong><?= $key->places ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?php echo URLROOT; ?>/admins/deleteship/<?php echo $key->idship; ?>" type="button" class="btn btn-sm btn-outline-secondary">Delete</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
<!-- the end of ships section -->


<!-- the start of ports section -->


<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Total Ports</h1>
        <p>
          <a href="<?php echo URLROOT; ?>/admins/addPort" class="btn btn-primary my-2">Add A Port</a>
        </p>
      </div>
    </div>
  </section>

  

  <div class="album py-5 bg-light">
    <div class="container">
    <!-- <div class="card mt-5">
      <div class="card-body">
        Ships:
      </div>
    </div>
    <div class="card mt-2 mb-5">
      <div class="card-body">
        Ports:
      </div>
    </div> -->

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
      <?php
    foreach ($data['portdetails'] as $key) {
    ?>
        <div class="col">
          <div class="card shadow-sm">

            <div class="card-body">
                <p class="card-text"><strong>Port Name: </strong><?= $key->name ?></p>
                <p class="card-text"><strong>Country: </strong><?= $key->country ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?php echo URLROOT; ?>/admins/deleteport/<?php echo $key->idport; ?>" type="button" class="btn btn-sm btn-outline-secondary">Delete</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
