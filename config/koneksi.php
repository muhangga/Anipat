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

function upload($new, $old) {
    $name = $new["name"];
    $size = $new["size"];
    $tmp_name = $new["tmp_name"];
    $extension = ["jpg", "jpeg", "png"];
    $type = explode(".", $name);
    $type = strtolower(end($type));

    if (!in_array($type, $extension)) {
        echo"
         <script>
             alert('Type file tidak didukung');
             document.location.href = '';
         </script>";
         exit();
    }

    if($size > 1000000) {
        echo"
        <script>
            alert('Ukuran file terlalu besar');
            document.location.href = '';
        </script>";
        exit();
    }

    $avatar = uniqid() . "." . $type;

    if ($old != null && file_exists("assets/avatar/" . $old)) {
        unlink("assets/avatar/" . $old);
    }

    move_uploaded_file($tmp_name, "assets/avatar/" . $avatar);
    return $avatar;
}
