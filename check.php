<?php
if (isset($_POST['email'])){
	$email = trim(($_POST['email']));
	if ($email!==''){
		$link_kalimag = mysqli_connect("localhost", "root", "");
		mysqli_select_db($link_kalimag, "kalimag");
		$result = mysqli_query($link_kalimag, "select * from users WHERE (Email = '$email')");
		$users = mysqli_fetch_array($result,MYSQLI_ASSOC);
		if($users){
			echo 1;
		} else {
			echo 0;
		}
	}
}
?>