<?php
include "db-con.php";

function checkAdmin($adminEmail, $adminPass, $conn) {
    $sql = "SELECT * FROM admins WHERE admin_email = '$adminEmail' AND admin_pass = '$adminPass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return false;
    else
        return true;
}


function getAdminId($adminEmail, $conn) {
    $sql = "SELECT admin_id FROM admins WHERE admin_email = '$adminEmail'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['admin_id'];
}