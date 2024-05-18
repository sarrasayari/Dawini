<?php
	// This will redirect to 404 Page in case trying to direct access this page
	if( !isset($_SERVER["HTTP_REFERER"]) )
	{
		include("../404.html");
		exit();
	}

	include ("database.php");

	$email = $_POST["email"];
	$password = $_POST["password"];

	// Prevent SQL injection
	$email = mysqli_real_escape_string($connection,$email);
	$password = mysqli_real_escape_string($connection,$password);

	// Check for Admin
	$request = "SELECT * FROM administrateur WHERE email='".$email."' AND mot_passe='".$password."'";
	$result = mysqli_query($connection,$request);

	if (mysqli_num_rows($result) == 1) // Admin Authenticated
	{
		/* Encode to Json Format */
		$response = array("success" => true, "redirect" => "gestion_des_compte.php");
		/* Return as Json Format */
		echo json_encode($response);
		exit;
	}
	else // Admin Not Found
	{
		/* Encode to Json Format */
		$response = array("success" => false);
		/* Return as Json Format */
		echo json_encode($response);
		exit;
	}

	mysqli_close($connection);
?>