<HTML>
<HEAD>
<TITLE>Collected</TITLE>
</HEAD>
<BODY>
<?php

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$id = trim($_POST['id']);
$cardname = trim($_POST['cardname']);
$attribute = $_POST['attribute'];
$attack = trim($_POST['attack']);
$defence = trim($_POST['defence']);

$date = date("H:i:s Y m d");
$string_to_be_added = $date."\t |Id:".$id."\t |".$cardname."\t |Attribute:".$attribute."\t |Attack:".$attack."\t |Defence:".$defence."\n";

$fp = fopen("$DOCUMENT_ROOT/cardlist.txt",'ab');
if(fwrite($fp, $string_to_be_added, strlen($string_to_be_added))){
    echo 'You have collected '.$cardname." ! \n";
    
}
else echo 'Failed.';
fclose($fp);

?>

<form action="showcollection.php" method="post">
    <input type="submit" value="See what you have collected.">
    
</form>
</BODY>
</HTML>