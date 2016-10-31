<html>
<head>
    <title>Modifying</title>
</head>
<body>
<h2>Modifying card values</h2>
<?php

$id = trim($_POST['id']);
$cardname = trim($_POST['cardname']);
$attribute = $_POST['attribute'];
$attack = trim($_POST['attack']);
$defence = trim($_POST['defence']);

if(!$id){
    echo "Error: Please specified card id.";
    exit;
}

if(!$cardname and !$attribute and !$attack and !$defence ){
    echo "Error: Please input the values you want to change.";
    exit;
}

if($cardname){
    changeName($id, $cardname);
}

if($attribute){
    changeAttribute($id, $attribute);
}

if($attack){
    changeAttack($id, $attack);
}

if($defence){
    changeDefence($id, $defence);
}

if(!get_magic_quotes_gpc()){
    $id = addslashes($id);
    $cardname = addslashes($cardname);
    $attribute = addslashes($attribute);
    $attack = addslashes($attack);
    $defence = addslashes($defence);
}


function changeName($id,$cardname){    
    try{
        $dbconnect = new PDO('mysql:host=localhost;dbname=veda','sp1','superpower1');
    }catch(PDOException $exception){
        echo "Connection error message: ".$exception->getMessage();
    }
    $sqlquery = "UPDATE cards SET name='$cardname' WHERE id='$id'";
    if($dbconnect->exec($sqlquery)){
        echo "The name of cardID:$id has been changed.<br />";        
    } 
}

function changeAttribute($id,$attribute){
    try{
        $dbconnect = new PDO('mysql:host=localhost;dbname=veda','sp1','superpower1');
    }catch(PDOException $exception){
        echo "Connection error message: ".$exception->getMessage();
    }
    $sqlquery = "UPDATE cards SET attribute='$attribute' WHERE id='$id'";
    if($dbconnect->exec($sqlquery)){
        echo "The attribute of cardID:$id has been changed.<br />";        
    } 
}

function changeAttack($id,$attack){
    try{
        $dbconnect = new PDO('mysql:host=localhost;dbname=veda','sp1','superpower1');
    }catch(PDOException $exception){
        echo "Connection error message: ".$exception->getMessage();
    }
    $sqlquery = "UPDATE cards SET attack='$attack' WHERE id='$id'";
    if($dbconnect->exec($sqlquery)){
        echo "The attack of cardID:$id has been changed.<br />";        
    } 
}    

function changeDefence($id,$defence){
    try{
        $dbconnect = new PDO('mysql:host=localhost;dbname=veda','sp1','superpower1');
    }catch(PDOException $exception){
        echo "Connection error message: ".$exception->getMessage();
    }
    $sqlquery = "UPDATE cards SET defence='$defence' WHERE id='$id'";
    if($dbconnect->exec($sqlquery)){
        echo "The defence of cardID:$id has been changed.<br />";        
    } 
}

?>
<form action="searchCardFormhandler.php" method="post">
        <input name="submit" type="submit" value="Check the modified data"/>
    </form>
</body>
</html>