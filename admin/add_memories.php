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
     if (isset($_POST['create_memories'])) {
        $memories_title = escape($_POST['memories_title']);
        $memories_image1= basename($_FILES['memories_image1']['name']);
        $memories_image1_temp = $_FILES['memories_image1']['tmp_name'];

        $memories_image2= basename($_FILES['memories_image2']['name']);
        $memories_image2_temp = $_FILES['memories_image2']['tmp_name'];

        $memories_image3= basename($_FILES['memories_image3']['name']);
        $memories_image3_temp = $_FILES['memories_image3']['tmp_name'];

        move_uploaded_file($memories_image1_temp,"../img/memories/".$memories_image1);
        move_uploaded_file($memories_image2_temp,"../img/memories/".$memories_image2);
        move_uploaded_file($memories_image3_temp,"../img/memories/".$memories_image3);
        $sql = "INSERT INTO memories(memories_title, memories_image1 , memories_image2 , memories_image3 ,memories_time)";
        $sql .=" VALUES ('$memories_title','$memories_image1','$memories_image2','$memories_image3',now())";
        $result = mysqli_query($con,$sql);
        confirm_query($result);

        $created ="Memories Created";
     }


?>
          <div class="container-fluid">
             <div class="row">
               <form class="" action="" method="post" enctype="multipart/form-data">
                 <br>
                 <h3 style="text-align: center; color:white;"><?php echo $created; ?></h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                   <div class="form-group">
                     <label for="memories_title" class="control-label title">Memories Title</label>
                     <input id="memories_title" type="text" name="memories_title" placeholder="Memories Title" class="form-control">
                   </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                   <div class="form-group">
                     <label for="memories_image1" class="control-label title">Memories Image 1</label>
                     <input id="memories_image1" type="file" name="memories_image1" class="form-control">
                   </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                   <div class="form-group">
                     <label for="memories_image2" class="control-label title">Memories Image 2</label>
                     <input id="memories_image2" type="file" name="memories_image2" class="form-control">
                   </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                   <div class="form-group">
                     <label for="memories_image3" class="control-label title">Memories Image 3</label>
                     <input id="memories_image3" type="file" name="memories_image3" class="form-control">
                   </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                  <input type="submit" name="create_memories" value="Submit" class="btn btn-block btn-primary">
                </div>
               </form>
             </div>
          </div>
            <!-- add image end here -->

          <!-- footer start here -->
<?php include_once "include_admin/admin_footer.php"; ?>
          <!-- footer end here -->