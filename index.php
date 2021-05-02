<?php include_once "include_user/user_header.php"; ?>
    <div class="wrapper">
      <!-- navbar starts here -->
      <?php include_once "include_user/user_nav.php"; ?>
      <!-- navbar ends here -->
      <div class="modal" id="myModal" tabindex="-1" style="background-color:black;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="color:black;">Can i ask u a question?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p style="color:black;" class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="3s">Do You Love Me?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Yes</button>
              <a href="404.html" type="button" class="btn btn-primary">No</a>
            </div>
          </div>
        </div>
      </div>


      <!-- hero section starts here -->
      <div class="hero">
        <div class="header">
          <h1 class="line anim-typewriter">Su Lay Nwe</h1>
          <h3 class="line anim-typewriter">I Love You</h3>
        </div>
      </div>

      <div class="scroll-down"></div>
      <!-- hero section ends here -->


      <!-- project section starts here -->
      <div class="container">
        <br><br><br>

        <h6>Image Collections</h6>

        <div class="vertical"></div>
        <br>

        <div class="whitespace"></div>
        <div class="whitespace"></div>
        <?php
           $sql = "SELECT * FROM image ORDER BY image_id DESC LIMIT 0,1";
           $result = mysqli_query($con,$sql);
           confirm_query($result);

           while($row=mysqli_fetch_assoc($result)){
             $image_id=escape($row['image_id']);
             $image=basename($row['image']);
             $image_title=escape($row['image_title']);

             ?>
        <div class="row">
          <div class="col-lg-8"></div>

          <div class="col-lg-4 project project1 wow fadeInUp" >
            <img class="img-fluid" src="img/<?php echo "$image"; ?>" alt="">
            <h3 id="image_h3"><?php echo $image_title; ?></h3>
          </div>
        </div>
        <?php
           }
        ?>
        <?php
           $sql = "SELECT * FROM image ORDER BY image_id DESC LIMIT 1,1";
           $result = mysqli_query($con,$sql);
           confirm_query($result);

           while($row=mysqli_fetch_assoc($result)){
             $image_id=escape($row['image_id']);
             $image=basename($row['image']);
             $image_title=escape($row['image_title']);

             ?>
        <div class="whitespace"></div>
        <div class="row">
          <div class="col-lg-6 project project2 wow fadeInUp" >
            <img class="img-fluid" src="img/<?php echo "$image"; ?>" alt="">
            <h3 id="image_h3"><?php echo $image_title; ?></h3>
          </div>
          <div class="col-lg-6"></div>
        </div>

      <?php
         }
      ?>

      <?php
         $sql = "SELECT * FROM image ORDER BY image_id DESC LIMIT 2,1";
         $result = mysqli_query($con,$sql);
         confirm_query($result);

         while($row=mysqli_fetch_assoc($result)){
           $image_id=escape($row['image_id']);
           $image=basename($row['image']);
           $image_title=escape($row['image_title']);

           ?>
      <div class="row">
        <div class="col-lg-8"></div>

        <div class="col-lg-4 project project3 wow fadeInUp" >
          <img class="img-fluid" src="img/<?php echo "$image"; ?>" alt="">
          <h3 id="image_h3"><?php echo $image_title; ?></h3>
        </div>
      </div>
      <?php
         }
      ?>
      <?php
         $sql = "SELECT * FROM image ORDER BY image_id DESC LIMIT 3,1";
         $result = mysqli_query($con,$sql);
         confirm_query($result);

         while($row=mysqli_fetch_assoc($result)){
           $image_id=escape($row['image_id']);
           $image=basename($row['image']);
           $image_title=escape($row['image_title']);

           ?>
      <div class="whitespace"></div>
      <div class="row">
        <div class="col-lg-6 project project4 wow fadeInUp" >
          <img class="img-fluid" src="img/<?php echo "$image"; ?>" alt="">
          <h3 id="image_h3"><?php echo $image_title; ?></h3>
        </div>
        <div class="col-lg-6"></div>
      </div>

    <?php
       }
    ?>

        <div class="whitespace"></div>
        <br><br><br><br>
      </div>

      <!-- project section ends here -->

      <!-- footer section starts here -->
<?php include_once "include_user/user_footer.php"; ?>
<script>
var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
myModal.toggle()
</script>