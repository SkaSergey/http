<?php 

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
	else echo "<a href=\"list.php\">Выберите доступные тесты </a>", exit;
if (!file_exists(__DIR__ . '/uploads/' . $id)) {
		http_response_code(404);
		echo 'Неправильный номер теста';
		exit;
	}

$json = file_get_contents(__DIR__ . '/uploads/' . $id);
$test = json_decode($json, true);

// print_r("<pre>");
// var_dump($test);
// print_r("</pre>");
 ?>
 <?php  ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
	 <?php echo "<form action=\"img.php?id=$id\" method=\"POST\">"; ?>
	
		<?php foreach ($test['0'] as $key => $question) : ?>
		<fieldset>
			<legend><?= $question['0'] ?></legend>
			<?php $c = count($question)-1; $i = 1; while ($i<=$c) {
			 		print "<label><input type=\"radio\" name=\"q".$key."\" value=\"".$question["$i"]."\" required>".$question["$i"]."</label>"; $i++;
				}
			?>
		</fieldset>	
		<?php endforeach; unset($key); unset($question);?>
		<input type="text" placeholder="Введите ваше имя" name="name" required>

		<input type="submit" value="Отправить">
		
	</form>
	
<p>
	<a href="list.php">Перейти к списку тестов</a>
</p>

</body>
</html>
