<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
	.box {
		width: 750px;
		padding: 20px;
		background-color: #fff;
		border: 1px solid #ccc;
		border-radius: 5px;
		margin-top: 100px;
	}
</style>
</head>
<body>
<div class="container box">
<?php
$con = mysqli_connect("localhost","unisim_user","7xo0wrvk*6SP","unisim_db");
$filename = "data.php";
$data = file_get_contents($filename);

// Convert the JSON String into PHP Array
$array = json_decode($data, true);

// Extracting row by row
foreach($array as $row) {
    mysqli_query($con, "INSERT INTO demo (athlete,age,country,year,date,sport,gold,silver,bronze,total) VALUES('".$row["athlete"]."','".$row["age"]."','".$row["country"]."','".$row["year"]."','".$row["date"]."','".$row["sport"]."','".$row["gold"]."','".$row["silver"]."','".$row["bronze"]."','".$row["total"]."') ");
}
?>
</div>
</body>
</html>