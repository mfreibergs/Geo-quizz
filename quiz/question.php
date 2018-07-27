<?php include('database.php') ?>
<?php session_start(); ?>
<?php
		
	//	Izveido Globālu vērtību priekš lietotāja vārda un testa tipu 'quiz type', ko lietotājs izvēlējās
	if(isset($_POST['username']) && isset($_POST['qType'])){
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['qType'] = $_POST['qType'];
	} 
	
	$qtype = $_SESSION['qType'];

	$number = (int) $_GET['n'];

	//  Iegūst jautājumu
	$query = "SELECT * FROM `questions` 
			WHERE question_number = $number AND quiz_type = '$qtype'";

	
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$questions = $result->fetch_assoc();

	
	//	Iegūst atbilžu variantus
	$query = "SELECT * FROM `choices` 
			WHERE question_number = $number AND quiz_type = '$qtype'";

	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
	

	//	Iegūst kopējo jautājumu skaitu
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
		<div class="container">
			<h2>Geography Quiz</h2>
		</div>
	</header>
	<main>
		<div class="container">
			<!-- Norāda kurš jautājums pēc kārtas -->
			<div class="current">Question <?php echo $number; ?> of <?php echo $total ?></div>
			<!-- Kāds jautājums -->
			<p class="question">
				<?php echo $questions['text']; ?>
			</p>

			<!-- no MySQL iziet cauri visām atbildēm, kas atbist kriterijiem un tiek parādītas mājas lapā 
					lietotājs izvēlas vienu atbildi un var doties uz nākamo jautājumu  -->
			<form method="post" action="process.php">
				<ul class="choices">
					<?php while($row = $choices->fetch_assoc()): ?>
						<input required name="choice" type="radio" value="<?php echo $row['id'] ?>" id="<?php echo $row['id'] ?>"/>
						<label class="lab" for="<?php echo $row['id'] ?>"><?php echo $row['text']; ?></label>

					<?php endwhile; ?>	
				</ul>
				<input type="submit" value="Submit" />
				<input type="hidden" name="number" value="<?php echo $number; ?>" />
				<div class="progress">
    					<div class="meter">
  						<span style="width: <?php echo ($number-1)/$total*100; ?>%"></span>
					</div>
  				</div>
			</form>
		</div>
	</main>

</body>
</html>
