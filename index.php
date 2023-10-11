<?php
$server = 'localhost';
$userName = 'root';
$pwd = '';
$db = 'ecom1';

$conn = mysqli_connect($server, $userName, $pwd, $db);
if ($conn) {
    echo "connected to the $db database succesfully";
    global $conn;
} else {
    echo "Error: Not connected to the $db database";
}

//recuperer un ligne dans user 
$result1= mysqli_query($conn, "SELECT * from user where id = 2");


//avec fetch row : permet de recuperer un donne dans un tableau indexe 
$data1 = mysqli_fetch_row($result1);


echo "<br>";
echo "premier fetch";
echo "<br>";
echo "<br>";
var_dump($result1);
echo "<br>";
echo "<br>";
var_dump($data1);

$result2 = mysqli_query($conn, "SELECT * from user where id = 1");
//avec un tableau associatif 
$data2 = mysqli_fetch_assoc($result2);

echo "<br>";
echo "second fetch";
echo "<br>";
echo "<br>";
var_dump($result2);
echo "<br>";
echo "<br>";
var_dump($data2);

//recuperer une seule ligne mais en choisissant l'ordre des colonnes 
$result3 = mysqli_query($conn, "SELECT user_name, email, id from user where id = 1");
$data3 = mysqli_fetch_assoc($result3);

echo "<br>";
echo "troisieme fetch";
echo "<br>";
echo "<br>";
var_dump($result3);
echo "<br>";
echo "<br>";
var_dump($data3);
?>