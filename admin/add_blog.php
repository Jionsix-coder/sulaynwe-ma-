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
     if (isset($_POST['create_blog'])) {
        $blog_title = escape($_POST['blog_title']);
        $blog_text = escape($_POST['blog_text']);
        $blog_image= basename($_FILES['blog_image']['name']);
        $blog_image_temp = $_FILES['blog_image']['tmp_name'];

        move_uploaded_file($blog_image_temp,"../img/blog/".$blog_image);
        $sql = "INSERT INTO blog(blog_title, blog_image , blog_text, blog_time)";
        $sql .=" VALUES ('$blog_title','$blog_image','$blog_text',now())";
        $result = mysqli_query($con,$sql);
        confirm_query($result);

        $created ="Blog Created";
     }


?>
          <div class="container-fluid">
             <div class="row">
               <form class="" action="" method="post" enctype="multipart/form-data">
                 <br>
                 <h3 style="text-align: center; color:white;"><?php echo $created; ?></h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                   <div class="form-group">
                     <label for="blog_title" class="control-label title">Blog Title</label>
                     <input id="blog_title" type="text" name="blog_title" placeholder="Blog Title" class="form-control">
                   </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                   <div class="form-group">
                     <label for="blog_image" class="control-label title">Blog Image</label>
                     <input id="blog_image" type="file" name="blog_image" class="form-control">
                   </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                   <div class="form-group">
                     <label for="blog_text" class="control-label title">Blog Text</label>
                     <textarea name="blog_text" rows="8" cols="80" class="form-control" placeholder="Blog Text"></textarea>
                   </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-whitebox">
                  <input type="submit" name="create_blog" value="Submit" class="btn btn-block btn-primary">
                </div>
               </form>
             </div>
          </div>
            <!-- add image end here -->

          <!-- footer start here -->
<?php include_once "include_admin/admin_footer.php"; ?>
          <!-- footer end here -->