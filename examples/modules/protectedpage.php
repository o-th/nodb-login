<!-- Login Script, Sessions is initlized here. -->
<?php
session_start();

if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}
?>

<!-- If theres a valid session then this will be shown-->
<?php if($_SESSION['username']): ?>
  <P>Protected Content</P>
<?php endif; ?>
        
<!-- Redirect for no valid session-->
<?php if(!$_SESSION['username']): echo '<script type="text/javascript"> window.location = "login.php"</script>'; endif; ?>
