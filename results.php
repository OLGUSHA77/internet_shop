<?php
	//соединение с БД
	$mysqli = mysqli_connect("localhost", "root", "", "firstbase");
	$mysqli->query("SET NAMES 'utf8'");
	
	
	if (!$mysqli) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }

	//считывание данных из БД для формы
	if (isset($_POST ['change'])) {
		
		if (isset($_POST['form_select'])){
			
			$sql = "SELECT `id`, `id_product`, `name`, `email`, `comment` FROM `orders` WHERE `orders`.`id` = '{$_POST['form_select']}';";
			$query = mysqli_query($mysqli,$sql);
			$row = mysqli_fetch_array($query);
		}
	}
	
	//внесение изменений в заказ
	if (isset($_POST ['ОК'])) {
		
		if (isset($_POST['id'])){
			
			$mysqli = mysqli_connect("localhost", "root", "", "firstbase");
			$mysqli->query("SET NAMES 'utf8'");
			
			$field_1 = $_POST['id'];
			$field_2 = $_POST['id_product'];
			$field_3 = $_POST['name'];
			$field_4 = $_POST['email'];
			$field_5 = $_POST['comment'];
					
			$sql = "UPDATE `firstbase`.`orders` SET `id_product` = \"$field_2\", `name` = \"$field_3\", `email` = \"$field_4\", `comment` = \"$field_5\", `date` = \"".time()."\" WHERE `id` = \"$field_1\" ";
			$result_set = mysqli_query($mysqli, $sql);
			
			if ($result_set) {
			echo "Заказ номер ".$field_1." изменен!";
			}
			else {
				echo "Заказ номер ".$field_1." не изменен!";
			}
		}
	  } 

	//удаление заказа
	if (isset($_POST ['delete'])) {
		
		if (isset($_POST['form_select'])){
			
			$sql = "DELETE FROM `orders` WHERE `orders`.`id` = '{$_POST['form_select']}';";
			$query = mysqli_query($mysqli,$sql);
			
			echo "Заказ номер ".$_POST['form_select']." удален!";
		}
		else {
			echo "Заказа номер ".$_POST['form_select']." не существует!";
		}
	}
	$mysqli->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Изменение/удаление заказов</title>
	</head>

	<body>
		<form action="results.php" method="POST">
			<table>
			  <tr>
				<td>Номер заказа:</td>
				<td><input readonly type="text" name="id" size="3" value="<?= isset($_POST['form_select']) ? $row['id'] : ''; ?>"></td>
			  </tr>
			  <tr>
				<td>Номер товара:</td>
				<td><input type="text" name="id_product" size="3" value="<?= isset($_POST['form_select']) ? $row['id_product'] : ''; ?>"></td>
			  </tr>
			  <tr>
				<td>Имя клиента:</td>
				<td><input type="text" name="name"  value="<?= isset($_POST['form_select']) ? $row['name'] : ''; ?>"></td>
			  </tr>
			  <tr>
				<td>E-mail клиента:</td>
				<td><input type="text" name="email" value="<?= isset($_POST['form_select']) ? $row['email'] : ''; ?>"></td>
			  </tr>
			   <tr>
				<td>Комментарий:</td>
				<td><input type="text" name="comment" value="<?= isset($_POST['form_select']) ? $row['comment'] : ''; ?>"></td>
			  </tr>
			  <tr>
				<td><input type="submit" name="ОК" value="OK"></td>
			  </tr>
			</table>
		  </form>
		  
		<a href="admin.php">Переход в Admin-панель</a>
	</body>
</html>
