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


<?php
//logout script
if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}
?>

<!-- Shows if there is a valid session-->
<?php if($_SESSION['username']): ?>
  <p style="text-align:right;">You are logged in as <?=$_SESSION['username']?> <a href="?logout=1">Logout</a></p>
  <P>Protected Content</P>
<?php endif; ?>

<!-- Shows if theres no valid session-->
<?php if(!$_SESSION['username']): ?>
    <form role="form" name="login" action="" method="post">
        <input class="form-control" placeholder="Username" name="username" type="username" value ="" autofocus>
        <input class="form-control" placeholder="Password" name="password" type="password" value="">
        <input type="submit" name="submit" value="Login" />
    </form>
<?php endif; ?>