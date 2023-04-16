<?php

$FB = $_POST['FB'];

$conn = new mysqli('localhost', 'root', '', 'course_portal');
if($conn->connect_error){
    die('Connection Failed : ' . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into feedback(FB)values(?)");
    $stmt->bind_param("s",$FB);
    $stmt->execute();
    echo "<script> alert('Submitted successfully');
    location.href='STUcourse.php'; </script>";
    $stmt->close();
    $conn->close();
}

?>