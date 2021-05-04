<?php
	$SERVER = 'usersrv01.cs.virginia.edu';
	$USERNAME = 'cnw2bx';
	$PASSWORD = 'Cnelson2!';
	$DATABASE = 'cnw2bx';

	$ADMIN_USERNAME = 'basketball_admin';
	$ADMIN_PASSWORD = 'Basketball_password1';
	$ADMIN_DATABASE = 'cnw2bx';

	$HISTORIAN_USERNAME = 'basketball_historian';
	$HISTORIAN_PASSWORD = 'Basketball_historian1';
	$HISTORIAN_DATABASE = 'cnw2bx';

	$FAN_USERNAME = 'basketball_fan';
	$FAN_PASSWORD = 'Basketball_fan1';
	$FAN_DATABASE = 'cnw2bx';

	$user;
	$userCon;

	function openDBCon(){

		$permissions = mysqli_query($con,$getPass);
		if ($permission == 'a'){
			$userCon = new mysqli($SERVER, $ADMIN_USERNAME, $ADMIN_PASSWORD, $ADMIN_DATABASE);
		}
		else if ($permission == 'h')
		{
			$userCon = new mysqli($SERVER, $HISTORIAN_USERNAME, $HISTORIAN_PASSWORD, $HISTORIAN_DATABASE);
		}
		else if ($permission == 'f')
		{
			$userCon = new mysqli($SERVER, $FAN_USERNAME, $FAN_PASSWORD, $FAN_DATABASE);
		}
		mysqli_close($con);
	}

	function closeDBCon(){
		mysqli_close($userCon);
	}
?>


