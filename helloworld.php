<HTML>
<HEAD>
    <TITLE>Yu-Gi-Oh! World</TITLE> 
</HEAD>
<BODY>
<h2>Yu-Gi-Oh! World - Welcome </h2>
<?php
 define("Welcome","Let us DUEL!");
 echo Welcome;
 echo "<p>";
/* 
 echo PHP_VERSION;
 echo "<p>";
 echo PHP_OS; 
 echo "<p>";
 echo __FILE__;
 echo "<p>";
*/
 $card = 3;
 
 function sayHello($user){
    echo $user.", welcome back! <br/>";
 }
 sayHello("sp1");
 echo '<p>';
 
 function showcards(){
    global $card;
    echo "You have collected ".$card.' cards.<br/>';
 }
 showcards();
 echo '<p>';
 
$cardTypes = array(
    array('id'=>1, 'name'=>'Blue-eyes White Dragon', 'attack'=>3000, 'defence'=>2500),
    array('id'=>2, 'name'=>'Black Magician', 'attack'=>2500, 'defence'=>2100),
    array('id'=>3, 'name'=>'Red-eyes Black Dragon', 'attack'=>2400, 'defence'=>2000)  
);

function compare ($x, $y){
    if($x['id']==$y['id']) return 0;
    else if($x['id']>$y['id']) return 1;
    else return -1;
}

usort($cardTypes, 'compare');

//print_r($cardTypes);

for($i=0; $i<3; $i++){
    reset($cardTypes[$i]);
    while(list($key,$value) = each($cardTypes[$i])){
        echo "$key:$value".' |';
    }
    echo '<br />';
}

echo '<p>';

date_default_timezone_set("Australia/Adelaide");
$t = time();
echo date("Y/m/d h:ia l",$t)."<br />";

echo '<p>';

if(checkdate(2,29,1992))echo 'Yes';
else echo 'No';


?>
</BODY>
</HTML>