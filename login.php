<?php
include ('config.php')
?>
<?php
session_start();
if (isset($SESSION['authentication']))
{
    header('Location: content.php');
    exit();
}

if (!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $salt = 'loremipsumdolorsitamet';
    $kryp = crypt($password, $salt);
    $paring = "SELECT * FROM users WHERE
    username='$username' AND password='$kryp'";
    $output = mysqli_query($connection, $paring);

    if (mysqli_num_rows($output) == 1)
    {
        $SESSION['authentication'] = 'whatever';
        header('Location: content.php');
    }
    else
    {
        echo "неправильный логин или пароль";
    }
}

?>
<html>
<head>
     <title>Вход</title>
   <link rel="stylesheet" href="">  
</head>
<body>

<div>
     <h1>Вход</h1>
</div>

<form method="post">
<div>
    <label>Имя пользователя</label>
         <input type="text" name="username" required>
     </div>
     <div>
          <label>Пароль</label>
          <input type="password" name="password" required></input>
     

     </div>
     <input type="submit" value="Вход">
     <a href="registration.php">зарегистрироваться</a>
 </form>
</div>
</head>
</html>
