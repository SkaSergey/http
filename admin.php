<?php ini_set('error_reporting', E_ALL); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
	<input type="file" name="file" required>
	<input type="submit" value="Отправить" name="submit">
</form>
<?php 
	$datadir = './uploads/';
	if (!file_exists($datadir)) {
		mkdir('./uploads/', 0700);
	}
if (isset($_FILES['file']['name'])) {
		$tmp_name = $_FILES['file']['tmp_name'];
		$path = $_FILES['file']['name'];

		$finfo = finfo_open(FILEINFO_MIME_TYPE );
		
		$file_type = finfo_file($finfo, $tmp_name);
		if ($file_type !== "text/plain") {
			$errors['Файл'] = 'Ошибка! Загрузите тест в формате json';
			print_r($errors['Файл']);

		}

			elseif (isset($_FILES['file'])) {
		$file_name = $_FILES['file']['name'];
		$file_path = __DIR__ . '/uploads/';
		$file_url = './uploads/' . $file_name;
		move_uploaded_file($_FILES['file']['tmp_name'], $file_path . $file_name);
		print("Файл успешно загружен: <a href='$file_url'>$file_name</a>");
		header('Location: list.php'); 

		}

	}
 ?>


<p>
	<a href="list.php">Перейти к списку тестов</a>
</p>
</body>
</html>