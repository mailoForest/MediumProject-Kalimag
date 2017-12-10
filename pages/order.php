<?php include '../header.php'; include '../functions.php'; ?>
<div class="clr"></div>
<div class="content">
	<div class="content_resize">
		<div class="mainbar">
			<div class="article-basket">
				<div  id='form-basket'>
					<h2>Данни за поръчката:</h2>
						<table class="order-table">
							<thead>
								<tr>
									<th>Име</th>
									<th>Продукт</th>
									<th>Модел</th>
									<th>Количество</th>
									<th>Цена</th>
								</tr>
							</thead>
							<tbody>
						<?php
						$street = '';
						$city = '';
						$postCode = '';
						if (isset($_SESSION['ID'])){
							$sum = 0;
							$resProductInBasket = getProductInBasket($_SESSION['ID'], 2);
							if ($resProductInBasket){
								for ($row=0;$row<count($resProductInBasket);$row++){ 
									$title = $resProductInBasket[$row]['manufacturers'];
									$model = $resProductInBasket[$row]['model'];
									$price = $resProductInBasket[$row]['price'];
									$quantity =  $resProductInBasket[$row]['quantity'];
									$productName = $resProductInBasket[$row]['name'];
									echo '<tr>
									<td>'.$productName.'</td>	
									<td>'.$title.'</td>	
									<td>'.$model.'</td>
									<td id="price">'.$quantity.' бр.</td>	
									<td id="price">'.$price.' лв.</tr>';			         	
								} 
							}
							
							$address = getAddress($_SESSION['ID']);
							if ($address){
								$street = $address['street_address'];
								$city = $address['city'];
								$postCode = $address['post_code'];
							}
						}
						if (isset($_POST['order']) && isset($_POST['street']) && isset($_POST['city']) && isset($_POST['post-code'])) {

							$addressStreet = trim($_POST['street']);
							$addressCity = trim($_POST['city']);
							$addressPostCode = trim($_POST['post-code']);

							if (empty($addressStreet) && empty($addressCity) && empty($addressPostCode)){
								echo "Моля попълнете всички полета!";
							}else{
								$addressStreet = htmlentities($addressStreet);
								$addressCity = htmlentities($addressCity);
								$addressPostCode = htmlentities($addressPostCode);
								
								$result = addOrder($_SESSION['ID'], $addressStreet, $addressCity, $addressPostCode);
								
								if ($result){
									echo "Поръчката ви е направена!";
								}
							}
						}
						?> 	
							</tbody>
						</table>
						<form action="" method="post" id = 'orderForm'>
							<table>
						<caption><h2>Адрес</h2></caption>
						<tr><th><label>Улица</label></th><td><input type="text" name='street' value='<?= $street ?>'/></td></tr>
						<tr><th><label>Град</label></th><td><input type="text" name='city' value='<?= $city ?>'/></td></tr>
						<tr><th><label>Пощенски код</label></th><td><input type="text" name='post-code' value='<?= $postCode ?>'/></td></tr>
							</table>
							<input type="submit" name='order' value = 'Поръчай'/>
					</form>
				</div> 
			</div>
		</div>
		<div class="sidebar">
			<div class="search">
			<form id="form" name="form" method="post" action="#">
				<span><input name="q" type="text" class="keywords" id="textfield" maxlength="50" value="Search..." /></span>
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
<script type="text/javascript">
	setClassActive('cart.php');
</script>
<?php include '../footer.php'?>