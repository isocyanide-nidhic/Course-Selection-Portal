<?php
$S_USERNAME = $_POST['S_USERNAME'];
$S_PASWD = $_POST['S_PASWD'];

$conn = new mysqli('localhost', 'root', '', 'course_portal',3306);
if($conn->connect_error){
    die('Connection Failed : ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("select * from student where S_USERNAME=?");
    $stmt->bind_param("s",$S_USERNAME);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['S_PASWD']==$S_PASWD){
            echo '<script>location.href="STUcourse.php"; </script>';
        }
        else{
            echo '<script>alert("invalid username and password Please Try again"); location.href="studentlog.html";</script>';
        }
    }else{
        echo '<script>alert("invalid username and password Please Try again"); location.href="studentlog.html";</script>';
    }

}
?>