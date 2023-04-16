<?php

$F_NAME = $_POST['F_NAME'];
$F_USERNAME = $_POST['F_USERNAME'];
$F_PASWD = $_POST['F_PASWD'];
$F_EMAIL = $_POST['F_EMAIL'];
$F_PHONE = $_POST['F_PHONE'];
$F_DOB = $_POST['F_DOB'];
$F_DOMAIN = $_POST['F_DOMAIN'];

$conn = new mysqli('localhost', 'root', '', 'course_portal',3306);
if($conn->connect_error){
    die('Connection Failed : ' . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into faculty(F_NAME,F_USERNAME,F_PASWD,F_EMAIL,F_PHONE,F_DOB,F_DOMAIN) values(?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssiss", $F_NAME, $F_USERNAME, $F_PASWD, $F_EMAIL, $F_PHONE, $F_DOB, $F_DOMAIN);
    $stmt->execute();
    echo "<script> location.href='facultylog.html'; </script>";
    $stmt->close();
    $conn->close();
}

?>