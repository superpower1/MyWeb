<html>
<head>
    <title>Card found</title>
</head>
<body>
<h2>Card found from veda database.</h2>
<?php
$cardID = $_POST['cardID'];

if(!$cardID){
    echo "Error: There is no data passed.";
    exit;
}

if(!get_magic_quotes_gpc()){
    $cardID = addslashes($cardID);
}

@ $db = mysqli_connect('localhost','sp1','superpower1','veda');

if(mysqli_connect_errno()){
    echo "Error: Could not connect to mysql database.";
    exit;
}

$q = "SELECT * FROM cards WHERE id = '".$cardID."'";
$result = mysqli_query($db,$q);
$rownum = mysqli_num_rows($result);

for($i=0; $i<$rownum; $i++){
    $row = mysqli_fetch_assoc($result);
    echo "Id:".$row['id']."<br />";
    echo "Name:".$row['name']."<br />";
    echo "Attribute:".$row['attribute']."<br />";
    echo "Attack:".$row['attack']."<br />";
    echo "Defence:".$row['defence']."<br />";
    echo "Effect:".$row['effect']."<br />";
}
mysqli_free_result($result);
mysqli_close($db);
?>
</body>
</html>