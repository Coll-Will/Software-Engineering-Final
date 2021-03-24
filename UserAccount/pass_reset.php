<?php
require_once "config.php";
require_once "session.php";

if($_GET['key'] && $_GET['reset'])
{
    $select=$db->prepare("SELECT * FROM users WHERE email=?")
    {
        ?>
    <form method="post" action="new_password.php">
        <input type="hidden" name="email" value="<?php echo $email;?>">
        <p>Enter new password:</p>
        <input type="password" name="password">
        <input type="submit" name="submit_pass" class="btn btn-primary" value="Submit">
    </form>
<?php
    }
}
?>