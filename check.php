<?php
define ( 'DB_HOST', 'localhost' );
define ( 'DB_NAME', 'kalimag' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASS', '' );

define ( 'CHECK_EMAIL', 'SELECT id FROM users WHERE email = ?;');
define ( 'CHECK_PASSWORD', 'SELECT password FROM users WHERE password = ? AND email = ?;');


function getConnection(){
	try {
		$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
		$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		return $db;
	} catch ( PDOException $e ) {
		throw new Exception ( "No connection with database", $e );
	}
};

function checkEmail($email){
	$db = getConnection();
	$pstmt = $db ->prepare(CHECK_EMAIL);
	$pstmt -> execute(array($email));
	return $res = $pstmt -> fetch(PDO::FETCH_COLUMN);
};

function checkPass($pass, $email){
	$db = getConnection();
	$pstmt = $db ->prepare(CHECK_PASSWORD);
	$pstmt -> execute(array($pass, $email));
	return $res = $pstmt -> fetch(PDO::FETCH_COLUMN);
}

// if (isset($_POST['email'])){
// 	$email = trim(($_POST['email']));
// 	if ($email!==''){	
// 		try {
// 			$user = checkEmail($email);
// 			if($user){
// 				echo 1;
// 			} else {
// 				echo 0;
// 			}
		
// 		} catch ( PDOException $e ) {
// 			echo "{error : " . $e->getMessage () . "}";
// 			http_response_code ( 500 );
// 		}
// 	}
// }

if (isset($_REQUEST['password'])){
	$pass = trim($_REQUEST['password']);
	$email = trim(($_REQUEST['email']));
	
	try {
		$user = checkPass($pass, $email);
		if($user){
			echo 1;
		} else {
			echo 0;
		}
	
	} catch ( PDOException $e ) {
		echo "{error : " . $e->getMessage () . "}";
		http_response_code ( 500 );
	}
}
?>