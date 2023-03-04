<?php require APPROOT . '/views/inc/header.php'; ?>


    <main>
        <section class="intro text-center">
            <h1>Contact Form</h1>
            <p>Leave your message below and we will be back to you as soon as possible.</p>
        </section>


        <form>
            <div class="row d-flex flex-column justify-content-center align-items-center">
                <div class="row col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <input type="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-2">
                        <textarea class="form-control" rows="6" placeholder="Leave your message here"></textarea>
                    </div>

                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-md ml-auto btn-primary mt-2">SUBMIT</button>
            </div>
        </form>


    </main>


<?php require APPROOT . '/views/inc/footer.php'; ?>