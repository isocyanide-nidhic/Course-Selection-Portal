<?php

$con=mysqli_connect("localhost","root","","course_portal"); 
if(!$con)   { 
                die(" Connection Error "); 
            } 
            $query = " CALL `getFEEDBACK`(); ";
            $result = mysqli_query($con,$query);
            echo "FEEDBACK: <br>";
?>

<?php

while ($col = mysqli_fetch_assoc($result)) {
    $FB = $col['FB'];
    
    echo "<br>",$FB;
}
?>
