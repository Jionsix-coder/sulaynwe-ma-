<?php include_once "include_admin/db.php"; ?>
<?php include_once "include_admin/function.php"; ?>

<?php
     if (isset($_POST['btn-submit'])) {
       $email = escape(clean_input($_POST['email']));
       $name = escape(clean_input($_POST['name']));
       $msg = escape(clean_input($_POST['msg']));

       if (empty($email) && empty($name) && empty($msg)) {
        redirect("../contact.php?error");
       }else{
         $sql = "INSERT INTO contact(name, message, email,contact_date,contact_time)";
         $sql .="VALUES ('$name','$msg','$email',now(),now())";
         $result=mysqli_query($con,$sql);
         confirm_query($result);
         redirect("../contact.php?success");
       }
     }

 ?>
