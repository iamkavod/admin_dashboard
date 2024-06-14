<?php 

include 'connect.php';
if(isset($_GET['deleteid'])){
  $id = $_GET['deleteid'];

  $sql = "delete from `admindash` where id = $id";
  $result = mysqli_query($connect, $sql);
  if($result) {
   header('location:home.php');
  } else {
   die(mysqli_error($connect));
  }
}