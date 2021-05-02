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
                 if (isset($_POST['create_about'])) {
                    $aboutme_title = escape($_POST['aboutme_title']);
                    $aboutme_text=escape($_POST['aboutme_text']);
                    $aboutme_image= basename($_FILES['image']['name']);
                    $aboutme_image_temp = $_FILES['image']['tmp_name'];

                    move_uploaded_file($aboutme_image_temp,"../img/aboutme/".$aboutme_image);
                    $sql="INSERT INTO aboutme(aboutme_image, aboutme_title, aboutme_text, aboutme_date_time)";
                    $sql.="VALUES ('$aboutme_image','$aboutme_title','$aboutme_text',now())";
                    confirm_query(mysqli_query($con,$sql));
                    $created ="AboutMe Created";
                 }


            ?>
                      <div class="container-fluid">
                         <div class="row">
                           <form class="" action="" method="post" enctype="multipart/form-data">
                             <br>
                             <h3 style="text-align: center; color:white;"><?php echo $created; ?></h3>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                               <div class="form-group">
                                 <label for="aboutme_title" class="control-label title">AboutMe Title</label>
                                 <input id="aboutme_title" type="text" name="aboutme_title" placeholder="AboutMe Title" class="form-control">
                               </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                               <div class="form-group">
                                 <label for="aboutme_text" class="control-label title">AboutMe Text</label>
                                 <textarea name="aboutme_text" rows="8" cols="80" class="form-control" placeholder="AboutMe Text"></textarea>
                               </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                               <div class="form-group">
                                 <label for="image" class="control-label title">AboutMe Image</label>
                                 <input id="image" type="file" name="image" class="form-control">
                               </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                              <input type="submit" name="create_about" value="Submit" class="btn btn-block btn-primary">
                            </div>
                           </form>
                         </div>
                      </div>
            <!-- add image end here -->

          <!-- footer start here -->
<?php include_once "include_admin/admin_footer.php"; ?>
          <!-- footer end here -->
