<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "userbbditm";


$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn)
{
   die (mysqli_connect_errno());
}

?>