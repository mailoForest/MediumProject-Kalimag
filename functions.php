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

define('GET_USER_ADDRESS', 'SELECT u.address_id, u.id AS "user_id", a.street_address, a.city, a.post_code FROM addresses a JOIN users u ON (a.id = u.address_id) where u.id = ?;');

function goHome(){
	header('Location: ./', true, 302);
}
function getConnection(){
	try {
		$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ';charset=utf8', DB_USER, DB_PASS );
		$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		return $db;
	} catch ( PDOException $e ) {
		throw new Exception ( "No connection with database", $e );
	}
}

function changePersonalData(){
	$name = trim(($_POST['name']));
	$surname = trim(($_POST['surname']));
	$phone = trim(($_POST['phone']));
	if(is_numeric($phone) && !empty($name) && !empty($surname)){
	
		$id = $_SESSION['ID'];	
		try {
			$db = getConnection();
			
			if (isset($_FILES['profilePic'])) {
				$fileOnServerName = $_FILES['profilePic']['tmp_name'];
				if (is_uploaded_file($fileOnServerName)) {
					$pictureName = sha1($id) . ".jpg";
					if (move_uploaded_file($fileOnServerName,'../profilePicture/' . $pictureName)) {
						$pstmt = $db->prepare("UPDATE users SET picture = ? where id = ?;");
						$pstmt->execute(array($pictureName, $id));
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

function getAddress($userId){
    $db = getConnection();
	try{
        $pstmt = $db->prepare(GET_USER_ADDRESS);
        $pstmt->execute(array($userId));
        return $res = $pstmt ->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        throw new Exception('Bad user ID provided!');
    }
}
function checkIfAddressExists ($street, $city, $postCode) {
    $db = getConnection();
    try{
        $pstmt = $db->prepare('SELECT id FROM addresses WHERE street_address = ? and city = ? and post_code = ?');
        $pstmt->execute(array($street, $city, $postCode));
        return $res = $pstmt->fetchColumn(0);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function insertAddress($street, $city, $postCode){
    $db = getConnection();
    try{
        $addressId = checkIfAddressExists ($street, $city, $postCode);

        if ($addressId === false){
            $pstmt = $db->prepare('INSERT INTO addresses() VALUES (NULL, ?, ?, ?)');
            $pstmt->execute(array($street, $city, $postCode));
            $addressId = checkIfAddressExists ($street, $city, $postCode);
        }
        return $addressId;
    } catch (PDOException $e) {
        throw new Exception('Bad user street, city or post code  provided!');
    }
}
function updateUserAddress($userId, $street, $city, $postCode){
    $db = getConnection();
    $addressId = insertAddress($street, $city, $postCode);
    try{
        $pstmt = $db->prepare('UPDATE users SET address_id = ? where id = ?');
        $pstmt->execute(array($addressId, $userId));
    } catch (PDOException $e) {
        throw new Exception('Bad user street, city or post code  provided!');
    }
}
function addOrder($userId, $street, $city, $postCode, $changeAddress = false){
    $userAddress = getAddress($userId);

    if (!$userAddress){
        updateUserAddress($userId, $street, $city, $postCode);
    } else if ($changeAddress === true){
        updateUserAddress($userId, $street, $city, $postCode);
    }
    $userAddress = getAddress($userId)[0]['address_id'];
    $db = getConnection();
    try{
        $db->beginTransaction();

        $pstmt = $db->prepare('SELECT * FROM baskets WHERE users_id = ?');
        $pstmt->execute(array($userId));

        $prepareInsertingOrders = $db->prepare('INSERT INTO orders VALUES (null, CURDATE(),?, ?, ?, ?);');

        while ($res = $pstmt->fetch(PDO::FETCH_ASSOC)) {
            $productId = $res['product_id'];
            $quantity = $res['quantity'];
            $prepareInsertingOrders->execute([$userId, $userAddress, $productId, $quantity]);
        }

        $pstmt = $db->prepare('DELETE FROM baskets WHERE users_id = ?');
        $pstmt->execute(array($userId));

        $db->commit();
    }catch (PDOException $e) {
        echo $e->getMessage(), $e->getLine();
        throw new Exception('Bad user ID provided!');
    }
}
addOrder('5', '22 ave', 'elin pelin', '55', true);
?>