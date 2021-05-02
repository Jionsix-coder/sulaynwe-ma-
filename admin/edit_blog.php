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
                 if (isset($_GET['blog_id'])){
                 	$blog_id=(int)$_GET['blog_id'];
                 }
                  $sql="SELECT * FROM work WHERE blog_id=$blog_id";
                  $result=mysqli_query($con,$sql);
                  confirm_query($result);
                  while ($row=mysqli_fetch_assoc($result)):
                    $blog_id =escape($row['blog_id']);
                    $work_title = escape($row['title']);
                    $work_text = escape($row['text']);

                  endwhile;
                  if (isset($_POST['edit_work'])) {
                     $work_title =clean_input($_POST['work_title']);
                     $work_text = clean_input($_POST['work_text']);

              	     $sql="UPDATE work SET title='$work_title',text='$work_text',work_image_date_time=now() WHERE work_id=$work_id";
              	     confirm_query(mysqli_query($con,$sql));
              	     echo "<h3><a href=\"all.php?source=view_work\">Go Back To View All Work!</a></h3>";
              	     echo "<h2>Work Updated</h2>";
                  }

            ?>
            <form action="" method="post" enctype="multipart/form-data">
            	<div class="form-group form-whitebox">
            		<label for="work_title" class="control-label">Work Title</label>
            		<input type="text" value="<?php echo $work_title; ?>" id="work_title" class="form-control" name="work_title">
            	</div>
              <div class="form-group form-whitebox">
            		<label for="work_text" class="control-label">Work Text</label>
            		<input type="text" value="<?php echo $work_text; ?>" id="work_text" class="form-control" name="work_text">
            	</div>
                <input type="submit" value="Update Work" name="edit_work" class="btn btn-block btn-primary">
            </form>

            <!-- add image end here -->

          <!-- footer start here -->
<?php include_once "include_admin/admin_footer.php"; ?>
          <!-- footer end here -->
