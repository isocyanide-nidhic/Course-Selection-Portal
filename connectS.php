<?php

$S_NAME = $_POST['S_NAME'];
$S_USERNAME = $_POST['S_USERNAME'];
$S_PASWD = $_POST['S_PASWD'];
$S_EMAIL = $_POST['S_EMAIL'];
$S_PHONE = $_POST['S_PHONE'];
$S_DOB = $_POST['S_DOB'];
$S_COLLEGENAME = $_POST['S_COLLEGENAME'];

$conn = new mysqli('localhost', 'root', '', 'course_portal',3306);
if($conn->connect_error){
    die('Connection Failed : ' . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into student(S_NAME,S_USERNAME,S_PASWD,S_EMAIL,S_PHONE,S_DOB,S_COLLEGENAME) values(?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssiss", $S_NAME, $S_USERNAME, $S_PASWD, $S_EMAIL, $S_PHONE, $S_DOB, $S_COLLEGENAME);
    $stmt->execute();
    echo "<script> location.href='studentlog.html' </script>";
    $stmt->close();
    $conn->close();
}

?>