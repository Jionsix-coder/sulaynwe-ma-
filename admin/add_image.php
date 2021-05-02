<?php include_once "include_admin/admin_header.php"; ?>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- left slider pro start here -->
<?php include_once "include_admin/admin_left_slider.php"; ?>

       <!-- left slider end here -->

    <!-- Start Welcome area -->
<?php include_once "include_admin/admin_top_bar.php"; ?>
            <!-- Mobile Menu start -->
          <?php include_once "include_admin/admin_mobile_menu.php"; ?>
            <!-- Mobile Menu end -->

            <!-- add image start here -->

<?php
     $created='';
     if (isset($_POST['create_image'])) {
        $image_title = escape($_POST['image_title']);
        $image= basename($_FILES['image']['name']);
        $image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_temp,"../img/".$image);
        $sql="INSERT INTO image (image, image_title, image_date, image_time)";
        $sql .="VALUES ('$image','$image_title',now(),now())";
        confirm_query(mysqli_query($con,$sql));
        $created ="Image Created";
     }


?>
          <div class="container-fluid">
             <div class="row">
               <form class="" action="" method="post" enctype="multipart/form-data">
                 <br>
                 <h3 style="text-align: center; color:white;"><?php echo $created; ?></h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                   <div class="form-group">
                     <label for="image_title" class="control-label title">Image Title</label>
                     <input id="image_title" type="text" name="image_title" placeholder="Image Title" class="form-control">
                   </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                   <div class="form-group">
                     <label for="image" class="control-label title">Image</label>
                     <input id="image" type="file" name="image" class="form-control">
                   </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                  <input type="submit" name="create_image" value="Submit" class="btn btn-block btn-primary">
                </div>
               </form>
             </div>
          </div>
            <!-- add image end here -->

          <!-- footer start here -->
<?php include_once "include_admin/admin_footer.php"; ?>
          <!-- footer end here -->
