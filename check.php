<?php
if (isset($_POST['email'])){
	$email = trim(($_POST['email']));
	if ($email!==''){
		define ( 'DB_HOST', 'localhost' );
		define ( 'DB_NAME', 'kalimag' );
		define ( 'DB_USER', 'root' );
		define ( 'DB_PASS', '' );
		try {
			$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
			$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
			$result = $db->query ( "SELECT * FROM users WHERE Email = '$email';" );
			
			$user = $result->fetch ( PDO::FETCH_ASSOC);
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
}
?>