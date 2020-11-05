<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Index of Fragility</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/13e80550c9.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<div id="content">
				<header>
					<h1>Index of Fragility</h1>
					<small>Design4Green</small>
				</header>
				<section id="main_section">
					<h2>Section 1</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

					<p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>

					<p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>
				</section>
				<section id="secondary_section">
					<h2>Section 2</h2>
					<form method = "post">
						<label> Area </label>
						<select name ="area_name">
						    <option disabled selected>---Area---</option>
						    <?php
						        $db = mysqli_connect("localhost","fatima","admin","trial");
						        $records = mysqli_query($db, "SELECT COM From data_13k");  
						        while($data = mysqli_fetch_array($records))
						        {
						            echo "<option value='". $data['COM'] ."'>" .$data['COM'] ."</option>";  // displaying data in option menu
						             echo "<p> ID </p>";  // displaying data 
						        }   
						    ?>  
						</select>
						<button type="submit" name="submit">Submit</button>

						</form>
				        <form id="form2">
					    <div id="dvContainer">
					        This content needs to be printed.
					    </div>
					    <input type="button" value="Print Div Contents" id="btnPrint" />
					    </form>
				</section>
				

				<footer>
					<p align="center">Copyright (c) 2020</p>
				</footer>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.1.1/jspdf.umd.min.js"></script>
		<script src="jspdf.debug.js"></script>
		<script src="script.js"></script>
		<?php
		// Turn off all error reporting
		error_reporting(0);


		$conn = new PDO("mysql:host=localhost;dbname=trial", "fatima", "admin");
		if(isset($_POST['submit']))
		{

		    $area_name = $_POST['area_name'];
		    $sql= $conn-> prepare("Insert into tblarea (area_name)
		    values (:area_name)");
		    $conn->beginTransaction();
		    $sql->execute(array(':area_name'=>$area_name));
			file_put_contents('filename.txt', $area_name); 
		    $conn->commit();
		}

		        $db = mysqli_connect("localhost","fatima","admin","trial");
		        $records = mysqli_query($db, "SELECT COM,global score, dpt score From data_13k where COM=$area_name");  // Use select query here
				$data = mysqli_fetch_array($records);
		        

		        echo "<table>
		    <tr>
		    <th>ID</th>
		    <th>Commune</th>
		    <th>Index1</th>
		    <th>Index2</th>
		    </tr>
		    <tr><th>" . $data['Id'] . "</th>
		        <th>" . $data['COM'] . "</th>
		        <th>" . $data['global score'] . "</th>
		        <th>" . $data['dpt score'] . "</th></tr></table>";
        
    	?> 
	</body>
</html>