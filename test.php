<?php

$content = $_GET['filename'];

foreach (glob("files/*.json") as $filename) {
	if ($content == $filename) {
		$test = file_get_contents($filename);
		$result = json_decode($test, true);
		echo "Пройдите тест ".$result[0]['name'];
		break;
	} else {
		continue;
	}
}

$user_answer = [];
$t = 0;
$f = 0;

$user_answer[1] = $_POST['1'];
$user_answer[2] = $_POST['2'];
$user_answer[3] = $_POST['3'];
$user_answer[4] = $_POST['4'];
$user_answer[5] = $_POST['5'];

for ($i = 1; $i < 6; $i ++) {
	if ($user_answer[$i] === $result[$i]['answer']) {
		$t += 1;
	} else if ($_POST['$i'] == False) {
		$t += 0;
		$f += 0;
	} else {
		$f += 1;
	}
}

?>

<form action="" method="post">
	<?php for ($i = 1; $i < 6; $i++) { ?>
	<ol><?= $result[$i]['question'];
		for ($j = 0; $j < 3; $j++) { ?>
		<li>
			<input type="radio" name="<?= $i ?>" value="<?= $result[$i]['answers'][$j]; ?>">
			<?= $result[$i]['answers'][$j]; ?>
		</li>
		<?php } ?>
	</ol>
	<?php } ?>
	<input type="submit" value="Проверить">
</form>

<?php

echo "Правильных ответов: ".$t."<br>";
echo "Неправильных ответов: ".$f;

echo "<br>"."<br>";
echo '<a href="list.php">Вернуться к списку тестов</a>';

?>
