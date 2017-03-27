<?php
function connectDb(){
	define ( 'DB_HOST', 'localhost' );
	define ( 'DB_NAME', 'kalimag' );
	define ( 'DB_USER', 'root' );
	define ( 'DB_PASS', '' );	
};

function changePersonalData(){
	$name = trim(($_POST['name']));
	$surname = trim(($_POST['surname']));
	$phone = trim(($_POST['phone']));
	$address = trim(($_POST['address']));
	if(is_numeric($phone) && !empty($name) && !empty($surname) && !empty($address)){
	
		$id=$_SESSION['ID'];
		connectDb();	
		try {
			$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
			$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	
			$result = $db->exec( "UPDATE users SET Name='$name', Surname='$surname' , Phone='$phone' WHERE ID='$id';" );
			if ($result){
				$_SESSION['name'] = $name;
				$_SESSION['surname'] = $surname;
				$_SESSION['phone'] = $phone;
			}
		} catch ( PDOException $e ) {
			echo "{error : " . $e->getMessage () . "}";
			http_response_code ( 500 );
		}
	}
}
?>