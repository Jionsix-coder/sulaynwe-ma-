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
                 if (isset($_GET['aboutme_id'])){
                 	$aboutme_id=(int)$_GET['aboutme_id'];
                 }
                  $sql="SELECT * FROM aboutme WHERE aboutme_id=$aboutme_id";
                  $result=mysqli_query($con,$sql);
                  confirm_query($result);
                  while ($row=mysqli_fetch_assoc($result)):
                    $aboutme_id =escape($row['aboutme_id']);
                    $aboutme_title = escape($row['aboutme_title']);
                    $aboutme_text = escape($row['aboutme_text']);
                    $aboutme_image = basename($row['aboutme_image']);
                    $aboutme_date_time = escape($row['aboutme_date_time']);

                  endwhile;
                  if (isset($_POST['edit_aboutme'])) {
                     $aboutme_title =clean_input($_POST['aboutme_title']);
                     $aboutme_text =clean_input($_POST['aboutme_text']);
              	     $aboutme_image = basename($_FILES['aboutme_image']['name']);
              	     $aboutme_image_temp =$_FILES['aboutme_image']['tmp_name'];
              	     if (empty($aboutme_image) || $aboutme_image=='') {
              	     	$sql="SELECT aboutme FROM aboutme_image WHERE aboutme_id=$aboutme_id";
              	     	$select_image=mysqli_query($con,$sql);
              	     	confirm_query($select_image);
              	     	$aboutme_image=mysqli_fetch_row($select_image)[0];
              	     }

            	     move_uploaded_file($aboutme_image_temp,"../img/aboutme/".$aboutme_image);
            	     $sql="UPDATE aboutme SET aboutme_title='$aboutme_title',aboutme_date_time=now(),aboutme_image='$aboutme_image',aboutme_text='$aboutme_text' WHERE aboutme_id=$aboutme_id";
            	     confirm_query(mysqli_query($con,$sql));
            	     echo "<h3><a href=\"all.php?source=view_aboutme\">Go Back To View All AboutMe!</a></h3>";
            	     echo "<h2>AboutMe Updated</h2>";
                  }

            ?>
            <form action="" method="post" enctype="multipart/form-data">
            	<div class="form-group form-whitebox">
            		<label for="aboutme_title" class="control-label">AboutMe Title</label>
            		<input type="text" value="<?php echo $aboutme_title; ?>" id="aboutme_titile" class="form-control" name="aboutme_title">
            	</div>
              <div class="form-group form-whitebox">
            		<label for="aboutme_text" class="control-label">AboutMe Text</label>
            		<input type="text" value="<?php echo $aboutme_text; ?>" id="aboutme_text" class="form-control" name="aboutme_text">
            	</div>
            	<div class="form-group form-whitebox">
            		<label for="aboutme_image" class="control-label">AboutMe Image</label>
            		<input type="file" id="aboutme_image" name="aboutme_image">
            	</div>
            	<div class="form-group form-whitebox">
            		<img style="width: 100px;height: 100px;" src="../img/aboutme/<?php echo $aboutme_image;?>" alt="">
            	</div>
                <input type="submit" value="Update AboutMe" name="edit_aboutme" class="btn btn-block btn-primary">
            </form>

            <!-- add image end here -->

          <!-- footer start here -->
<?php include_once "include_admin/admin_footer.php"; ?>
          <!-- footer end here -->
