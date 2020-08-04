<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HTML5 表单属性 - 自学教程（runoops.com）</title>
</head>
<body>
<?php
$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
$lname = isset($_POST['lname']) ? $_POST['lname'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

if(strlen($fname) > 20 || strlen($lname) > 20 || strlen($email) > 20) {
    die('String to long');
}

?>

<p>First name:<?php echo $fname;?> </p>

<p>Last name:<?php echo $lname;?> </p>

<p>E-mail:<?php echo $email;?></p>
</body>
</html>