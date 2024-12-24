<?php 
$user = 'web' ;
$pass = 'web';
$database = 'esportsx';

try {
    $dbh = new PDO('mysql:host=localhost;charset=UTF8;dbname='.$database, $user, $pass);
}
catch(PDOException $e){
    echo $e;
}

?>