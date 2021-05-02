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
                          <td>Edit</td>
                          <td>Delete</td>
                      </tr>
                      <?php
                         $sql ="SELECT * FROM gallery ORDER BY img_id DESC";
                         $result=mysqli_query($con,$sql);
                         confirm_query($result);

                         while($row=mysqli_fetch_assoc($result)){
                           $gallery_id=escape($row['img_id']);
                           $gallery_image_title=escape($row['img_title']);
                           $gallery_image=basename($row['img']);
                      ?>

                      <tr>
                        <td><?php echo $gallery_id;  ?></td>
                        <td><?php echo $gallery_image_title; ?></td>
                        <td><img style="width:100px;height:100px;" src="../img/<?php echo $gallery_image; ?>" alt=""></td>
                        <td> <a href="edit/gallery/<?php echo $gallery_id; ?>">Edit</a> </td>
                        <td> <a href="all.php?source=view_gallery&delete=<?php echo $gallery_id; ?>">Delete</a> </td>
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
                  $gallery_id=$_GET['delete'];
                  $sql="DELETE FROM gallery WHERE img_id=$gallery_id";
                  $result=mysqli_query($con,$sql);
                  confirm_query($con);
                  header('Location: all.php?source=view_gallery')  ;
                  echo "<script>alert('Gallery Succcessfully Deleted!!!');</script>";
              }
            ?>
