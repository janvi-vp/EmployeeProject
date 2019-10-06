<head>
  <style>.colii{background-color:"yellow";margin-left: 15%;margin-right: 15%;opacity: 0.9; }</style>
  <title>View</title>
  <style type="text/css">
    .cp{
      padding-left: 20%;
      
    }
  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <?php
//require_once('config.php')
?>
<style>.colii{background-color: #F7E410;height: 100%}</style>

  </head>
<body>
  <form  name="myForm" action="cpgtr.php" method="post">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <h1>View form</h1>
          <p>Fill up the required information</p>
          <hr class="mb-3">
          <label for="fid"><b>id</b></label>
          <input class="form-control"type="number" name="id" >
          <hr class="mb-3">
          <input  style="margin-bottom: 50%;"class="btn btn-primary"type="submit" name="view" value="View">
          
        </div>
      </div>
    </div>
  </form>
  <!-- <div class="colii"> -->
  <div class="cp">
    <br><br><br>
    <h1>Personal Information</h1>
  <?php
    if(isset($_POST['view'])){
      $id=0;
      $con = mysqli_connect('localhost','root','','employee');
     
      $id=$_POST['id'];
      $cp_sql="select designation from employee.register where id='$id'";

      $resultcp=mysqli_query($con,$cp_sql);
      $rp = mysqli_fetch_array($resultcp);
      echo $rp[0];
      if($con){
        
        if (1) {
          
              $sql = "select * from employee.register where id='$id'";
              
              $result=mysqli_query($con,$sql);
              
              if (mysqli_num_rows($result)>0) {
                  while($row = mysqli_fetch_row($result)) { 
                      echo "id: " . $row[5]."<br>". " - Name: " . $row[3]. "<br>"." - Phone: " . $row[4]."<br>". " - Address: " . $row[7]."<br>". " - Attendance: " . $row[8]. "<br>"."Qualification :".$row[9];
                  }
              } 
              else {
                  echo "0 results";
              }
            }  
            ?>
            <br><br><br>
            <h2>Institute level information</h2>
            <?php
/*------------------------------------------DISPLAY_TEACHER--------------------------------------------------------*/
        if ($rp[0]=='Teaching') {
          $sql = "select * from employee.course where cid='$id'";
          
          $result=mysqli_query($con,$sql);
          
          if (mysqli_num_rows($result)>0) {
              while($row = mysqli_fetch_row($result)) { 
                  echo "<br>-Course id:" . $row[0]."<br>" ;
                  echo " - course name: " . $row[1]."<br>". " - course_credits: " . $row[2]. "<br>";
              }
          } 
          else {
              echo "0 results";
          }
        }
/*=================================================================================================================*/
/*-----------------------------------------DISPLAY_LAB_ASSISTANT---------------------------------------------------*/
          if ($rp[0]=='Non-Teaching') {
          $sql = "select * from employee.lab where lid='$id'";
          
          $result=mysqli_query($con,$sql);
          
          if (mysqli_num_rows($result)>0) {
              while($row = mysqli_fetch_row($result)) { 
                  echo "lab_id: " . $row[2]."<br>". " - lab_no: " . $row[0]."<br>". " - lab_floor: " . $row[3]."<br>" ." - lab_name: " . $row[1]. "<br>";
              }
          } 
          else {
              echo "0 results";
          }
        }
        ?>
        <br><br><br>
        <h2>Accounts Information</h2>
        <?php
/*=================================================================================================================*//*----------------------------------------DISPLAY_ACCOUNTS---------------------------------------------------------*/        
          if (1) {
              $sql = "select * from employee.accounts where fid='$id'";
              
              $result=mysqli_query($con,$sql);
              
              if (mysqli_num_rows($result)>0) {
                  while($row = mysqli_fetch_row($result)) { 
                      echo "id: " . $row[0]."<br>". " - Salary: " . $row[2]. "<br>"." - Bonus: " . $row[1]."<br>". " - Dues: " . $row[3]."<br>". " - Last_paid_on: " . $row[4]. "<br>";
                  }
              } 
              else {
                  echo "0 results";
              }
            }  



      else{
          echo("not connected");
        }
      } 
    }
    // echo "<tr>";
    // echo "<td>cp</td>";
    // echo "<td>cp</td>";
    // echo "</tr";

    ?>
</div>
</div>
</body>