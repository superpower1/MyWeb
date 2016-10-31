<html>
<head>
    <title>Card deleted</title>
</head>
<body>
<h2>Card deleted from veda database.</h2>
<?php
$cardID = $_POST['cardID'];

if(!$cardID){
    echo "Please insert the card id which you want to delete.";
    exit;
}

if(!get_magic_quotes_gpc()){
    $cardID = addslashes($cardID);
}

deletecard($cardID);

function deletecard($id){
    try{
        $dbconnect = new PDO('mysql:host=localhost;dbname=veda', 'sp1', 'superpower1');
    }catch(PDOException $exception){
        echo "Connection error message: ".$exception->getMessage();
    }

    $sqlquery = "SELECT * FROM cards WHERE id = '$id'";
    $result = $dbconnect->query($sqlquery);
    echo "The following card is going to be deleted:<br />";
    foreach($result as $row){
        echo "Id:".$row['id']."<br />";
        echo "Name:".$row['name']."<br />";
        echo "Attribute:".$row['attribute']."<br />";
        echo "Attack:".$row['attack']."<br />";
        echo "Defence:".$row['defence']."<br />";
        echo "Effect:".$row['effect']."<br />";
        echo "<p />";
    }
    $sqlquery2 = "DELETE FROM cards WHERE id = '$id'";
    if($dbconnect->exec($sqlquery2)){
        echo "Card deleted.";
    }
    else echo "Failed to delete";
}

?>

<form action="searchCardFormhandler.php" method="post">
        <input name="submit" type="submit" value="Card database."/>
    </form>

</body>
</html>