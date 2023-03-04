<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
<?php flash('ship_with_no_rooms'); ?>
    
    <form method="post">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Room Type:</h5>
            <a href="<?php echo URLROOT; ?>/pages/reservations" type="button" class="btn-close"></a>
        </div>
        <div lass="form-group text-start">
            <label><sup</sup></label>
            <select class="form-control form-control-lg" name="reservation">
            <?php
            foreach ($data['getrooms'] as $key) {
            ?>
            <option class="text-center" value="<?= $key->idroom ?>,<?= $key->idcruise ?>">Room Type: <?= $key->type ?> | Capacity: <?= $key->capacity?> | Price: <?= $key->price?> </option>
            <?php } ?>
            </select>
        </div>
        <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-primary">Confirm</button>
        </div>
    </form>
        
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>