<?php
require_once('./functions.php'); //pour appeler un autre fichier

$server = 'localhost'; //4-7 pour appeler la base de donnee
$userName = 'root';
$pwd = '';
$db = 'ecom1';

$conn = mysqli_connect($server, $userName, $pwd, $db);  //pour se connecter avec la base de donnee
if ($conn) {
    echo "connected to the $db database succesfully";
    global $conn; 
} else {
    echo "Error: Not connected to the $db database";
}

//recuperer un ligne dans le tableau dans user 
//$result1= mysqli_query($conn, "SELECT * from user where id = 2");

//PREMIER FETCH
//avec fetch row : permet de recuperer un donne dans un tableau indexee
//$data1 = mysqli_fetch_row($result1);
$data1 = selectUserByIndex();
showData("premier fetch", $data1);

echo "<br>";
echo "premier fetch";
echo "<br>";
echo "<br>";
var_dump($result1);
echo "<br>";
echo "<br>";
var_dump($data1);


//DEUXIEME FETCH
$result2 = mysqli_query($conn, "SELECT * from user where id = 1");
//avec un tableau associatif 
$data2 = mysqli_fetch_assoc($result2);
//avec fetch assoc : permet de recuperer un donne dans un tableau associatif 

/*echo "<br>"; //on utilise des fonctions de preference
echo "second fetch";
echo "<br>";
echo "<br>";
var_dump($result2);
echo "<br>";
echo "<br>";
var_dump($data2);
*/

$data2 = selectUserByIndex(2);
showData("second fetch", $data2);

//TROISIEME FETCH
//recuperer une seule ligne mais en choisissant l'ordre des colonnes 
/*$result3 = mysqli_query($conn, "SELECT user_name, email, id from user where id = 1");
$data3 = mysqli_fetch_assoc($result3);

echo "<br>";
echo "troisieme fetch";
echo "<br>";
echo "<br>";
var_dump($result3);
echo "<br>";
echo "<br>";
var_dump($data3);
*/


//QUATRIEME FETCH
//recuperer toutes les lignes de la table user
//avec fetch assoc

/*$result4 = mysqli_query($conn, "SELECT user_name, email, id FROM user");

$data4 = [];
$i = 0;
while ($rangeeData = mysqli_fetch_assoc($result4)) {
    $data4[$i] = $rangeeData;
    $i++;

    echo "<br>";
    echo "<br>";
    echo "Nom de l'usager : ".$rangeeData["user_name"]."<br>";
    echo "Courriel : " . $rangeeData["email"] . "<br>";
};

echo "<br>";
echo "Quatrieme fetch";
echo "<br>";
echo "<br>";
echo "Mon array aura : " . mysqli_num_rows($result4) . "lignes.";
echo "<br><br>";
var_dump($result4);
echo "<br>";
echo "<br>";
var_dump($data4);
*/

$data4 = getAllUserAssoc();
showData('Quatrieme fetch', $data4);
echo "<ul>";

/*foreach($data4 as $key => $value){
    ?> 
<li>L'utilisateur se nomme : <?php echo $value['user_name'] ?>.
Son ID est : <?php echo $value['id']?>.
Son Email est : <?php echo $value['email']?> </li>
<?php>
}*/

echo"<ul>";


//avec la boucle for 
$result5 = mysqli_query($conn, "SELECT user_name, email, id from user");

$data5 = [];
$imax = mysqli_num_rows($result5);

for ($i = 0; $i < $imax; $i++ ) {
    $rangeeData = mysqli_fetch_assoc($result5);
    $data5[$i] = $rangeeData;
    
    echo "<br>";
    echo "<br>";
    echo "Nom de l'usager : ".$rangeeData["user_name"]."<br>";
    echo "Courriel : " . $rangeeData["email"] . "<br>";
}

echo "<br>";
echo "Cinquieme fetch";
echo "<br>";
echo "<br>";
echo "Mon array aura : " . mysqli_num_rows($result5) . "lignes.";
echo "<br><br>";
var_dump($result5);
echo "<br>";
echo "<br>";
var_dump($data5);


//avec fetch assoc
$result6 = mysqli_query($conn, "SELECT *  FROM user");

$data6 = [];
$i = 0;
while ($rangeeData = mysqli_fetch_row($result6)) {
    $data6[$i] = $rangeeData;
    $i++;

    echo "<br>";
    echo "<br>";
    echo "Nom de l'usager : ".$rangeeData[1]."<br>";
    echo "Courriel : " . $rangeeData[2] . "<br>";
}

echo "<br>";
echo "Sixieme fetch";
echo "<br>";
echo "<br>";
echo "Mon array aura : " . mysqli_num_rows($result6) . "lignes.";
echo "<br><br>";
var_dump($result6);
echo "<br>";
echo "<br>";
var_dump($data6);


$data7 = [
    'user_name' => 'William',
    'email' => 'bill@bill.ca',
    'pwd' => ''
];

$newUser = createUser($data7);

$users = getAllUserAssoc();
?>