<?php
session_start();

define ( 'DB_HOST', 'localhost' );
define ( 'DB_NAME', 'kalimag' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASS', '' );

function changeEmail(){
	$email =$_POST['email'];
	$pass= $_POST['newPassword'];
	$id =  $_SESSION['ID'];
 	if (!empty($email) && $pass===$_SESSION['pass']){		
		try {
			$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
			$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$result = $db->exec( "UPDATE users SET Email='$email' WHERE ID='$id';" );
			if ($result){
				echo true;
				$_SESSION['email'] = $email;
			}
		
		} catch ( PDOException $e ) {
			echo "{error : " . $e->getMessage () . "}";
			http_response_code ( 500 );
		}
 	}
}
function changePassword(){
	$pass= $_POST['oldPassword'];
	$newPass= $_POST['newPass'];
	$repeatPass = $_POST['repeatPass'];
	$id =  $_SESSION['ID'];
	if (!empty($newPass) && $newPass===$repeatPass && $pass===$_SESSION['pass']){
		try {
			$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
			$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	
			$result = $db->exec( "UPDATE users SET Password='$newPass' WHERE ID='$id';" );
			if ($result){
				echo true;
				$_SESSION['pass'] = $newPass;
			}
	
		} catch ( PDOException $e ) {
			echo "{error : " . $e->getMessage () . "}";
			http_response_code ( 500 );
		}
	}
}


if (isset($_POST['email']) && isset($_POST['newPassword'])){
	changeEmail();
}

if (isset($_POST['oldPassword']) && isset($_POST['newPass'])){
	changePassword();
}
?>