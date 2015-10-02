<?php
	// siia lisame auto nr märgite vormi
	//laeme funktsiooni failis
	require_once("functions.php");
	
	//kontrollin, kas kasutaja ei ole sisseloginud
	if(!isset($_SESSION["id_from_db"])){
		// suunan login lehele
		header("Location: login.php");
	}
	
	//login välja, aadressireal on ?logout=1
	if(isset($_GET["logout"])){
		//kustutab kõik sessiooni muutujad
		session_destroy();
		
		header("Location: login.php");
		
	}
	
	$car_plate = $color = $car_plate_error = $color_error = "";
	
	
?>

<p>
	Tere, <?=$_SESSION["user_email"];?>
	<a href="?logout=1"> Logi välja</a>
</p>

 <h2>Lisa auto</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
  	<label for="car_plate" >auto nr</label><br>
	<input id="car_plate" name="car_plate" type="text" value="<?=$car_plate; ?>"> <?=$car_plate_error; ?><br><br>
  	<label>värv</label><br>
	<input name="color" type="text" value="<?=$color; ?>"> <?=$color_error; ?><br><br>
  	<input type="submit" name="create" value="Salvesta">
  </form>