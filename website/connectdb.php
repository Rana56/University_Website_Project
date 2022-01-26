<?php
	try{
		$db = new PDO("mysql:dbname=u_200143073_db; host=localhost", "u-200143073", "vYDgPSMFUWBURQx");		//connects to database on localhost

	} catch (PDOException $ex){									//exception handling, incase database doesn't load
		?>
		<p> Sorry, a Database error occured. Please try again. </p>
		<p>(Error details: <?= $ex->getMessage() ?>)</p>

		<?php
	}
?>
	