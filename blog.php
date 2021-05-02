<?php include_once "include_user/user_header.php"; ?>
    <div class="wrapper">
      <!-- navbar starts here -->
<?php include_once "include_user/user_nav.php"; ?>
      <!-- navbar ends here -->

      <div class="whitespace"></div>

      <!-- hero section starts here -->
      <!-- <div class="container">
        <div class="hero-content">
          <br><br>

          <div class="row">
            <div class="col-lfg-8">
             <?php
                 $sql="SELECT * FROM work ORDER BY work_id DESC LIMIT 0,1";
                 $result=mysqli_query($con,$sql);
                 confirm_query($result);

                 while($row=mysqli_fetch_assoc($result)){
                   $db_work_text =escape($row['text']);
                   $str_work_text = str_ireplace(array("\r\n","\r","\n",'\r','\n'),'<br />', $db_work_text);
                   $work_text = str_ireplace(array('<br /><br />'),'<br />', $str_work_text);
                   $work_title =escape($row['title']);
                 }

              ?>
              <h3 class="wow fadeInUp" data-wow-delay="1s"><?php echo $work_title; ?></h3><br>
              <p class="wow fadeInUp" data-wow-delay="1.2s"><?php echo stripslashes($work_text); ?></p>


            </div>
          </div>
        </div>
      </div> -->
    <br><br><br><br>
    <div class="container" id="carousal">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100 " src="/img/1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 " src="/img/2.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 " src="/img/3.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>


      <!-- hero section ends here -->
      
      <!-- blog section start here-->
      <div class="container">
          <div class="hero-content">
          <br>
            <h3 class="wow fadeInUp" id="blog-h3">Blog Section</h3><div id="blog-h3-line"></div><br>
            <div class="row">
              <div class="col-lg-6 col-sm-12 col-md-12">
                <?php
                      $start=0;
                      $limit=3;
                      // limit=1,2;
                      // limit=2,2;

                      $t=mysqli_query($con,"select * from blog");
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

                      $sql ="SELECT * FROM blog ORDER BY blog_id DESC LIMIT $start,$limit";
                      $result=mysqli_query($con,$sql);
                      confirm_query($result);

                      while($row=mysqli_fetch_assoc($result)){
                        $db_blog_text = escape($row['blog_text']);
                        $str_blog_text = str_ireplace(array("\r\n","\r","\n",'\r','\n'),'<br />', $db_blog_text);
                        $blog_text = str_ireplace(array('<br /><br />'),'<br />', $str_blog_text);
                        $blog_title = escape($row['blog_title']);
                        $blog_time = $row['blog_time'];
                        $blog_image = basename($row['blog_image']);
                  ?>
                <div class="card mb-3 wow slideInLeft">
                  <img class="card-img-top" src="/img/blog/<?php echo $blog_image; ?>" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title" style="color:black;"><?php echo $blog_title;  ?></h5>
                    <p class="card-text" style="color:black;"><?php echo $blog_text; ?></p>
                    <p class="card-text"><small class="text-muted"><?php echo date('m/d/Y H:i:s',strtotime($blog_time)); ?></small></p>
                  </div>
                </div>
                <?php } ?>
              </div>
              <div class="col-lg-6 col-sm-12 col-md-12">
                <?php
                      $start=0;
                      $limit=3;
                      // limit=1,2;
                      // limit=2,2;

                      $t=mysqli_query($con,"select * from blog");
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

                      $sql ="SELECT * FROM blog ORDER BY blog_id ASC LIMIT $start,$limit";
                      $result=mysqli_query($con,$sql);
                      confirm_query($result);

                      while($row=mysqli_fetch_assoc($result)){
                        $db_blog_text = escape($row['blog_text']);
                        $str_blog_text = str_ireplace(array("\r\n","\r","\n",'\r','\n'),'<br />', $db_blog_text);
                        $blog_text = str_ireplace(array('<br /><br />'),'<br />', $str_blog_text);
                        $blog_title = escape($row['blog_title']);
                        $blog_time = $row['blog_time'];
                        $blog_image = basename($row['blog_image']);
                  ?>
                <div class="card mb-3 wow slideInLeft">
                  <img class="card-img-top" src="/img/blog/<?php echo $blog_image; ?>" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title" style="color:black;"><?php echo $blog_title;  ?></h5>
                    <p class="card-text" style="color:black;"><?php echo $blog_text; ?></p>
                    <p class="card-text"><small class="text-muted"><?php echo date('m/d/Y H:i:s',strtotime($blog_time)); ?></small></p>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- blog section end here-->

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
				<?php if($id > 0) {?> <a class="prev" href="blog.php?id=<?php echo ($id-1) ?>"><i class="fas fa-chevron-left"></i></a><?php }?>
				<?php
				for($i=1;$i <= $page;$i++){
				?>
					<!-- <a class="num" href="gallery.php?id=<?php echo $i ?>"><?php echo $i;?></a> -->
					<?php
				}
					?>
				<?php if($id!=$page)
				//3!=4
				{?>
					<a class="next" href="blog.php?id=<?php echo ($id+1); ?>"><i class="fas fa-chevron-right"></i></a>
				<?php }?>
		</div>
    <br>


      <!-- footer starts here -->
<?php include_once "include_user/user_footer.php"; ?>