<?php include_once "include_user/user_header.php"; ?>
    <div class="wrapper">
      <!-- navbar starts here -->
<?php include_once "include_user/user_nav.php"; ?>
      <!-- navbar ends here -->

      <!--- images start here---->
      <br><br><br><br>
      <section class="images-daily">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <?php
                      $start=0;
                      $limit=5;
                      // limit=1,2;
                      // limit=2,2;

                      $t=mysqli_query($con,"select * from memories");
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

                      $sql ="SELECT * FROM memories ORDER BY memories_id DESC LIMIT $start,$limit";
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
                    <div id="carouselExampleIndicators<?php echo $memories_id; ?>" class="carousel slide wow flipInY" data-ride="carousel<?php echo $memories_id; ?>">
                        <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators<?php echo $memories_id; ?>" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators<?php echo $memories_id; ?>" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators<?php echo $memories_id; ?>" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 img-fluid" src="/img/memories/<?php echo $memories_image1; ?>" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 style="color:black;font-weight:bold;z-index:200;"><?php echo date('m/d/Y H:i:s',strtotime($memories_time)); ?></h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 img-fluid" src="/img/memories/<?php echo $memories_image2; ?>" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?php echo date('m/d/Y H:i:s',strtotime($memories_time)); ?></h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 img-fluid " src="/img/memories/<?php echo $memories_image3; ?>" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?php echo date('m/d/Y H:i:s',strtotime($memories_time)); ?></h5>
                            </div>
                        </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $memories_id; ?>" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $memories_id; ?>" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <br>
                    <?php } ?>
                </div>
            </div>
        </div>
      </section>


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
				<?php if($id > 0) {?> <a class="prev" href="memories.php?id=<?php echo ($id-1) ?>"><i class="fas fa-chevron-left"></i></a><?php }?>
				<?php
				for($i=1;$i <= $page;$i++){
				?>
					<!-- <a class="num" href="memories/page/<?php echo $i ?>"><?php echo $i;?></a> -->
					<?php
				}
					?>
				<?php if($id!=$page)
				//3!=4
				{?>
					<a class="next" href="memories.php?id=<?php echo ($id+1); ?>"><i class="fas fa-chevron-right"></i></a>
				<?php }?>
		</div>
  </div>

      <!--- images end here---->
      <div class="whitespace"></div>

      <!-- footer starts here -->
<?php include_once "include_user/user_footer.php"; ?>