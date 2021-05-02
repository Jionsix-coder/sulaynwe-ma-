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
                          <th>Image 1</th>
                          <th>Image 2</th>
                          <th>Image 3</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                      <?php
                         $sql ="SELECT * FROM memories ORDER BY memories_id DESC";
                         $result=mysqli_query($con,$sql);
                         confirm_query($result);

                         while($row=mysqli_fetch_assoc($result)){
                            $memories_id = $row['memories_id'];
                            $memories_title = escape($row['memories_title']);
                            $memories_time = $row['memories_time'];
                            $memories_image1 = basename($row['memories_image1']);
                            $memories_image2 = basename($row['memories_image2']);
                            $memories_image3 = basename($row['memories_image3']);
                      ?>

                      <tr>
                        <td><?php echo $memories_id;  ?></td>
                        <td><?php echo $memories_title; ?></td>
                        <td><img style="width:100px;height:100px;" src="../img/memories/<?php echo $memories_image1; ?>" alt=""></td>
                        <td><img style="width:100px;height:100px;" src="../img/memories/<?php echo $memories_image2; ?>" alt=""></td>
                        <td><img style="width:100px;height:100px;" src="../img/memories/<?php echo $memories_image3; ?>" alt=""></td>
                        <td> <a href="edit_memories.php?memories_id=<?php echo $memories_id; ?>">Edit</a> </td>
                        <td> <a href="all.php?source=view_memories&delete=<?php echo $memories_id; ?>">Delete</a> </td>
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
          $memories_id=$_GET['delete'];
          $sql="DELETE FROM work WHERE memories_id=$memories_id";
          $result=mysqli_query($con,$sql);
          confirm_query($con);
          header('Location: all.php?source=view_memories')  ;
          echo "<script>alert('Memories Succcessfully Deleted!!!');</script>";
      }
    ?>
