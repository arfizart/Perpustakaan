<section id="client-holder" data-aos="fade-up">

<?php
  if(!isset($_GET['next'])){
      $next = '';
  }else{
      $next = $_GET['next'];
  }
?>
<form class="form-signin" action="proseslogin.php" method="post">    
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Login</h3>

            <div class="form-outline mb-4">
              <input type="username" name="username" class="form-control form-control-lg" />
              <label class="form-label" for="username">Username</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="password" class="form-control form-control-lg" />
              <label class="form-label" for="password">Password</label>
            </div>

            <div class="form-outline mb-4" style="margin-top: 5px;">
                <select class="orm-control form-control-lg" name="level">
                  <option> -- Pilih Salah Satu --</option>
                  <option value="admin"> Admin</option>
                  <option value="anggota"> Anggota</option>
                </select>
              </div>

            <div class="form-outline mb-2">
              <input type="hidden" name="next" class="form-control form-control-lg" value="<?=$next?>" />
            </div>
            <!-- Checkbox -->
            <!-- <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div> -->

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            <hr class="my-4">


          </div>
        </div>
      </div>
    </div>
  </div>
</form>

</section>