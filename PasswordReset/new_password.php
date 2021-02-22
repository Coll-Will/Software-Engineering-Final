<?php
require_once "config.php";
require_once "session.php";
if(isset($_POST['submit_pass'] && $_POST['key'] && $_POST['reset']))
{
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    $select=mysql_query("update user set password='$password'where email='$email'");
}
?>