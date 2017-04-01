<?php
define ( 'DB_HOST', 'localhost' );
define ( 'DB_NAME', 'kalimag' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASS', '' );	

define ('SUBSCRIBE', 'SELECT email FROM users WHERE is_subscribed = true AND id = ?;');

function getConnection(){
	try {
		$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
		$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		return $db;
	} catch ( PDOException $e ) {
		throw new Exception ( "No connection with database", $e );
	}
};

function changePersonalData(){
	$name = trim(($_POST['name']));
	$surname = trim(($_POST['surname']));
	$phone = trim(($_POST['phone']));
	if(is_numeric($phone) && !empty($name) && !empty($surname)){
	
		$id=$_SESSION['ID'];	
		try {
			$db = getConnection();
			
			if (isset($_FILES['profilePic'])) {
				$fileOnServerName = $_FILES['profilePic']['tmp_name'];
				$fileOriginalName = $_FILES['profilePic']['name'];
				if (is_uploaded_file($fileOnServerName)) {
					if (move_uploaded_file($fileOnServerName,'../assets/images/profil-picture/'.$id.".jpg")) {
						$linkProfilPic = 'assets/images/profil-picture/'.$id.".jpg";
					}
				}
			}
	
			$result = $db->exec( "UPDATE users SET name='$name', surname='$surname' , phone='$phone' WHERE ID='$id';" );
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

function isSubscribe($userId){
	$db = getConnection();
	$pstmt = $db->prepare(SUBSCRIBE);
	$pstmt->execute(array($userId));
	return $res = $pstmt->fetch(PDO::FETCH_COLUMN);
}
?>