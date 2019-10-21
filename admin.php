<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin-панель</title>
	</head>

	<body>
	
		<h3><strong>Admin-панель</strong></h3>
		<?php 
		/* формирование массива с номерами заказов */
			$mysqli = mysqli_connect("localhost", "root", "", "firstbase");
			$mysqli->query("SET NAMES 'utf8'");
			$query = "SELECT id FROM orders";
			$result = mysqli_query($mysqli, $query);
			
			while($row = $result->fetch_array())
			{
				$num_orders[] = $row;
			}
									
			$mysqli->close();
		?>
		<!--Форма изменение/удаления заказа-->
		<h4><strong>Изменение/Удаление заказа</strong></h4>
		<form action="results.php" method="POST">
			<table>
				<tr>
					<td>
						<p>Выберите номер заказа
						  <select name="form_select">
							<?php 
							//var_dump($num_orders);
							foreach($num_orders as $row){
							echo '<option value="'.$row['id'].'">'.$row['id'].'</option>';}
							?>
						  </select>
						</p>
					</td>
				</tr>
				<tr>
					<td><input type="submit" name="change" value="Изменить">
					<input type="submit" name="delete" value="Удалить"></td>
				</tr>
			</table>
		</form>
		<br/>
	
		<!--Формирование спиcка заказов-->
		<h4><strong>Список заказов</strong></h4>
		<table border="1">
		<tr>
			<th>Номер заказа</th>
			<th>Номер товара</th>
			<th>Имя клиента</th>
			<th>E-mail клиента</th>
			<th>Комментарии</th>
			<th>Дата заказа</th>
		</tr>
		<?php
			function InputListOrders($result_set) {
				/* Вывод таблицы с заказами */
				while ($row = $result_set ->fetch_assoc() ){
					 echo 
					"<tr>
						<td>",$row["id"],"</td>
						<td>",$row["id_product"],"</td>
						<td>",$row["name"],"</td>
						<td>",$row["email"],"</td>
						<td>",$row["comment"],"</td>
						<td>",date("d.m.Y", $row["date"]),"</td>
					</tr>";
				}
			}
			
			$mysqli = new mysqli("localhost", "root", "", "firstbase");
			$mysqli->query("SET NAMES 'utf8'");
			$result_set = $mysqli->query("SELECT `id`, `id_product`, `name`, `email`, `comment`, `date` FROM `orders`");
			InputListOrders($result_set);
			$mysqli->close();
		?>
		</table>
		<br/>
		<a href="index.php">Переход на главную страницу</a>
	</body>
</html>	