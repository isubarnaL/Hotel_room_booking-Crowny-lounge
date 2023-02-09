<!-- signin.php -->
<?php include 'template/header.php'; ?>

<body>

  <?php include 'template/nav-bar.php'; ?>
  <!-- END nav -->

  <section class="home-slider owl-carousel" style="height: 400px;">
    <div class="slider-item" style="background-image: url('images/register.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
          <div class="col-md-10 col-sm-12 ftco-animate text-center" style="padding-bottom: 25%;">
            <h1 class="mb-3">Register</h1>
          </div>
        </div>
      </div>
    </div>
  </section>


  <div class="row">
    <div class="col-md-12 dish-menu">

      <div class="nav nav-pills justify-content-center ftco-animate" id="v-pills-tab" role="tablist"
        aria-orientation="vertical">
        <a class="nav-link py-3 px-4 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
          aria-controls="v-pills-home" aria-selected="true"><span class="flaticon-meat"></span> As Customer</a>

      </div>

      <!--register as customer-->
      <div class="tab-content py-5" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="menus d-flex ftco-animate" style="background: white;">
                <div class="row" style="width: 100%">
                  <div class="col-md-12">

                    <!-- register as customer -->
                    <form action="manage-insert.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="text" name="fullname" class="form-control" required="" placeholder="Your Name">
                      </div>
                      <div class="form-group">
                        <input type="email" name="email" class="form-control" required="" placeholder="Your Email">
                      </div>
                      <div class="form-group">
                        <input type="text" name="phone" class="form-control" pattern="[9]{1}[0-9]{9}"
                          title="Phone number starts with 9 and has 10 digit" required="" placeholder="Your Phone">
                      </div>
                      <div class="form-group">
                        <textarea name="address" id="" cols="30" rows="2" class="form-control"
                          placeholder="Address"></textarea>
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" class="form-control"
                          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                          title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                          required="" placeholder="Your Password">
                      </div>
                      <!--  <div class="form-group">
                          <input type="file" name="image" class="form-control" required="" >
                        </div> -->
                      <div class="form-group">
                        <input type="submit" value="Register" name="regascus" class="btn btn-primary py-3 px-5">
                      </div>
                    </form>
                    <p class="text-center">For Login <a href="login.php">Click Here</a> </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- END -->


      </div>
    </div>
  </div>
  </div>
  </section>



  <?php include 'template/footer.php'; ?>

  <?php include 'template/script.php'; ?>

</body>

</html>