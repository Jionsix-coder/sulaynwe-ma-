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
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                      <?php
                         $sql ="SELECT * FROM image ORDER BY image_id DESC";
                         $result=mysqli_query($con,$sql);
                         confirm_query($result);

                         while($row=mysqli_fetch_assoc($result)){
                           $image_id=escape($row['image_id']);
                           $image_title=escape($row['image_title']);
                           $image=basename($row['image']);
                      ?>

                      <tr>
                        <td><?php echo $image_id;  ?></td>
                        <td><?php echo $image_title; ?></td>
                        <td><img style="width:100px;height:100px;" src="../img/<?php echo $image; ?>" alt=""></td>
                        <td> <a href="edit/image/<?php echo $image_id; ?>">Edit</a> </td>
                        <td> <a href="all.php?source=view_image&delete=<?php echo $image_id; ?>">Delete</a> </td>
                      </tr>
                      <?php
                         }
                       ?>
              </table>
            </div>
            <?php
              if (isset($_GET['delete'])) {
                  $image_id=$_GET['delete'];
                  $sql="DELETE FROM image WHERE image_id=$image_id";
                  $result=mysqli_query($con,$sql);
                  confirm_query($con);
                  header('Location: all.php?source=view_image')  ;
                  echo "<script>alert('Image Succcessfully Deleted!!!');</script>";
              }
            ?>
            <!-- show image end here -->

          <!-- footer start here -->
<?php include_once "include_admin/admin_footer.php"; ?>
          <!-- footer end here -->
