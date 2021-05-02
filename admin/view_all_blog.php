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

            <!-- show image start here -->
            <br><br><br>
                <div class="table-responsive table-main">
                  <table class="table table-bordered">
                      <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Image</th>
                          <th>Text</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                      <?php
                         $sql ="SELECT * FROM blog ORDER BY blog_id DESC";
                         $result=mysqli_query($con,$sql);
                         confirm_query($result);

                         while($row=mysqli_fetch_assoc($result)){
                           $blog_id=escape($row['blog_id']);
                           $blog_title=escape($row['blog_title']);
                           $blog_image= basename($row['blog_image']);
                           $blog_text=escape($row['blog_text']);
                      ?>

                      <tr>
                        <td><?php echo $blog_id;  ?></td>
                        <td><?php echo $blog_title; ?></td>
                        <td><img style="width:100px;height:100px;" src="../img/blog/<?php echo $blog_image; ?>" alt=""></td>
                        <td><?php echo nl2br(substr($blog_text,0,100)); ?></td>
                        <td> <a href="edit.php?blog_id=<?php echo $blog_id; ?>">Edit</a> </td>
                        <td> <a href="all.php?source=view_blog&delete=<?php echo $blog_id; ?>">Delete</a> </td>
                      </tr>
                      <?php
                         }
                       ?>
              </table>
            </div>
            <!-- show image end here -->

          <!-- footer start here -->
<?php include_once "include_admin/admin_footer.php"; ?>
          <!-- footer end here -->


    <?php
      if (isset($_GET['delete'])) {
          $blog_id=$_GET['delete'];
          $sql="DELETE FROM work WHERE blog_id=$blog_id";
          $result=mysqli_query($con,$sql);
          confirm_query($con);
          header('Location: all.php?source=view_blog')  ;
          echo "<script>alert('Blog Succcessfully Deleted!!!');</script>";
      }
    ?>
