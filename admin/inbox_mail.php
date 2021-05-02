<?php include_once "include_admin/admin_header.php"; ?>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

<?php include_once "include_admin/admin_left_slider.php"; ?>
    <!-- Start Welcome area -->
<?php include_once "include_admin/admin_top_bar.php"; ?>
            <!-- Mobile Menu start -->
<?php include_once "include_admin/admin_mobile_menu.php"; ?>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
                                                <input type="text" placeholder="Search..." class="form-control">
                                                <a href=""><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Inbox</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mailbox-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="hpanel responsive-mg-b-30">
                            <div class="panel-body">
                                <?php
                                     $sql = "SELECT * FROM contact ORDER BY contact_id DESC ";
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
                        <div class="hpanel mg-b-15">
                          <div class="panel-heading hbuilt mailbox-hd">
                                <div class="text-center p-xs font-normal">
                                  <h3>Mailbox</h3>
                                  <hr>
                                </div>
                              </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-mailbox">
                                        <tbody>
                                       <?php
                                             while ($row=mysqli_fetch_assoc($result)) {
                                               $contact_id = escape($row['contact_id']);
                                               $name = escape($row['name']);
                                               $msg = escape($row['message']);
                                               $sub_msg = nl2br(substr($msg,0,20));
                                               $contact_date = escape($row['contact_date']);
                                       ?>
                                            <tr class="unread">
                                                <td class="">
                                                    <div class="checkbox checkbox-single checkbox-success">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="view/mail/<?php echo "$contact_id";  ?>"><?php echo "$name"; ?></a></td>
                                                <td><a href="view/mail/<?php echo "$contact_id"; ?>"><?php echo "<p>$sub_msg ....</p>"; ?></a>
                                                </td>
                                                <td class="text-right mail-date"><?php echo "$contact_date"; ?></td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
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

    <!-- footer start here -->
  <?php include_once "include_admin/admin_footer.php"; ?>
    <!-- footer end here -->

     <?php
        if (isset($_GET['delete'])) {
          $delete_id = $_GET['delete'];
          $sql="DELETE FROM contact WHERE contact_id=$delete_id";
          $result=mysqli_query($con,$sql);
          confirm_query($result);
          redirect("inbox_mail.php");
        }

     ?>
