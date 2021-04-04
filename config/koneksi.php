<?php 

$conn = mysqli_connect("localhost", "root", "", "petshop");

 if(!$conn) {
     echo"
     <script>
         alert('Database tidak terhubung');
     </script>";
 }

function push($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $affected = mysqli_affected_rows($conn);
    return $affected;
}

function queryOne($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
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
