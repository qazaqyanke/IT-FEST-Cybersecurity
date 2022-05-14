<?php
if(isset($_POST["user"], $_POST["password"])) {
    $users = json_decode(file_get_contents('data/users.json'), true);
    if(isset($users[$_POST["user"]])){
        if($users[$_POST["user"]]["pass"] === md5($_POST["password"])) {
            setcookie('token', $users[$_POST["user"]]["cookie"],time()+3600, '/');
            header('Location: /profile.php');
            exit();
        }
    } die("Invalid login"); 
}
?>


<html>

<head>
<title>Login</title>

<style>

    h1{
        text-align: center;
    }
    div.login_box {
        width: 400px;
        margin: 0 auto;
        text-align: center;
        }


</style>

</head>

    <body>
        <h1>Login page</h1>
        <form action="" method="post">
            <div class="login_box">
                <div><input type="text" name="user"></div>
                <div><input type="password" name="password"></div>
                <div><input type="submit" value="login"></div>
            </div>
        </form>
    </body>
</html>