<?php
$F_USERNAME = $_POST['F_USERNAME'];
$F_PASWD = $_POST['F_PASWD'];

$conn = new mysqli('localhost', 'root', '', 'course_portal',3306);
if($conn->connect_error){
    die('Connection Failed : ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("select * from faculty where F_USERNAME=?");
    $stmt->bind_param("s",$F_USERNAME);
    $stmt->execute();
   
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['F_PASWD']==$F_PASWD){
            
            echo'<script> location.href="TRcourse.html"; </script>';
        }
        else{
            echo '<script>alert("invalid username and password Please Try again"); location.href="facultylog.html";</script>';
        }
    }else{
        echo '<script>alert("invalid username and password Please Try again"); location.href="facultylog.html"</script>';
    }

}
?>