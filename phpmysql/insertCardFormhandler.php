<html>
<head>
    <title>Collecting</title>
</head>
<body>
<h2>New card adding to veda database.</h2>
<?php

$id = trim($_POST['id']);
$cardname = trim($_POST['cardname']);
$attribute = $_POST['attribute'];
$attack = trim($_POST['attack']);
$defence = trim($_POST['defence']);

if(!$id and !$cardname and !$attribute and !$attack and !$defence ){
    echo "Error: There is no card data passed.";
    exit;
}

if(!$id or !$cardname or !$attribute or !$attack or !$defence ){
    echo "Error: Inefficient card data passed.";
    exit;
}

if(!get_magic_quotes_gpc()){
    $id = addslashes($id);
    $cardname = addslashes($cardname);
    $attribute = addslashes($attribute);
    $attack = addslashes($attack);
    $defence = addslashes($defence);
}

try{
    $dbconnect = new PDO('mysql:host=localhost;dbname=veda','sp1','superpower1');
}catch(PDOException $exception){
    echo "Connection error message: ".$exception->getMessage();
}

$sqlquery = "INSERT INTO cards(id, name, attribute, attack, defence) 
    VALUES('$id', '$cardname', '$attribute', '$attack', '$defence')";
    
if($dbconnect->exec($sqlquery)) echo "A new card has been collected.<br />";


/*
@ $db = mysqli_connect('localhost','sp1','superpower1','veda');

if(mysqli_connect_errno()){
    echo "Error: Could not connect to database.";
    exit;
}

$q = "INSERT INTO cards(id, name, attribute, attack, defence) 
     VALUES('$id', '$cardname', '$attribute', '$attack', '$defence')";
     
if(!mysqli_query($db, $q)) echo "No new card has been added to database.";
else echo "New card has been added to database.";

mysqli_close($db);
*/
?>
<form action="searchCardformhandler.php" method="post">
        Fill card id:
        <input name="cardID" type="int" size="20"/> <br />
        <input name="submit" type="submit" value="Find"/>
    </form>
</body>
</html>