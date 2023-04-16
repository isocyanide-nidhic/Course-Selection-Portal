
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Selection Portal</title>

</head>
<link rel="stylesheet" href="STUcourse.css">
<body>
   
   <div class="LO"><h2>HELLO STUDENT !!</h2><span><input type="submit" value="LOG OUT" class="box" onclick="loggedout()" data-toggle="tooltip" data-placement="bottom" title="LOGOUT"></span></div> 
   
   <form action="feedback.php" method="post">
   <div class="FB">
    <p>
        <label for="feedback"> FEEDBACK:</label>
        <br>
        <input type="text" placeholder="Enter your Feedback" name="FB">      
     </div>
     <div class="btn"><input type="submit" value="SUBMIT" onclick="FBsubmit()" ></div>
    </p>
</form>

<?php
$con=mysqli_connect("localhost","root","","course_portal"); 
if(!$con)   { 
                die(" Connection Error "); 
            } 
            $query = " select * from course ";
            $result = mysqli_query($con,$query);
?>

        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                        <caption>Select Course :</caption>
                        <thead>
                            <tr>
                                <td> Course ID </td>
                                <td> Course Name </td>
                                <td> Course Links </td>
                                <td> Course Duration </td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $CID = $row['CID'];
                                        $CNAME = $row['CNAME'];
                                        $CLINK = $row['CLINK'];
                                        $CDURATION = $row['CDURATION'];
                            ?>
                                    <tr>
                                        <td><?php echo $CID ?></td>
                                        <td><?php echo $CNAME ?></td>
                                        <td><?php echo "<a href='$CLINK' 'Style='float:right;' data-toggle='tooltip' data-placement='bottom' title='Click Here'><button cursor='pointer'>Click Here</button></a>" ?></td>
                                        <td><?php echo $CDURATION ?></td>
                                        
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                        </tbody>       

                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
          
</body>
</html>                                                                  
                                   

</body>
<script lang="javascript">
    function loggedout() {
        alert("Want to Log Out ??  ");
            window.location.href="index.html";
    }
   
  </script>
</html>