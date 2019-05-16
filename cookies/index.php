
<html>
<head>
<title>User Logon</title>
</head>
<body>
  <h2>User Login </h2>
  <form name="login" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   Username: <input type="text" name="username"><br>
   Password: <input type="password" name="password"><br>
   Remember Me: <input type="checkbox" name="rememberme" value="1"><br>
   <input type="submit" name="submit" value="Login!">
  </form>
<p>
    
    <?php
    $username = $_REQUEST['username'];
    echo $username;
    ?>

</p>
</body>
</html>

<?php
/* These are our valid username and passwords */

    $correct_username = "eduard";
    $correct_password = "admin";

    $cookie_username = $_REQUEST['username'];
    $cookie_password = $_REQUEST['admin'];
    if($cookie_username == $correct_username)
        if($cookie_password == $correct_password)
            echo ""

    $username = $_REQUEST['username'];
    if(!$username)
        $username = "not set";

        if (isset($_POST['rememberme'])) {
            /* Set cookie to last 1 year */
            setcookie('username', $_POST['username'], time()+60*60*24*365, '/account', 'www.example.com');
            setcookie('password', $_POST['password'], time()+60*60*24*365, '/account', 'www.example.com');
        
        } else {
            /* Cookie expires when browser closes */
            setcookie('username', $_POST['username'], false, '/account');
            setcookie('password', $_POST['password'], false, '/account');
        }
        // header('Location: index.php');

?>

