<?php include_once "include_user/user_header.php"; ?>
    <div class="wrapper">
      <!-- navbar starts here -->
<?php include_once "include_user/user_nav.php"; ?>
      <!-- navbar ends here -->

      <div class="whitespace"></div>

      <!-- hero section starts here -->
      <div class="container">
        <div class="hero-content">
          <br><br>

          <div class="row">
            <div class="col-lg-12">
              <h3 class="wow fadeInUp">say hello 👋</h3><br>
            </div>
          </div>
        </div>
      </div>

      <!-- hero section ends here -->


       <div class="whitespace"></div>

      <!-- form section starts here -->
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <form action="admin/recevie_mail.php" id="contact-form" method="post">
              <?php
                 $Msg = "";
                 if (isset($_GET['success'])) {
                   $Msg = "<script>alert(\"Your email has been sent\");</script>";
                   echo $Msg;
                 }else if(isset($_GET['error'])) {
                   $Msg = "<script>alert(\"Your email has not sent\");</script>";
                   echo $Msg;
                 }

              ?>
              <ul>
                <li class="wow fadeInUp" data-wow-delay="1s">
                  <label for="contact-form">Name :</label>
                  <div class="textarea">
                    <input type="text" name="name" id="contact-name" value="" required>
                  </div>
                </li>

                <li class="wow fadeInUp" data-wow-delay="1.2s">
                  <label for="contact-email">Email :</label>
                  <div class="textarea">
                    <input type="email" name="email" id="contact-email" value="" required>
                  </div>
                </li>

                <li class="wow fadeInUp" data-wow-delay="1.4s">
                  <label for="contact-project">Message :</label>
                  <div class="textarea">
                    <textarea type="text" name="msg" id="contact-project" rows="6" value="" required></textarea>
                  </div>
                </li>
              </ul>

              <button type="submit" name="btn-submit" id="contact-submit" class="send wow fadeInUp">Send Message</button>

            </form>
          </div>
        </div>
      </div>


      <!-- form section ends here -->

      <div class="whitespace"></div>

      <!-- footer starts here -->
<?php include_once "include_user/user_footer.php"; ?>
