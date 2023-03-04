<?php require APPROOT . '/views/inc/header.php'; ?>


  <div class="container mt-5">

  <div class="d-flex justify-content-between">
    <div class="rounded col-md-4 mt-5">
      <form action="<?php echo URLROOT; ?>/pages/reservations" method="post" class="d-flex">
        <input type="text" name="search" class="form-control rounded outline-none" placeholder="Search" aria-label="Search" aria-describedby="search-addon"/>
        <button type="submit" class="btn btn-primary"> <i class="fas fa-search btn"></i></button>
      </form>
    </div>
    <div class="rounded col-md-2 mt-5">
      <form action="<?php echo URLROOT; ?>/pages/reservations" method="post" class="d-flex">
      <select class="form-control rounded outline-none" id="month" name="month">
        <option value="1">Jan</option>
        <option value="2">Feb</option>
        <option value="3">Mar</option>
        <option value="4">Apr</option>
        <option value="5">Mai</option>
        <option value="6">Jun</option>
        <option value="7">Jul</option>
        <option value="8">Aug</option>
        <option value="9">Sep</option>
        <option value="10">Oct</option>
        <option value="11">Nov</option>
        <option value="12">Dec</option>
      </select>
          
        <button type="submit" class="btn btn-primary col-md-">SELECT</button>
      </form>
    </div>
  </div>
<div class="row" id="paginated-list" data-current-page="1" aria-live="polite">

      <?php
          foreach ($data['reservations'] as $key) {
          ?>
      <div class="card mt-5">
        <div class="card-header text-center">
          Featured
        </div>
        <div class="card-body d-flex">
          <img style="width:40%; height:auto; margin-right:10px" src="<?php echo URLROOT?>/uploads/<?= $key->image ?>" class="rounded" alt="">
          <div class="d-flex flex-column justify-content-center align-items-start">
            <h5 class="card-title text-primary"><?= $key->title ?></h5>
            <p class="card-title"><strong>Ship Name:</strong>  <?= $key->shipname ?></p>
            <p class="card-text"><strong>Departure Date:</strong> <?= $key->departuredate ?></p>
            <p class="card-text"><strong>Departure Port:</strong> <?= $key->name?> | <?= $key->country?></p>
            <p class="card-text"><strong>Destination:</strong> <?= $key->destination ?></p>
            <p class="card-text"><strong>Duration:</strong> <?= $key->duration ?></p>
            <p class="card-text"><strong>Minimum Price:</strong> <?= $key->price ?></p>
            <p class="card-text"><strong>Itinerary:</strong><br> <?= $key->itinerary ?></p>
            <a href="<?php echo URLROOT; ?>/pages/plan/<?php echo $key->idcruise; ?>" type="button" class="btn btn-primary">See Plans</a>
          </div>
        </div>
        <div class="card-footer text-muted text-center">
        <?= $key->created_at ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>