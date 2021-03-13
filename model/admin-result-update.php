<?php
if(!isset($_COOKIE['uid'])) {
session_start();
if(!isset($_SESSION['uid'])){
      header('location:login.php');
}
}

$studentsemesterValidityMsg="";
$studentcourseValidityMsg="";
$studentgradeValidityMsg="";
$studentgpointValidityMsg="";
if( isset($_POST['semester']) )
{
      $semester = filter_input(INPUT_POST, 'semester');
      $credit = filter_input(INPUT_POST, 'credit');
      $grade = filter_input(INPUT_POST, 'grade');
      $gpoint = filter_input(INPUT_POST, 'gpoint');
      $hStudentId=filter_input(INPUT_POST, 'hStudentId');
      $validPost=true;

      if ($semester==""){
            $validPost=false;
            $studentsemesterValidityMsg="Student Semester cannot be empty";
      }
      if ($credit==""){
            $validPost=false;
            $studentcourseValidityMsg="Student Course cannot be empty";
      }
      if ($grade==""){
            $validPost=false;
            $studentgradeValidityMsg="Student Grade cannot be empty";
      }
      if ($gpoint==""){
            $validPost=false;
            $studentgpointValidityMsg="Student Grade Point cannot be empty";
      }
      if($validPost)
      {
            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "school";
            $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
            if (mysqli_connect_error()){
                  die('Connect Error ('. mysqli_connect_errno() .') '
            . mysqli_connect_error());
            }
            else{
                  $sql = "UPDATE result set semester='$semester',credit='$credit',grade='$grade',gpoint='$gpoint' where id=$hStudentId";
                  if ($conn->query($sql)){
                        header("Location:admin-result-info.php");
                  }
                  else{
                        echo "Error: ". $sql ."". $conn->error;
                  }
                  $conn->close();
            }
      }


}
else
{
      $id=$_GET["x"];
      $conn=mysqli_connect("localhost","root","","school");
      // Check connection
      if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $sql ="SELECT * FROM result WHERE id='$id'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
      // output data of each row
            while($row = $result->fetch_assoc()) {
                  $hStudentId=$row['id'];
                  $semester=$row['semester'];
                  $credit=$row['credit'];
                  $grade=$row['grade'];
                  $gpoint=$row['gpoint'];
            }
      }
      else {
            echo "0 results";
      }
      $conn->close();
}

?>