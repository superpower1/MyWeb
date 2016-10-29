<HTML>
<HEAD>
<TITLE>Collection</TITLE>
</HEAD>

<BODY>
<?php
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
@$fp = fopen("$DOCUMENT_ROOT/cardlist.txt",'rb');

if(!$fp){
    echo "Nothing collected.";
    exit;
}
while(!feof($fp)){
    $order = fgets($fp, 2048);
    echo $order."<br />";
}
fclose($fp);

?>
<form action="inputcard.php" method="post">
<input type="submit" value="Continue to collect">
</form>

</BODY>
</HTML>