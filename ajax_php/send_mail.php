<?php
include '../connection.php';
if(isset($_POST['email']) && isset($_POST['name'])){
$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
$name  = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
$RecCode = "Confirm_".rand(0,10000);
//Upload To db , Delete if found
$query = $conn->prepare("SELECT id FROM confirmation WHERE email = ?");
$query->execute(array(strtolower($email)));
$rows = $query->rowCount();
if($rows > 0){
    $delete = $conn->prepare("DELETE FROM confirmation WHERE email = ?");
    $delete->execute(array(strtolower($email)));
}
$insert = $conn->prepare("INSERT INTO confirmation(code,email) VALUES (?,?)");
$insert->execute(array($RecCode,strtolower($email)));
//Config
include  "../PHPMailer/class.phpmailer.php";
//PHPMailer Object
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
//From
$mail->From = "";
$mail->FromName = "Test_Ajax";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 465;
//Whether to use SMTP authentication
$mail->SMTPAuth   = true;
$mail->SMTPSecure = "ssl";
$mail->SMTPDebug = 2;
//Username to use for SMTP authentication
$mail->Username = '';
//Password to use for SMTP authentication
$mail->Password = '';
//Set who the message is to be sent from
$mail->setFrom('', 'Test_Ajax');
//Set an alternative reply-to address
$mail->addReplyTo('', 'Test_Ajax');
//Set who the message is to be sent to
$mail->addAddress($email, $name);
//Set the subject line
$mail->IsHTML(true);
$mail->Subject = 'Confirmation Code';
//Read an HTML message body from an external file, convert referenced images to embedded,
$mail->Body = "
<div style='width:80%'>
    <div style='margin-top:4px;width:80%'>
        <h2>You have requested to Confirm Your account </h2>
        <hr>
        <h3>Your Confirmation Code is : $RecCode
        <h4 style='color:#f22929'>Sent By Ajax</h4>
    </div>
</div>
";
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
    if (!$mail->send()) {
        die();
    };
}