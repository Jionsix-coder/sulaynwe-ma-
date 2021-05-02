<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="css/login.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<!------ Include the above in your HEAD tag ---------->
	<title>Su Lay Nwe</title>
</head>
<body>
		<div class="container">
		    <div class="card card-login mx-auto text-center bg-dark">
		        <div class="card-header mx-auto bg-dark">
		            <span> <img src="img/login.jpg" class="w-75" alt="Logo"> </span><br/>
		                        <span class="logo_title mt-5"> Register Dashboard </span>
		<!--            <h1>--><?php //echo $message?><!--</h1>-->

		        </div>
		        <div class="card-body">
		            <form action="include_admin/register.php" method="post">
		                <div class="input-group form-group">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text"><i class="fas fa-user"></i></span>
		                    </div>
		                    <input type="text" name="username" class="form-control" placeholder="Username">
		                </div>

		                <div class="input-group form-group">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text"><i class="fas fa-key"></i></span>
		                    </div>
		                    <input type="password" name="password" class="form-control" placeholder="Password">
		                </div>

		                <div class="form-group">
		                    <input type="submit" name="signup" value="Register" class="btn btn-outline-danger float-right login_btn">
		                </div>

		            </form>
		        </div>
		    </div>
		</div>
 </body>
</html>
