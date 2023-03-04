<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Create An Account</h2>
        <p>Please fill out this form to register with us</p>
        <form action="<?php echo URLROOT; ?>/users/register" method="post" id="form">
          <div class="form-group">
            <label for="firstName">First Name: <sup>*</sup></label>
            <input type="text" name="firstName" id="firstName" class="form-control form-control-lg">
            <small class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="lastName">Last Name: <sup>*</sup></label>
            <input type="text" name="lastName" id="lastName" class="form-control form-control-lg">
            <small class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" id="email" class="form-control form-control-lg">
            <small class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" id="password" class="form-control form-control-lg">
            <small class="text-danger"></small>
          </div>

          <div class="row">
            <div class="col">
              <input type="button" value="Register" id="submit-btn" class="btn btn-primary mt-2 btn-block">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="<?php echo URLROOT; ?>/js/validate.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>