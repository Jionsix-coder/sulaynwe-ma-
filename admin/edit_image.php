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
                 if (isset($_GET['image_id'])){
                 	$image_id=(int)$_GET['image_id'];
                 }
                  $sql="SELECT * FROM image WHERE image_id=$image_id";
                  $result=mysqli_query($con,$sql);
                  confirm_query($result);
                  while ($row=mysqli_fetch_assoc($result)):
                    $image_id =escape($row['image_id']);
                    $image_title = escape($row['image_title']);
                    $image = basename($row['image']);
                    $image_date = escape($row['image_date']);
                    $image_time = escape($row['image_time']);

                  endwhile;
                  if (isset($_POST['edit_image'])) {
                     $image_title =clean_input($_POST['image_title']);
            	     $image = basename($_FILES['image']['name']);
            	     $image_temp =$_FILES['image']['tmp_name'];
            	     if (empty($image) || $image=='') {
            	     	$sql="SELECT image FROM image WHERE image_id=$image_id";
            	     	$select_image=mysqli_query($con,$sql);
            	     	confirm_query($select_image);
            	     	$image=mysqli_fetch_row($select_image)[0];
            	     }

            	     move_uploaded_file($image_temp,"../img/".$image);
            	     $sql="UPDATE image SET image_title='$image_title',image_date=now(),image='$image',image_time=now() WHERE image_id=$image_id";
            	     confirm_query(mysqli_query($con,$sql));
            	     echo "<h3><a href=\"all.php?source=view_image\">Go Back To View All Images!</a></h3>";
            	     echo "<h2>Image Updated</h2>";
                  }

            ?>
            <form action="" method="post" enctype="multipart/form-data">
            	<div class="form-group form-whitebox">
            		<label for="image_title" class="control-label">Image Title</label>
            		<input type="text" value="<?php echo $image_title; ?>" id="image_titile" class="form-control" name="image_title">
            	</div>
            	<div class="form-group form-whitebox">
            		<label for="image" class="control-label">Image</label>
            		<input type="file" id="image" name="image">
            	</div>
            	<div class="form-group form-whitebox">
            		<img style="width: 100px;height: 100px;" src="../img/<?php echo $image;?>" alt="">
            	</div>
                <input type="submit" value="Update Image" name="edit_image" class="btn btn-block btn-primary">
            </form>

            <!-- add image end here -->

          <!-- footer start here -->
<?php include_once "include_admin/admin_footer.php"; ?>
          <!-- footer end here -->
