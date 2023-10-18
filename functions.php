<?php
function selectUserByIndex($id) {
    //recuperer une ligne dans user
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = " . $id);

    //avec fecth row : tableau indexe
    $date = mysqli_fetch_row($result);
    
    return $date;
}

function selectUserByAssoc()
?>