<?php
//Confirmed Query Function
function confirm_query($result){
		global $con;
		if (!$result) {
		      die('Connection Fail'.mysqli_error($con));
		  }
	}
	// string
		function escape($string){
			global $con;
			return mysqli_real_escape_string($con,$string);
		}
		// clean input
function clean_input($input){
	$input=trim($input);
	$input=htmlspecialchars($input);
	return $input;
}
// http_redirect()
function redirect($path){
	 header("Location: $path");
}
?>
