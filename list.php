
<?php
	$datadir = './uploads/';
	if (!file_exists($datadir)) {
		mkdir('./uploads/', 0700);
	}
	$ArrFiles = [];
	$ArrTests = [];
	if($OpDir = opendir($datadir)){
    while(false !== ($file = readdir($OpDir))) {
        if(preg_match ('~\.json$~',$file)){
            $ArrFiles[] = $file;
        }
    }
}

for ($i = 0; $i < count($ArrFiles);$i++){
$JsonFile = file_get_contents('./uploads/'.$ArrFiles[$i]);
$Arr = json_decode($JsonFile,true);
    $key = $ArrFiles[$i];
    
    $ArrTests[] = $key;
    
}

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Список тестов</title>
</head>
<body>

<form action="list.php"  method="post">
    <div> <b>Список доступных тестов:</b>
        <ul>
    <?php foreach ($ArrTests as $id=>$key){
       
    echo "<li><a href=\"test.php?id=$key\">$key</a></li>";
    }
       ?>
     </ul>
    </div>
</form>
<p>
	<a href="admin.php">Перейти к загрузке тестов</a>
</p>

</body>
</html>