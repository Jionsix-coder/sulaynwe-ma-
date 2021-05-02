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
     if (isset($_POST['create_gallery'])) {
        $gallery_image_title = escape($_POST['gallery_image_title']);
        $gallery_image= basename($_FILES['gallery_image']['name']);
        $gallery_image_temp = $_FILES['gallery_image']['tmp_name'];

        move_uploaded_file($gallery_image_temp,"../img/".$gallery_image);
        $sql = "INSERT INTO gallery(img, img_title, img_date, img_time)";
        $sql .=" VALUES ('$gallery_image','$gallery_image_title',now(),now())";
        $result = mysqli_query($con,$sql);
        confirm_query($result);

        $created ="Gallery Created";
     }


?>
          <div class="container-fluid">
             <div class="row">
               <form class="" action="" method="post" enctype="multipart/form-data">
                 <br>
                 <h3 style="text-align: center; color:white;"><?php echo $created; ?></h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                   <div class="form-group">
                     <label for="gallery_image_title" class="control-label title">Image Title</label>
                     <input id="gallery_image_title" type="text" name="gallery_image_title" placeholder="Image Title" class="form-control">
                   </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                   <div class="form-group">
                     <label for="gallery_image" class="control-label title">Gallery Image</label>
                     <input id="gallery_image" type="file" name="gallery_image" class="form-control">
                   </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                  <input type="submit" name="create_gallery" value="Submit" class="btn btn-block btn-primary">
                </div>
               </form>
             </div>
          </div>
            <!-- add image end here -->

          <!-- footer start here -->
<?php include_once "include_admin/admin_footer.php"; ?>
          <!-- footer end here -->
