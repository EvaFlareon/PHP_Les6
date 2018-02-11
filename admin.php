<?php

$uploadfile = "files/";

if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {
	if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK && move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile.date(YmdHis).$_FILES['userfile']['name'])) {
		echo "<p style='color:green'>Файл с тестами загружен</p>";
	} else {
		echo "<p style='color:red'>Ошибка: Файл с тестами не загружен</p>";
	}
}

?>
<form enctype="multipart/form-data" action="" method="POST">
	Файл теста: <input name="userfile" type="file"><br>
	<input type="submit" value="Отправить">
</form>
