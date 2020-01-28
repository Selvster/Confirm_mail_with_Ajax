<?php 
include '../connection.php';
if(isset($_POST['code']) && isset($_POST['email'])){
    $code  = filter_var($_POST['code'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    //
    $query = $conn->prepare("SELECT id FROM confirmation WHERE email = ? AND code = ?");
    $query->execute(array($email,$code));
    $rows = $query->rowCount();
    if($rows > 0){
        //Update confirmed
        $update = $conn->prepare("UPDATE users SET confirmed = 1 WHERE email = ?");
        $update->execute(array($email));
        //Get user Id save Session
        $query_two = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $query_two->execute(array($email));
        $id = $query_two->fetch()['id'];
        $_SESSION['id'] = $id;
        //Delete from confirmation
        $delete = $conn->prepare("DELETE FROM confirmation WHERE code = ? AND email = ?");
        $delete->execute(array($code,$email));
    }else{
        echo "wrong";
    }
}