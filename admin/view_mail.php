<?php include_once "include_admin/admin_header.php"; ?>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

<?php include_once "include_admin/admin_left_slider.php"; ?>
    <!-- Start Welcome area -->
<?php include_once "include_admin/admin_top_bar.php"; ?>
<!-- mobile menu start -->
<?php include_once "include_admin/admin_mobile_menu.php"; ?>
<!-- mobile menu end -->
<?php
     if (isset($_GET['contact_id'])) {
       $contact_id = $_GET['contact_id'];
     }else{
       redirect(home);
     }

 ?>
        <div class="mailbox-view-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="hpanel responsive-mg-b-30">
                            <div class="panel-body">
                            <?php
                                 $sql = "SELECT * FROM contact WHERE contact_id=$contact_id";
                                 $result=mysqli_query($con,$sql);
                                 $inbox_count=mysqli_num_rows($result);
                                 confirm_query($result);
                                 ?>
                                <ul class="mailbox-list">
                                    <li class="active">
                                        <a href="#">
                  			  <span class="pull-right"><?php echo $inbox_count; ?></span>
                  			  <i class="fa fa-envelope"></i> Inbox
                  			</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="hpanel email-compose mailbox-view mg-b-15">
                            <div class="panel-heading hbuilt">
                              <?php
                                while ($row=mysqli_fetch_assoc($result)) {
                                   $contact_id=escape($row['contact_id']);
                                   $name=escape($row['name']);
                                   $email=escape($row['email']);
                                   $msg = escape($row['message']);
                                   $contact_date=escape($row['contact_date']);
                                   $contact_time = escape($row['contact_time']);
                                }


                               ?>

                                <div class="p-xs h4">
                                    <small class="pull-right">
										 <?php echo $contact_date; ?><br> At: <?php echo $contact_time; ?>
										</small> Email view

                                </div>
                            </div>
                            <div class="border-top border-left border-right bg-light">
                                <div class="p-m custom-address-mailbox">

                                    <div>
                                        <span class="font-extra-bold">Name: </span> <?php echo $name;  ?>
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">From: </span> <?php echo $email; ?>
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">Date: </span> <?php echo $contact_date; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Hello Min Khant Aung! </h4>

                                    <hp><?php echo $msg; ?></p>

                                    <p><?php echo $name; ?>
                                    </p>
                                </div>
                            </div>


                            <div class="panel-footer text-right">
                                <div class="btn-group">
                                    <a class="btn btn-default" href="mail/delete/<?php echo $contact_id; ?>"><i class="fa fa-trash-o"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once "include_admin/admin_footer.php"; ?>
