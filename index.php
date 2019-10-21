<?php

	if (isset($_POST ['send'])) {
		
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			
			$field_1 = $_POST['form_select'];
			$field_2 = $_POST['fio'];
			$field_3 = $_POST['email'];
			$field_4 = $_POST['message'];
			//echo $field_1.",".$field_2.",".$field_3.",".$field_4;
			
			$mysqli = new mysqli("localhost", "root", "", "firstbase");
			$mysqli->query("SET NAMES 'utf8'");
			$mysqli->query("INSERT INTO `orders` (`id_product`,`name`,`email`,`comment`,`date`) VALUES ('$field_1','$field_2','$field_3','$field_4','".time()."')");
			$mysqli->close();
			
			echo "Заказ получен! В ближайшее время ждите письмо на указанный почтовый ящик.";
		}
		else {
			echo "E-mail адрес <b>".$_POST['email']."</b> указан неверно.\n";
		}
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Интернет-магазин</title>
	</head>

	<body>
		<h2><strong>Интернет-магазин</strong></h2>
		<h3><strong>Список товаров</strong></h3>
		<?php
			function InputListProduct($result_set) {
				while ($row = $result_set ->fetch_assoc() ){
					printf ("%s %s\n", $row["id_product"], $row["name"]);
					echo "<br/>";
				}
			}
			
			$mysqli = new mysqli("localhost", "root", "", "firstbase");
			$mysqli->query("SET NAMES 'utf8'");
			$result_set = $mysqli->query("SELECT `id_product`, `name` FROM `products`");
			
			InputListProduct($result_set);
			$mysqli->close();
		?>
		<br/>
		<h3><strong>Форма заказа</strong></h3>
		<form action="index.php" method="POST">
			<table>
				<tr>
					<td><input type="TEXT" name="fio" placeholder="Введите ваше имя"></td>
				</tr>
				<tr>
					<td><input type="TEXT" name="email" placeholder="Введите ваш e-mail"></td>
				</tr>
				<tr>
					<td>
						<p>Выберите номер товара
						  <select name="form_select">
							<option selected="selected" value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
						  </select>
						</p>
					</td>
				</tr>
				<tr>
					<td><textarea name="message" rows="10" cols="25" placeholder="Введите ваш комментарий"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" name="send" value="Заказать"></td>
				</tr>
			</table>
		</form>
		<br/>
		<br/>
		<a href="admin.php">Переход в Admin-панель</a>
		
	</body>
</html>


