<?php 
class otp
{
	// Function to generate OTP 
function generate_numeric_otp() { 
	
	// Take a generator string which consist of 
	// all numeric digits 
	$generator = "1357902468"; 

	$result = ""; 	
	for ($i = 1; $i <= 4; $i++) { 
	$result .= substr($generator, (rand()%(strlen($generator))), 1); 
	} 

	// Return result 
	//return $result; 
	return $result;
} 
}
?>