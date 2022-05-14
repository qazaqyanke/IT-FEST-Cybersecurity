<?php
if(isset($_POST["user"], $_POST["password"])) {
    $users = json_decode(file_get_contents('data/users.json'), true);
    $user = preg_replace('/[^*a-z0-9]/', '', $_POST["user"]);
    $password = md5($_POST["password"]);
    if(!isset($users[$user])) {
        $hash = md5(microtime().print_r($_SERVER, true).rand());
        $users[$user] = array(
            'user' => $user,
            'realname' => '',
            'pass' => $password,
            'cookie' => $hash
        );
        file_put_contents('data/users.json', json_encode($users));
        setcookie('token', $hash,time()+3600, '/');
        header('Location: /profile.php');
        exit();
    } else {
        die("User already exists");
    }
}
?>


<html>

<head>
<title>Register</title>

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
        <h1>Register page</h1>
        <form action="" method="post">
            <div class="login_box">
                <div><input type="text" name="user"></div>
                <div><input type="password" name="password"></div>
                <div><input type="submit" value="login"></div>
            </div>
            </form>
    </body>
</html>