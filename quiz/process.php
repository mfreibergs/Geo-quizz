<?php include 'database.php'; ?>
<?php session_start(); 


?>
<?php 
	//	Ja šis ir pirmais jautājums, rezultāts tiek atlikts par 0
	if($_POST['number'] == 1){
		$_SESSION['score'] = 0;
	}

if($_POST){
	$qtype = $_SESSION['qType'];
	$number = $_POST['number'];
	$selected_choice = $_POST['choice'];
	$next = $number+1;
	
	//	Iegūst kopējo jautājumu skaitu
	
	$query = "SELECT * FROM `questions`
				WHERE quiz_type = '$qtype'";
	
	$result = $mysqli->query($query) or die($mysqli->error);
	$total = $result->num_rows;
	
	
	//	Iegūst pareizo atbildi
	
	$query = "SELECT * FROM `choices`
				WHERE question_number = $number AND is_correct = 1 AND quiz_type = '$qtype'";
				
	$result = $mysqli->query($query) or die($mysqli->error);
	
	$row = $result->fetch_assoc();
	
	$correct_choice = $row['id'];

	//	Salīdzina ar pareizo atbildi
	if($correct_choice == $selected_choice){
		//Answer is correct
		$_SESSION['score']++;
	}
	
	//	Pārbauda vai ir pēdējais jautājums
	if($number == $total){
		$_POST['total'] = $total;
		header("Location: final.php");
		exit();
	} else{
		header("Location: question.php?n=".$next);
	}
}
?>
