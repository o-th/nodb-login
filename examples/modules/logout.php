<!-- Initialize logout function -->
<?php 
if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}
?>

<!-- anchor tag to activate logout function -->
<p style="text-align:right;">You are logged in as <?=$_SESSION['username']?> <a href="?logout=1">Logout</a></p>
