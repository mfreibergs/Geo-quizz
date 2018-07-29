<?php include "database.php"; ?>
<?php session_start(); ?>
<?php

//	Atlasa visus testa tipus 'quiz type'
$query = "SELECT * FROM `questions` 
			WHERE question_number = 1";

$quiz_type = $mysqli->query($query) or die($mysqli->error);

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Geography quiz</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />

</head>

<body>
	<h1>Geography quiz</h1>
	<!-- Lietotājs ievada savu lietotājvārdu un izvēlas testa tipu 'quiz type' -->
	<form method="post" action="question.php?n=1">
		<input type="text" name="username" placeholder="Username" required><br>
			<select class="custom-select" name="qType" style="width: 200px">
					<option disabled selected>Quiz type v</option>
				<?php while($type = $quiz_type->fetch_assoc()): ?>
					<option><?php echo $type['quiz_type']; ?></option>
				<?php endwhile; ?>
			</select>
		<br>
		<input type="submit" class="start" value="Start">
	</form>

</body>
</html>
