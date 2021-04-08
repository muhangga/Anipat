<?php 

$conn = mysqli_connect("localhost", "root", "", "petshop");

 if(!$conn) {
     echo"
     <script>
         alert('Database tidak terhubung');
     </script>";
 }

function push($query) {
    global $conn; // ngakses variabel $conn
    $result = mysqli_query($conn, $query); // mengquery ke database
    $affected = mysqli_affected_rows($conn); // mereturn nilai -1 dan 1
    return $affected;
}

function queryOne($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result); // mengkonversi ke array assosiative
    return $row;
}

function queryAll($query) {
    global $conn;
    $result = mysqli_query($conn, $query);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        array_push($rows, $row);
    }
    return $rows;
}
