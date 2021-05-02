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
                          <th>Text</th>
                          <th>Image</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                      <?php
                         $sql ="SELECT * FROM aboutme ORDER BY aboutme_id DESC";
                         $result=mysqli_query($con,$sql);
                         confirm_query($result);

                         while($row=mysqli_fetch_assoc($result)){
                           $aboutme_id=escape($row['aboutme_id']);
                           $aboutme_title=escape($row['aboutme_title']);
                           $aboutme_text=escape($row['aboutme_text']);
                           $aboutme_image=basename($row['aboutme_image']);
                      ?>

                      <tr>
                        <td><?php echo $aboutme_id;  ?></td>
                        <td><?php echo $aboutme_title; ?></td>
                        <td><?php echo nl2br(substr($aboutme_text,0,20)); ?></td>
                        <td><img style="width:100px;height:100px;" src="../img/aboutme/<?php echo $aboutme_image; ?>" alt=""></td>
                        <td> <a href="edit/aboutme/<?php echo $aboutme_id; ?>">Edit</a> </td>
                        <td> <a href="all.php?source=view_aboutme&delete=<?php echo $aboutme_id; ?>">Delete</a></td>
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
                  $aboutme_id=$_GET['delete'];
                  $sql="DELETE FROM aboutme WHERE aboutme_id=$aboutme_id";
                  $result=mysqli_query($con,$sql);
                  confirm_query($con);
                  header('Location: all.php?source=view_aboutme')  ;
                  echo "<script>alert('AboutMe Succcessfully Deleted!!!');</script>";
              }
            ?>
