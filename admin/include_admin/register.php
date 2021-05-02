<?php require_once "db.php" ?>
<?php include_once "function.php";?>
	<?php
        if (isset($_POST['signup'])) {
        	$adminname = clean_input($_POST['username']);
        	$password = clean_input($_POST['password']);
        	$password=password_hash($password,PASSWORD_BCRYPT,['kyite' => true]);

        	if (empty($adminname) || empty($password)) {
        		echo "<script>alert('Failed To Register!!!');</script>";
        	}else{
        		$adminname=escape($adminname);
	        	$password=escape($password);

	        	$sql="INSERT INTO admin(adminname,password)";
	        	$sql .= "VALUES ('$adminname','$password')";
	        	$result=mysqli_query($con,$sql);
	        	confirm_query($result);
	        	echo "<script>alert('Register Successfully!!!');</script>";
                header('Location: ../index.php');
        	}
        }
	?>
