<?php include "database.php" ?>
<?php session_start(); ?>
<?php 

	//	Iegūst kopējo jautājājumu skaitu
	$qtype = $_SESSION['qType'];
	$query = "SELECT * FROM `questions`
				WHERE quiz_type = '$qtype'";

	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $result->num_rows;
?>
<!doctype html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Geography Quiz</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
		
</head>

<body>
	
	<header>
		<h1>Geography Quiz</h1>
	</header>
	<main>
		<!-- Apsveic lietotāju par testa izpildīšanu un parāda, cik daudz atbildes bija pareizas -->
		<div class="container">
			<h2 style="text-align: center;">You're Done!</h2>
			<p style="text-align: center;">Congratulations, <?php echo $_SESSION['username']; ?>!<br> You have completed the test</p>
			<h3 style="text-align: center;">Final Score: <?php echo $_SESSION['score']; ?> / <?php echo $total ?></h3>
			<a href="index.php" class="start">Take Again</a>
		</div>
	</main>

</body>
</html>
