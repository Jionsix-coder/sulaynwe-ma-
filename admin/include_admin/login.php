<?php require_once"db.php";?>
<?php  require_once"function.php";?>
<?php session_start(); ?>
<?php
   if (isset($_POST['login'])) {
   	  $adminname=clean_input($_POST['username']);
   	  $password=clean_input($_POST['password']);
   	  $sql="SELECT * FROM admin WHERE adminname='$adminname'";
   	  $result=mysqli_query($con,$sql);
   	  confirm_query($result);
   	  if (mysqli_num_rows($result) > 0) {
   	  	    $row=mysqli_fetch_assoc($result);
            $admin_id=$row['admin_id'];
            $db_adminname=$row['adminname'];
   	        $db_password=$row['password'];

   	        if (password_verify($password,$db_password)) {
                   $_SESSION['admin_id']=$admin_id;
                   $_SESSION['adminname']=$adminname;
   	         	redirect('../admin.php');
   	        }else{
                   redirect('../index.php');
               }
   	  }else{
   	  	redirect('../index.php');
   	  }
   }else{
   	redirect('../index.php');
   }

?>
