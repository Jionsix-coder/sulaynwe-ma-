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
                 if (isset($_GET['gallery_id'])){
                 	$gallery_id=(int)$_GET['gallery_id'];
                 }
                  $sql="SELECT * FROM gallery WHERE img_id=$gallery_id";
                  $result=mysqli_query($con,$sql);
                  confirm_query($result);
                  while ($row=mysqli_fetch_assoc($result)):
                    $gallery_id =escape($row['img_id']);
                    $gallery_title = escape($row['img_title']);
                    $gallery_image = basename($row['img']);
                    $gallery_date = escape($row['img_date']);
                    $gallery_time = escape($row['img_time']);

                  endwhile;
                  if (isset($_POST['edit_gallery'])) {
                     $gallery_title =clean_input($_POST['gallery_title']);
            	     $gallery_image = basename($_FILES['gallery_image']['name']);
            	     $gallery_image_temp =$_FILES['gallery_image']['tmp_name'];
            	     if (empty($gallery_image) || $gallery_image=='') {
            	     	$sql="SELECT gallery FROM img WHERE img_id=$gallery_id";
            	     	$select_image=mysqli_query($con,$sql);
            	     	confirm_query($select_image);
            	     	$gallery_image=mysqli_fetch_row($select_image)[0];
            	     }

            	     move_uploaded_file($gallery_image_temp,"../img/".$gallery_image);
            	     $sql="UPDATE gallery SET img_title='$gallery_title',img_date=now(),img='$gallery_image',img_time=now() WHERE img_id=$gallery_id";
            	     confirm_query(mysqli_query($con,$sql));
            	     echo "<h3><a href=\"all.php?source=view_gallery\">Go Back To View All Gallery!</a></h3>";
            	     echo "<h2>Gallery Updated</h2>";
                  }

            ?>
            <form action="" method="post" enctype="multipart/form-data">
            	<div class="form-group form-whitebox">
            		<label for="gallery_title" class="control-label">Gallery Title</label>
            		<input type="text" value="<?php echo $gallery_title; ?>" id="gallery_titile" class="form-control" name="gallery_title">
            	</div>
            	<div class="form-group form-whitebox">
            		<label for="gallery_image" class="control-label">Gallery Image</label>
            		<input type="file" id="gallery_image" name="gallery_image">
            	</div>
            	<div class="form-group form-whitebox">
            		<img style="width: 100px;height: 100px;" src="../img/<?php echo $gallery_image;?>" alt="">
            	</div>
                <input type="submit" value="Update Image" name="edit_gallery" class="btn btn-block btn-primary">
            </form>

            <!-- add image end here -->

          <!-- footer start here -->
<?php include_once "include_admin/admin_footer.php"; ?>
          <!-- footer end here -->
