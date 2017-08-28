<html>
<head>
	<title>All Cards are here</title>
</head>
<body>

<?php
	try{
			$dbconnect = new PDO('mysql:host=localhost;dbname=veda', 'sp1', 'superpower1');
	}catch(PDOException $exception){
			echo "Connection error message: ".$exception->getMessage();
	}

		    $sqlquery = "SELECT * FROM cards";
		    $result = $dbconnect->query($sqlquery);
				while($row = $result->fetch()){
					print_r($row);
				}
		    // foreach($result as $row){
		    //     echo "Id:".$row['id']."<br />";
		    //     echo "Name:".$row['name']."<br />";
		    //     echo "Attribute:".$row['attribute']."<br />";
		    //     echo "Attack:".$row['attack']."<br />";
		    //     echo "Defence:".$row['defence']."<br />";
		    //     echo "Effect:".$row['effect']."<br />";
		    //     echo "<p />";
		    // }

?>

</body>
</html>
