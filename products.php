<?php
define ( 'DB_HOST', 'localhost' );
define ( 'DB_NAME', 'kalimag' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASS', '' );

define('GET_ALL_PRODUCTS', 'SELECT * FROM products WHERE minicategory_id=?');

function getConnection(){
	try {
		$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
		$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		return $db;
	} catch ( PDOException $e ) {
		throw new Exception ( "No connection with database", $e );
	}
};

function getAllPhone ($categoryID){
	$db = getConnection();
	$pstmt = $db->prepare(GET_ALL_PRODUCTS);
	$pstmt->execute(array($categoryID));
	return $res = $pstmt -> fetch(PDO::FETCH_ASSOC);
}
var_dump(getAllPhone (1))
?>
<section>
	<article>
		<figure>
			<img alt="" src="assets/images/img2.jpg">	
			<figcaption>Fibus et magnis</figcaption>				
		</figure>
	</article>	
</section>