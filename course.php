<?php

$CID = $_POST['CID'];
$CNAME = $_POST['CNAME'];
$CLINK = $_POST['CLINK'];
$CDURATION = $_POST['CDURATION'];

$conn = new mysqli('localhost', 'root', '', 'course_portal');
if($conn->connect_error){
    die('Connection Failed : ' . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into course(CID,CNAME,CLINK,CDURATION)values(?,?,?,?)");
    $stmt->bind_param("ssss",$CID,$CNAME,$CLINK,$CDURATION);
    $stmt->execute();
    echo "<script>alert('Submitted successfully');
            location.href='TRcourse.html';
    </script>";
    $stmt->close();
    $conn->close();

}
    


    ?>