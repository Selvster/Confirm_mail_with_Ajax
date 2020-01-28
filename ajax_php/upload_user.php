<?php
include '../connection.php';
if(isset($_POST['username']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['password']) && isset($_POST['email'])){
    $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $first_name = filter_var($_POST['first_name'],FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST['last_name'],FILTER_SANITIZE_STRING);
    $email  = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $HashedPassword = password_hash($password,PASSWORD_DEFAULT);
    //upload
    $insert = $conn->prepare("INSERT INTO users(username,password,email,name) VALUES (?,?,?,?)");
    $insert->execute(array($username,$HashedPassword,$email,$first_name." ".$last_name));
}