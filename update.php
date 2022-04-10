<?php

$userid = $_GET["data"];

require "dbconnect.php";
$object->update($userid,$_POST);


$users = file("users.txt");
$updateduser = implode(":" , $_POST);
$users[$userid] = $updateduser ;
$usersfile = fopen("users.txt" , "w");

foreach($users as $user){
    $user= trim($user ,"\n");
    $user=$user.PHP_EOL ;
    fwrite($usersfile , $user);

}

fclose($usersfile);
header("Location:showusers.php");