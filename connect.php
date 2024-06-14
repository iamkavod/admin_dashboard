<?php

$connect = new mysqli("localhost", "root", "", "admindashboard");

if (!$connect) {
 die(mysqli_error($connect));
}

?>