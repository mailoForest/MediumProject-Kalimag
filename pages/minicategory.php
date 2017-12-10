<?php
require_once '../db.php';
$data = [];
include '../header.php';
if (isset($_GET['name'])){
	try{
		$minicategory = $_GET['name'];
		$db = new PDO( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ';charset=utf8', DB_USER, DB_PASS );
		$preparedStatement = $db->prepare("SELECT * FROM minicategories WHERE name = ?");
		$result = $preparedStatement->execute([$minicategory]);

		if ($result) {
			$countRows = 0;
			while ($row = $preparedStatement->fetch(PDO::FETCH_NUM)) {
				$countRows++;
			}

			if ($countRows == 0){
				header("Location: ./");
				die();
			} else {
				$result = $db->prepare('SELECT p.name, man.name, p.model, p.price, p.picture, p.id FROM products p JOIN minicategories m on(p.minicategory_id = m.id) JOIN manufacturers man ON (man.id = p.manufacturer_id) WHERE m.name = ?');
				$result->execute([$minicategory]);

				while ($row = $result->fetch(PDO::FETCH_NUM)){
					$data[] = $row;
				}
			}
		}
	} catch (PDOException $exception){
		$message = $exception->getMessage();
		echo "<script>alert($message)</script>";
	}
}
?>
	<div class="clr"></div>
	<div class="content">
		<div class="content_resize">
			<div class="mainbar">
			<section class = 'mainbar-minicategory'>
				<?php
				$decideIfShouldBeAddedToCart = '';
				foreach ($data as $d){
					$title  = $d[0] . ' ' . $d[1] . ' ' . $d[2];
					$price = $d[3];
					$imageName = $d[4];
					$productId = $d[5];
					$productsPicturesPath = '../assets/images/products';

					if (isset($_SESSION['ID'])) {
						$userId = $_SESSION['ID'];
						$decideIfShouldBeAddedToCart = "addToCart($userId, $productId, '$title')";
					} else {
						$decideIfShouldBeAddedToCart = "showLoginBar()";
					}
				?>
					<article class="minicategory-products">
						<a href="product.php?id=<?php echo $productId; ?>">
							<article><img width="100em" src="<?php echo $productsPicturesPath, '/', $imageName; ?>" alt=""><p><?php echo $title, ' ', $price; ?> лв.</p></article>
						</a>
						<button onclick="<?php echo $decideIfShouldBeAddedToCart; ?>">Добави в кошницата</button>
					</article>
				<?php } ?>
				</section>
			</div>
			<div class="sidebar">
				<div class="search">
					<form id="form" name="form" method="post" action="#">
			<span>
			<input name="q" type="text" class="keywords" id="textfield" maxlength="50" value="Search..." />
			</span>
						<input name="b" type="image" src="../assets/images/search.gif" class="button" />
					</form>
				</div>
				<!--/search -->
				<?php include '../aside.php'?>
			</div>
			<div class="clr"></div>
		</div>
	</div>
	<script type="text/javascript" src="../assets/js/script.js"></script>
	<script  type="text/javascript">
		setClassActive('index.php');
		window.onscroll = function(){showGoTop()};
	</script>
<?php include '../footer.php'?>