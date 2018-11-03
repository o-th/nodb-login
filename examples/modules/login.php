<?php
//Login Script, Sessions is initlized here.
session_start();

$userinfo = array(
    //Change password here
    'username'=>'password',
);

//login function
if(isset($userinfo[$_POST["username"]]) && $userinfo[$_POST["username"]]==$_POST["password"]) {
    if($userinfo[$_POST['username']] == $_POST['password']) {
        $_SESSION['username'] = $_POST['username'];
    }else {
        //Invalid Login
        echo "<p>Invalid Login</p>";
    }
}
?>

<!-- Shows if there is a valid session-->
<?php if($_SESSION['username']): echo '<script type="text/javascript"> window.location = "protectedpage.php" </script>'; endif; ?>

<!-- Shows if theres no valid session-->
<?php if(!$_SESSION['username']): ?>
    <form role="form" name="login" action="" method="post">
        <input class="form-control" placeholder="Username" name="username" type="username" value ="" autofocus>
        <input class="form-control" placeholder="Password" name="password" type="password" value="">
        <input type="submit" name="submit" value="Login" />
    </form>
<?php endif; ?>