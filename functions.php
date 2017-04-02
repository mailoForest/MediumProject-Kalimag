<?php
if (!defined('DB_HOST')){
    define ( 'DB_HOST', 'localhost' );
}
if (!defined('DB_NAME')){
    define ( 'DB_NAME', 'kalimag' );
}
if (!defined('DB_USER')){
    define ( 'DB_USER', 'root' );
}
if (!defined('DB_PASS')){
    define ( 'DB_PASS', '' );
}

define ('SUBSCRIBE', 'SELECT email FROM users WHERE is_subscribed = true AND id = ?;');
define ('SUBSCRIBED', 'UPDATE users SET is_subscribed = true WHERE id = ?;');
define ('GET_ALL_PRODUCT_IN_BASKET', 
		"SELECT p.id, p.picture, p.name, m.name AS 'manufacturers', p.model, b.quantity, p.price
			FROM baskets b JOIN products p
			ON (b.product_id = p.id)
			JOIN manufacturers m ON (p.manufacturer_id=m.id) 
			WHERE b.users_id = ? AND ? < p.quantity");
define ('GET_SUM_PRODUCTS', 'SELECT SUM(b.quantity*p.price) FROM baskets b JOIN products p
		ON (b.product_id=p.id)
		WHERE b.users_id = ?');

function getConnection(){
	try {
		$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ';charset=utf8', DB_USER, DB_PASS );
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

function subscribed($userId){
	$db = getConnection();
	try{
		$pstmt = $db->prepare(SUBSCRIBED);
		return $pstmt->execute(array($userId));
	}catch (PDOException $e) {
		throw new Exception('Bad user ID provided!');
	}
}

function sendEmail(){
	include("../php-mailjet-v3-simple.class.php");
	// This calls sends an email to one recipient.
	$mj = new Mailjet('6a444d2f0f934c1f991743576f240b2d','937d7b1c283a81ad2c6b447cbc56eee7');

	$params = array(
			"method" => "POST",
			"from" => "kalimag@abv.bg",
			"to" => $_SESSION['email'],
			"subject" => "Успешен абонамент Калимаг",
			"text" => "Благодарим Ви, че се абонирахте за седмичния ни бюлетин!"
	);

	$result = $mj->sendEmail($params);
	$error = 'email failed:'.$params['to'];

	if ($mj->_response_code == 200){

	}else
		file_put_contents('mailErrors.txt', $error);
}

function getProductInBasket($userId, $quantity){
	$db = getConnection();
	try{
		$pstmt = $db->prepare(GET_ALL_PRODUCT_IN_BASKET);
		$pstmt->execute(array($userId, $quantity));
		return $res = $pstmt ->fetchAll(PDO::FETCH_ASSOC);
	}catch (PDOException $e) {
		throw new Exception('Bad user ID provided!');
	}
}

function getAllSumProducts($userId){
	$db = getConnection();
		$pstmt = $db->prepare(GET_SUM_PRODUCTS);
		$pstmt->execute(array($userId));
		return $res = $pstmt->fetch(PDO::FETCH_COLUMN);

}
?>