<html>
<head>
    <title>Card found</title>
</head>
<body>
<h2>Card found from veda database.</h2>

<?php
@ $cardID = $_POST['cardID'];

if(!$cardID){
    //showAllcards();
    exit;
}

if(!get_magic_quotes_gpc()){
    $cardID = addslashes($cardID);
}

$server = "localhost";
$username = "sp1";
$password = "superpower1";

try{
    $dbconnect = new PDO('mysql:$server;dbname=veda', $username, $password);
}catch(PDOException $exception){
    echo "Connection error message: ".$exception->getMessage();
}

$sqlquery = "SELECT * FROM cards WHERE id = '".$cardID."'";
$result = $dbconnect->query($sqlquery);
foreach($result as $row){
    echo "Id:".$row['id']."<br />";
    echo "Name:".$row['name']."<br />";
    echo "Attribute:".$row['attribute']."<br />";
    echo "Attack:".$row['attack']."<br />";
    echo "Defence:".$row['defence']."<br />";
    echo "Effect:".$row['effect']."<br />";
    echo "<p />";
}

function showAllcards(){
    try{
        $dbconnect = new PDO('mysql:host=$server;dbname=veda', $username, $password);
    }catch(PDOException $exception){
        echo "Connection error message: ".$exception->getMessage();
    }

    $sqlquery = "SELECT * FROM cards";
    $result = $dbconnect->query($sqlquery);
    foreach($result as $row){
        echo "Id:".$row['id']."<br />";
        echo "Name:".$row['name']."<br />";
        echo "Attribute:".$row['attribute']."<br />";
        echo "Attack:".$row['attack']."<br />";
        echo "Defence:".$row['defence']."<br />";
        echo "Effect:".$row['effect']."<br />";
        echo "<p />";
    }
}

/*
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
*/

?>

<form action="modifyCardForm.html" method="post">
        <input name="submit" type="submit" value="Modify card data"/>
    </form>

</body>
</html>
