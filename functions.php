<?php

function showData($title, $data) {
    echo "<br><br><h2>".$title."</h2>";
    var_dump($data);
    
}

function selectUserByIndex($id) {
    //recuperer une ligne dans user
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = 1" . $id);

    //avec fecth row : tableau indexe
    $data = mysqli_fetch_row($result);
    
    return $data;
}
 
function selectUserByAssoc($id) {
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = " . $id);
    
    //avec fecth row : tableau indexe
    $data = mysqli_fetch_assoc($result);

    return $data;
}



function getAllUserAssoc() {
    $result = mysqli_query($conn, "SELECT user_name, email, id FROM user");

    $data = [];
    $i = 0;
    while ($rangeeData = mysqli_fetch_assoc($result)) {
    $data[$i] = $rangeeData;
    $i++;
    };

    /*$imax = mysqli_num_rows($result5);

    for ($i = 0; $i < $imax; $i++ ) {
        $rangeeData = mysqli_fetch_assoc($result5);
        $data5[$i] = $rangeeData;
        
    }*/
    return $data;
}
/*function createUser($data){
    global $conn
    $query = "INSERT INTO `user` (`id`, `user_name`, `email`, `pwd`) VALUES (NULL, 'Mal', 'mal@mal.ca', '')";;
    $result = mysqli_query($conn, $query);
}
*/

function createUser($data){
    global $conn;
    $query = 'INSERT INTO user VALUES (NULL, ?, ?, ?)';

}

function updateUser($data) {
    global $conn ;
    $query = "SELECT * FROM user WHERE user_name = " . $user_name;
    $result = mysqli_query($conn, $query);
}

function deleteUser($data) {
    global $conn;
    $query = "SELECT * FROM user WHERE user_name = " " " . $user_name;
    $del = delete($query);
    $result = mysqli_query($conn, $query);
}
?>