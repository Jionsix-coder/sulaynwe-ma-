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
            <div id="page-wrapper">

             <div class="container-fluid">

                 <!-- Page Heading -->
                 <div class="row">
                     <div class="col-lg-12">
                         <h1 class="page-header">
                             Welcome To View Post
                             <small>View All Post</small>
                         </h1>
                         <?php
                           if (isset($_GET['source'])) {
                               $source=$_GET['source'];
                           }else{
                             $source='';
                           }
                           switch ($source) {
                               case 'add_image':
                                   include_once"add_image.php";
                                   break;

                               case 'edit_image':
                                   include_once"edit_image.php";
                                   break;

                               case 'view_image':
                                   include_once"view_all_image.php";
                                   break;

                               case 'add_blog':
                                   include_once"add_blog.php";
                                   break;

                               case 'edit_blog':
                                   include_once"edit_blog.php";
                                   break;

                               case 'view_blog':
                                   include_once"view_all_blog.php";
                                   break;
                                
                                case 'add_memories':
                                    include_once"add_memories.php";
                                    break;
 
                                case 'edit_memories':
                                    include_once"edit_memories.php";
                                    break;
 
                                case 'view_memories':
                                    include_once"view_all_memories.php";
                                    break;

                               case 'add_aboutme':
                                   include_once"add_about_me.php";
                                   break;

                               case 'edit_aboutme':
                                   include_once"edit_aboutme.php";
                                   break;

                               case 'view_aboutme':
                                   include_once"view_all_about_me.php";
                                   break;

                               case 'add_gallery':
                                   include_once"add_gallery.php";
                                   break;

                               case 'edit_gallery':
                                   include_once"edit_gallery.php";
                                   break;

                               case 'view_gallery':
                                   include_once"view_all_gallery.php";
                                   break;
                           }
                         ?>
                     </div>
                 </div>
                 <!-- /.row -->

             </div>
             <!-- /.container-fluid -->

         </div>
         <!-- /#page-wrapper -->




            <!-- footer start here -->
  <?php include_once "include_admin/admin_footer.php"; ?>
            <!-- footer end here -->
