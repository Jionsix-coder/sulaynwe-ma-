<?php include_once "include_user/user_header.php"; ?>
    <div class="wrapper">
      <!-- navbar starts here -->
<?php include_once "include_user/user_nav.php"; ?>
      <!-- navbar ends here -->

      <div class="whitespace"></div>

      <!---   PROJECT SECTION START HERE--->
      <div class="container-fluid">
      <div class="gallery-main">
      <div class="gallery wow bounceInUp">
        <?php
           $start=0;
					 $limit=10;
					 // limit=1,2;
					 // limit=2,2;

					 $t=mysqli_query($con,"select * from gallery");
					 $total=mysqli_num_rows($t);

					 if(isset($_GET['id']))
					 {
						 $id=$_GET['id'];
						 $start=($id-1)*$limit;
						 //$start=2*1;
						 //$start=2;
					 }
				   else
					 {
						 $id=1;
					 }
					 $page=ceil($total/$limit);

           $sql = "SELECT * FROM gallery ORDER BY img_id DESC LIMIT $start,$limit";
           $result=mysqli_query($con,$sql);
           confirm_query($result);

           while ($row=mysqli_fetch_assoc($result)) {
             $gallery_id=escape($row['img_id']);
             $gallery_image=escape($row['img']);
             $gallery_title=escape($row['img_title']);
         ?>
        <a href="img/<?php echo $gallery_image; ?>" data-lightbox="mygallery" >
          <img src="img/<?php echo $gallery_image; ?>" alt="">
        <?php } ?>
        </a>
      </div>
    </div>
    <style media="screen">

    .pagination{
      position: absolute;
      width: 100%;
      left: 50%;
      text-align: center;
    }

    .pagination a{
      margin: 6px 1px;
      display: inline-block;
      width: 60px;
      background: #2c3e50;
      height: 60px;
      line-height: 60px;
      color: #fff;
      font-weight: 600;
      transition: 0.3s;
      position: relative;
      padding-right: 26px;
    }
    .prev,.next{
      padding-right: 12px !important;
      font-size: 20px;
    }
    .pagination a:hover{
      color: #e74c3c;
    }

    .active{
      color: #e74c3c !important;
    }

    .prev{
      border-radius: 30px 0 0 30px;
    }

    .next{
      border-radius: 0 30px 30px 0;
    }

    .pagination a::before,.pagination a:after{
      content: "";
      position: absolute;
      border-top: 30px solid transparent;
      border-bottom: 30px solid transparent;
    }
    .num::before,.next::before{
      border-right: 20px solid #2c3e50;
      right: 100%;
    }

    .num:after,.prev:after{
      border-right: 20px solid #f1f1f1;
      right: 0;
    }
    @media (max-width:468px) {
      .pagination{
        position: absolute;
        width: 300px;
        left: 18%;
        text-align: center;
      }
      .pagination a{
        margin: 6px 1px;
        display: inline-block;
        width: 125px;
        background: #2c3e50;
        height: 40px;
        line-height: 40px;
        color: #fff;
        font-weight: 600;
        transition: 0.3s;
        position: relative;
        padding-right: 26px;
      }
      .pagination a::before,.pagination a:after{
        content: "";
        position: absolute;
        border-top: 20px solid transparent;
        border-bottom: 20px solid transparent;
      }
    }
    @media (min-width:768px) {
      .pagination{
        position: absolute;
        width: 50%;
        left: 40%;
        text-align: center;
      }
      .pagination a{
        margin: 6px 1px;
        display: inline-block;
        width: 125px;
        background: #2c3e50;
        height: 50px;
        line-height: 50px;
        color: #fff;
        font-weight: 600;
        transition: 0.3s;
        position: relative;
        padding-right: 26px;
      }
      .pagination a::before,.pagination a:after{
        content: "";
        position: absolute;
        border-top: 25px solid transparent;
        border-bottom: 25px solid transparent;
      }
    }


    </style>
    <div class="pagination">
				<?php if($id > 0) {?> <a class="prev" href="gallery.php?id=<?php echo ($id-1) ?>"><i class="fas fa-chevron-left"></i></a><?php }?>
				<?php
				for($i=1;$i <= $page;$i++){
				?>
					<!-- <a class="num" href="gallery/page/<?php echo $i ?>"><?php echo $i;?></a> -->
					<?php
				}
					?>
				<?php if($id!=$page)
				//3!=4
				{?>
					<a class="next" href="gallery.php?id=<?php echo ($id+1); ?>"><i class="fas fa-chevron-right"></i></a>
				<?php }?>
		</div>
  </div>
      <!-- project section end here-->
      <br><br>

      <div class="whitespace"></div>
      <!-- footer section starts here -->
<?php include_once "include_user/user_footer.php"; ?>