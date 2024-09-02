<?php
session_start();
$conn = mysqli_connect("localhost","root","","e_commerec");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}