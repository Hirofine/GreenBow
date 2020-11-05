

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
					<h2>What is the index of Fragility? and What does it mean?</h2>
					<p>The digital fragility index is a tool made by the SGAR Occitanie with the ANSA and Mednum during the IncubO.<br>
					It's goal is to be used by the representative to help them to take decision about the digital inclusion on there territory.
					<p>

					<p>The digital fragility represent many things:<br>
					- There's more and more procedures that must be made online nowaday and less people to interact with<br>
					- Some people (in particular our elders, but not only) have troubles with new technologies and need some help using computers.<br>
					- Some people can't afford for this technologies and can't make the procedures as they would.<br>
					- Some people, due to the fact a website is a robot and can't interact as a human, are not aware of the procedure they have to or can do.<br>
					- There are location in those territory that are not wall suited with good bandwidth making the using of website painful or impossible<br>
					</p>

					<p>This tool compile all these things with some index, so the representatives can use it to help taking some decisions and spend public money the wiser<br>
					This index show the probability for a given zone, that a significative part of the population is in situation of digital exclusion, this mean they are not able to use it properly.<br>
					This can be due to many different reasons. Those reason can be evaluated thanks to the 4 other index we are sharing.<br>
					- Access to digital interfaces : Identify poorly deserved territories by network, or where populations would have financial troubles to access<br>
					- Access to the information : Identify territories where people would have issue accessing the information or troubles understanding it<br>
					- Numerical competences: Identify territories where people have issues using new technologies<br>
					- Paperwork competences: Identify territories where people have issues with paperwork (for example, young people unexperienced, or non native speaker)<br>

					</p>
					<p>
					
					</p>
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
		<?php
		// Turn off all error reporting
		//error_reporting(0);


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
		    $db = mysqli_connect("localhost","fatima","admin","trial");
		    $records = mysqli_query($db, "SELECT COM From data_13k where COM=$area_name");  // Use select query here
		    $data = mysqli_fetch_array($records);
		        

		        echo "<table>
						<tr>
							<th>The digital fragility index for " . $data['name_of_commune'] . " (" . $data['COM'] . ") is  " . $data['global score'] . ".</th>
						</tr>
						<tr>
							<th>The one for " . $data['dept_name'] . " (" . $data['dept_number'] . ") is " . $data['dpt_score'] . ".</th>
						</tr>
						<tr>
							<th>The one for " . $data['region_name'] . " is " . $data['region_score'] . ".</th>
						</tr>
						</table>";
		}

		        
        
 ?> 

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

		
	</body>
</html>