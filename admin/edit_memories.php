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
                 if (isset($_GET['memories_id'])){
                 	$memories_id=(int)$_GET['memories_id'];
                 }
                  $sql="SELECT * FROM memories WHERE memories_id=$memories_id";
                  $result=mysqli_query($con,$sql);
                  confirm_query($result);
                  while ($row=mysqli_fetch_assoc($result)):
                    $memories_id =escape($row['memories_id']);
                    $memories_title = escape($row['memories_title']);
                    $memories_image1 = basename($row['memories_image1']);
                    $memories_image2 = basename($row['memories_image2']);
                    $memories_image3 = basename($row['memories_image3']);
                    $memories_time = escape($row['memories_time']);

                  endwhile;
                  if (isset($_POST['edit_memories'])) {
                     $memories_title =clean_input($_POST['memories_title']);
                     
            	     $memories_image1 = basename($_FILES['memories_image1']['name']);
            	     $memories_image1_temp =$_FILES['memories_image1']['tmp_name'];

                     $memories_image2 = basename($_FILES['memories_image2']['name']);
            	     $memories_image2_temp =$_FILES['memories_image2']['tmp_name'];

                     $memories_image3 = basename($_FILES['memories_image3']['name']);
            	     $memories_image3_temp =$_FILES['memories_image3']['tmp_name'];

            	     if (empty($memories_image1) || $memories_image1=='') {
            	     	$sql="SELECT memories FROM memories_image1 WHERE memories_id=$memories_id";
            	     	$select_image1=mysqli_query($con,$sql);
            	     	confirm_query($select_image1);
            	     	$memories_image1=mysqli_fetch_row($select_image1)[0];
            	     }
                     if (empty($memories_image2) || $memories_image2=='') {
                        $sql="SELECT memories FROM memories_image2 WHERE memories_id=$memories_id";
                        $select_image2=mysqli_query($con,$sql);
                        confirm_query($select_image2);
                        $memories_image2=mysqli_fetch_row($select_image2)[0];
                    }
                    if (empty($memories_image3) || $memories_image3=='') {
                        $sql="SELECT memories FROM memories_image3 WHERE memories_id=$memories_id";
                        $select_image3=mysqli_query($con,$sql);
                        confirm_query($select_image3);
                        $memories_image3=mysqli_fetch_row($select_image3)[0];
                    }

            	     move_uploaded_file($memories_image1_temp,"../img/memories/".$memories_image1);
                     move_uploaded_file($memories_image2_temp,"../img/memories/".$memories_image2);
                     move_uploaded_file($memories_image3_temp,"../img/memories/".$memories_image3);
            	     $sql="UPDATE memories SET memories_title='$memories_title',memories_image1='$memories_image1',memories_image2='$memories_image2',memories_image3='$memories_image3',memories_time=now() WHERE memories_id=$memories_id";
            	     confirm_query(mysqli_query($con,$sql));
            	     echo "<h3><a href=\"all.php?source=view_memories\">Go Back To View All Memories!</a></h3>";
            	     echo "<h2>Memories Updated</h2>";
                  }

            ?>
            <form action="" method="post" enctype="multipart/form-data">
            	<div class="form-group form-whitebox">
            		<label for="memories_title" class="control-label">Memories Title</label>
            		<input type="text" value="<?php echo $memories_title; ?>" id="memories_title" class="form-control" name="memories_title">
            	</div>
                <div class="form-group form-whitebox">
            		<label for="memories_image1" class="control-label">Memories Image 1</label>
            		<input type="file" id="memories_image1" name="memories_image1">
            	</div>
            	<div class="form-group form-whitebox">
            		<img style="width: 100px;height: 100px;" src="../img/<?php echo $memories_image1;?>" alt="">
            	</div>
                <div class="form-group form-whitebox">
            		<label for="memories_image2" class="control-label">Memories Image 2</label>
            		<input type="file" id="memories_image2" name="memories_image2">
            	</div>
            	<div class="form-group form-whitebox">
            		<img style="width: 100px;height: 100px;" src="../img/<?php echo $memories_image2;?>" alt="">
            	</div>
                <div class="form-group form-whitebox">
            		<label for="memories_image3" class="control-label">Memories Image 3</label>
            		<input type="file" id="memories_image3" name="memories_image3">
            	</div>
            	<div class="form-group form-whitebox">
            		<img style="width: 100px;height: 100px;" src="../img/<?php echo $memories_image3;?>" alt="">
            	</div>
                <input type="submit" value="Update Memories" name="edit_memories" class="btn btn-block btn-primary">
            </form>

            <!-- add image end here -->

          <!-- footer start here -->
<?php include_once "include_admin/admin_footer.php"; ?>
          <!-- footer end here -->
