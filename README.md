# No Database Login
## What is this?
Basic login system that doesnt require a database written in php.<br>

## Examples
The [examples](https://github.com/isteinbrook/nodb-login/tree/master/examples) folder shows two possible deploments of nodb-login:<br>
* [modules](https://github.com/isteinbrook/nodb-login/tree/master/examples/modules)
    * Seperated Login, Logout, and Protected pages.
* [one pager](https://github.com/isteinbrook/nodb-login/tree/master/examples/onepager)
    * One page with everything included

## Basic implementation
*Break down of [modules example.](https://github.com/isteinbrook/nodb-login/tree/master/examples/modules)*
### login.php
```
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
```

### logout.php
```
<?php 
if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}
?>
<p style="text-align:right;">You are logged in as <?=$_SESSION['username']?> <a href="?logout=1">Logout</a></p>
```

### protectedpage.php
```
<?php
//Login Script, Sessions is initlized here.
session_start();

if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}
?>


<?php if($_SESSION['username']): ?>
  <!-- If theres a valid session then this will be shown-->
  <P>Protected Content</P>
<?php endif; ?>
        
<!-- Redirect for no valid session-->
<?php if(!$_SESSION['username']): echo '<script type="text/javascript"> window.location = "login.php"</script>'; endif; ?>
```

## Sessions, get username, and other functions
*Note: for any of the following functions to work you need to initialize the session function*
### sessions
Intilize a session with<br>
```
<?php session_start(); ?>
```
### get username
```
<?=$_SESSION['username']?>
```
### logout
intilize logout<br>
```
<?php 
if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}
?>
```
send a logout request via a get function(example is anchor tag)<br>
```
<a href="?logout=1">Logout</a>
```

### Redirect for no valid session
<?php if(!$_SESSION['username']): echo '<script type="text/javascript"> window.location = "login.php"</script>'; endif; ?>

## Change password
in the login script find the $userinfo array
```
$userinfo = array(
    //Change password here
    'username'=>'password',
);
```
Username = desired username<br>
Password = desired password

want more user/pass combos?<br>
```
$userinfo = array(
    //Change password here
    'username1'=>'password1',
    'username2'=>'password2',
);
```
