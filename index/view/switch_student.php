<?php
require_once '../model/login.php';
session_start();
$student = $_SESSION['student'];
unset($_SESSION['student']);
//session_destroy();
header('location:select_student.php');
?>
