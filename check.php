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

define ( 'CHECK_EMAIL', 'SELECT id FROM users WHERE email = ?;');
define ( 'CHECK_PASSWORD', 'SELECT password FROM users WHERE password = ? AND email = ?;');
define ('DLETE_PRODUCT_FROM_CARTS', 'DELETE FROM baskets WHERE users_id = ? AND product_id = ?;');
define ('UPDATE_PRODUCT_QUANTITY', 'UPDATE baskets SET quantity = ? WHERE users_id = ? and product_id = ?;');


function getConnection(){
	try {
		$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ';charset=utf8', DB_USER, DB_PASS );
		$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		return $db;
	} catch ( PDOException $e ) {
		throw new Exception ( "No connection with database", $e );
	}
};

function updateProductQuantity ($quantity, $userId, $productId){
	$db = getConnection();
	if (is_numeric($quantity) && $quantity <= 0){
		echo 'Невалидно количество';
		return;
	}
	try{
		$pstmt = $db->prepare(UPDATE_PRODUCT_QUANTITY);
		return $pstmt->execute(array($quantity, $userId, $productId));
	}catch (PDOException $e) {
		throw new Exception('Bad user ID provided!');
	}
}
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

function removeProduct($userId, $productId){
	$db = getConnection();
	try{
		$pstmt = $db->prepare(DLETE_PRODUCT_FROM_CARTS);
		return $pstmt->execute(array($userId, $productId));
	}catch (PDOException $e) {
		throw new Exception('Bad user ID provided!');
	}
}

function getAllSumProducts($userId){
	$db = getConnection();
	$pstmt = $db->prepare('SELECT SUM(b.quantity*p.price) FROM baskets b JOIN products p
		ON (b.product_id=p.id)
		WHERE b.users_id = ?');
	$pstmt->execute(array($userId));
	return $res = $pstmt->fetch(PDO::FETCH_COLUMN);

}

if (isset($_POST['newEmail'])){
	$email = trim(($_POST['newEmail']));
	if ($email!==''){	
		try {
			$user = checkEmail($email);
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

if (isset($_GET['remove'])){
	session_start();
	$productId = $_GET['remove'];
	$userId = $_SESSION['ID'];
	try {
		$result = removeProduct($userId, $productId);
		echo round(getAllSumProducts($userId)+0,2);
	} catch ( PDOException $e ) {
		echo "{error : " . $e->getMessage () . "}";
		http_response_code ( 500 );
	}
}

if (isset($_GET['update'])){
	session_start();
	$productId = $_GET['update'];
	$userId = $_SESSION['ID'];
	$quantity = $_GET['quantity'];
	try {
		$result = updateProductQuantity ($quantity, $userId, $productId);
		echo round(getAllSumProducts($userId)+0,2);
	} catch ( PDOException $e ) {
		echo "{error : " . $e->getMessage () . "}";
		http_response_code ( 500 );
	}
}
?>