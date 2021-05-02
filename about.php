<?php include_once "include_user/user_header.php"; ?>
    <div class="wrapper">
      <!-- navbar starts here -->
<?php include_once "include_user/user_nav.php"; ?>
      <!-- navbar ends here -->


      <!-- hero image starts here -->
      <?php
         $sql ="SELECT * FROM aboutme ORDER BY aboutme_id DESC LIMIT 0,1";
         $result=mysqli_query($con,$sql);
         confirm_query($result);

         while($row=mysqli_fetch_assoc($result)){
           $db_aboutme_text = escape($row['aboutme_text']);
           $str_aboutme_text = str_ireplace(array("\r\n","\r","\n",'\r','\n'),'<br />', $db_aboutme_text);
           $aboutme_text = str_ireplace(array('<br /><br />'),'<br />', $str_aboutme_text);
           $aboutme_title = escape($row['aboutme_title']);
           $aboutme_image = basename($row['aboutme_image']);
         }


      ?>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 about wow flash">
            <img class="img-fluid" style="margin-top:20px;" src="img/aboutme/<?php echo $aboutme_image; ?>" alt="" >
          </div>
        </div>
      </div>

      <!-- hero image ends here -->

      <!-- hero section starts here -->



      <div class="container">
        <div class="hero-content">
          <div class="whitespace">  </div>
          <div class="row">
            <div class="col-lg-12">
              <h3 class="wow fadeInUp about-h3"><?php echo stripslashes($aboutme_title); ?></h3><div id="about-h3"></div><br>
              <p class="wow fadeInUp"><?php echo stripslashes($aboutme_text); ?></p>
            </div>
          </div>
        </div>
      </div>

      <!-- hero section ends here -->

      <div class="whitespace"></div>

      <!-- footer starts here -->
<?php include_once "include_user/user_footer.php"; ?>
