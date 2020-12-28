<?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == 'root' AND $password == '631996'){
            $_SESSION["username"] = "root";
            header("Location: result55.php");

        }else{
            header("Location: login.php");
        }
        
    }
    
?>

<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>LOGIN</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>



<body>
	<div class="login">
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" value="LOGIN">
        </form>
    </div>
</body>
</html>	