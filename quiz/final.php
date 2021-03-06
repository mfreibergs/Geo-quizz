<?php include "database.php" ?>
<?php session_start(); ?>
<?php 

	//	Iegūst lietotājvārdu, rezultātu, testa tipu un kopējo jautājājumu skaitu
	$username = $_SESSION['username'];
	$score = $_SESSION['score'];
	$qtype = $_SESSION['qType'];

	$query = "SELECT * FROM `questions`
				WHERE quiz_type = '$qtype'";

	$result = $mysqli->query($query) or die($mysqli->error);
	$total = $result->num_rows;


//	Tiek ievadits lietotajs datubāzē un tiek izveidota aizsardzība pret mysql injection
$sql = $mysqli->prepare("INSERT INTO `users` (username, quiz_type, cor_ans)
				VALUES (?,?,?);");
$sql->bind_param("ssi", $username, $qtype, $score);
$sql->execute();
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
	<?php ?> 
	<main>
		<!-- Apsveic lietotāju par testa izpildīšanu un parāda, cik daudz atbildes bija pareizas -->
			<h2 style="text-align: center;">You're Done!</h2>
			<p style="text-align: center;">Congratulations, <?php echo $username; ?>!<br> You have completed the test</p>
			<h3 style="text-align: center;">Final Score: <?php echo $score; ?> / <?php echo $total ?></h3>
			<a href="index.php" class="start">Take Again</a>
	</main>

</body>
</html>
